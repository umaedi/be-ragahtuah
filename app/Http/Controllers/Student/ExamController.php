<?php

namespace App\Http\Controllers\Student;

use Carbon\Carbon;
use App\Models\Grade;
use App\Models\Answer;
use App\Models\Question;
use App\Models\ExamGroup;
use App\Models\ExamSession;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;


class ExamController extends Controller
{
        /**
     * confirmation
     *
     * @param  mixed $id
     * @return void
     */
    public function confirmation($id = 2)
    {
        //get exam group
        $exam_group = ExamGroup::with('exam.lesson', 'exam_session', 'student.classroom')
                    // ->where('student_id', auth()->guard('student')->user()->id)
                    ->where('id', $id)
                    ->first();

        //get grade / nilai
        $grade = Grade::where('exam_id', $exam_group->exam->id)
                    ->where('exam_session_id', $exam_group->exam_session->id)
                    // ->where('student_id', auth()->guard('student')->user()->id)
                    ->first();
        
        //return with inertia
        return inertia('Student/Exams/Confirmation', [
            'exam_group' => $exam_group,
            'grade' => $grade,
        ]);
    }

    /**
     * startExam
     *
     * @param  mixed $id
     * @return void
     */
    public function startExam($user_id)
    {
        //get exam group
        $exam_group = ExamGroup::with('exam.lesson', 'exam_session')
                    // ->where('student_id', auth()->guard('student')->user()->id)
                    ->latest()
                    ->first();

        //get grade / nilai
        $grade = Grade::where('exam_id', $exam_group->exam->id)
                    ->where('exam_session_id', $exam_group->exam_session->id)
                    // ->where('student_id', auth()->guard('student')->user()->id)
                    ->first();

        // return \response()->json([
        //     'data'  => $grade
        // ]);
        //update start time di table grades
        $grade->start_time = Carbon::now();
        $grade->update();

        //cek apakah questions / soal ujian di random
        if($exam_group->exam->random_question == 'Y') {

            //get questions / soal ujian
            $questions = Question::where('exam_id', $exam_group->exam->id)->inRandomOrder()->get();

        } else {

            //get questions / soal ujian
            $questions = Question::where('exam_id', $exam_group->exam->id)->get();

        }

        //define pilihan jawaban default
        $question_order = 1;

        foreach ($questions as $question) {

            //buat array jawaban / answer
            $options = [1,2];
            if(!empty($question->option_3)) $options[] = 3;
            if(!empty($question->option_4)) $options[] = 4;
            if(!empty($question->option_5)) $options[] = 5;

            //acak jawaban / answer
            if($exam_group->exam->random_answer == 'Y') {
                shuffle($options);
            }

            //cek apakah sudah ada data jawaban
            $answer = Answer::where('exam_id', $exam_group->exam->id)
                    ->where('exam_session_id', $exam_group->exam_session->id)
                    ->where('question_id', $question->id)
                    ->first();

            //jika sudah ada jawaban / answer
            if($answer) {

                //update urutan question / soal
                $answer->question_order = $question_order;
                $answer->update();

            } else {

                //buat jawaban default baru
                Answer::create([
                    'exam_id'           => $exam_group->exam->id,
                    'exam_session_id'   => $exam_group->exam_session->id,
                    'question_id'       => $question->id,
                    'student_id'        => $user_id,
                    'question_order'    => $question_order,
                    'answer_order'      => implode(",", $options),
                    'answer'            => 0,
                    'is_correct'        => 'N'
                ]);

            }
            $question_order++;

        }

        // return \response()->json([
        //     'data'  => "ok"
        // ]);

        //redirect ke ujian halaman 1
        return redirect()->route('student.exams.show', [
            'id'    => $exam_group->id, 
            'page'  => 1
        ]);   
    }
    
    /**
     * show
     *
     * @param  mixed $id
     * @param  mixed $page
     * @return void
     */
    public function show($page)
    {
        //get exam group
        $exam_group = ExamGroup::with('exam.lesson', 'exam_session')->first();

        if(!$exam_group) {
            return \response()->json([
                'status'    => true,
                'message'   => 'Sesi ujian tidak ditemukan',
            ], 200);
        }

        //get all questions
        $all_questions = Answer::with('question')
                        // ->where('exam_id', $exam_group->exam->id)
                        ->orderBy('question_order', 'ASC')
                        ->get();

        //count all question answered
        $question_answered = Answer::with('question')
                        ->where('exam_id', $exam_group->exam->id)
                        ->where('answer', '!=', 0)
                        ->count();


        //get question active
        $question_active = Answer::with('question.exam')
                        ->where('exam_id', $exam_group->exam->id)
                        ->where('question_order', $page)
                        ->first();
        
        //explode atau pecah jawaban
        if ($question_active) {
            $answer_order = explode(",", $question_active->answer_order);
        } else  {
            $answer_order = [];
        }

        //get duration
        $duration = Grade::where('exam_id', $exam_group->exam->id)
                    ->where('exam_session_id', $exam_group->exam_session->id)
                    ->first();

        // return response()->json([
        //     'success'           => true,
        //     'message'           => "Soal ragah tuah",
        //     'page'              => (int) $page,
        //     'exam_group'        => $exam_group,
        //     'all_questions'     => $all_questions,
        //     'question_answered' => $question_answered,
        //     'question_active'   => $question_active,
        //     'answer_order'      => $answer_order,
        //     'duration'          => $duration,
        // ],200);

        // return with inertia
        return inertia('Student/Exams/Show', [
            'id'                => (int) 1,
            'page'              => (int) $page,
            'exam_group'        => $exam_group,
            'all_questions'     => $all_questions,
            'question_answered' => $question_answered,
            'question_active'   => $question_active,
            'answer_order'      => $answer_order,
            'duration'          => $duration,
        ]); 
    }

        /**
     * updateDuration
     *
     * @param  mixed $request
     * @param  mixed $grade_id
     * @return void
     */
    public function updateDuration(Request $request, $grade_id)
    {
        $grade = Grade::find($grade_id);
        $grade->duration = $request->duration;
        $grade->update();

        return response()->json([
            'success'  => true,
            'message' => 'Duration updated successfully.'
        ]);
    }

    /**
     * answerQuestion
     *
     * @param  mixed $request
     * @return void
     */
    public function answerQuestion(Request $request)
    {
        //update duration
        $grade = Grade::where('exam_id', $request->exam_id)
                ->where('exam_session_id', $request->exam_session_id)
                ->where('student_id', auth()->guard('student')->user()->id)
                ->first();

        $grade->duration = $request->duration;
        $grade->update();

        //get question
        $question = Question::find($request->question_id);
        
        //cek apakah jawaban sudah benar
        if($question->answer == $request->answer) {

            //jawaban benar
            $result = 'Y';
        } else {

            //jawaban salah
            $result = 'N';
        }

        //get answer
        $answer   = Answer::where('exam_id', $request->exam_id)
                    ->where('exam_session_id', $request->exam_session_id)
                    ->where('student_id', auth()->guard('student')->user()->id)
                    ->where('question_id', $request->question_id)
                    ->first();

        //update jawaban
        if($answer) {
            $answer->answer     = $request->answer;
            $answer->is_correct = $result;
            $answer->update();
        }

        return redirect()->back();
    }

    /**
     * endExam
     *
     * @param  mixed $request
     * @return void
     */
    public function endExam(Request $request)
    {
        //count jawaban benar
        $count_correct_answer = Answer::where('exam_id', $request->exam_id)
                            ->where('exam_session_id', $request->exam_session_id)
                            ->where('student_id', auth()->guard('student')->user()->id)
                            ->where('is_correct', 'Y')
                            ->count();

        //count jumlah soal
        $count_question = Question::where('exam_id', $request->exam_id)->count();

        //hitung nilai
        $grade_exam = round($count_correct_answer/$count_question*100, 2);

        //update nilai di table grades
        $grade = Grade::where('exam_id', $request->exam_id)
                ->where('exam_session_id', $request->exam_session_id)
                ->where('student_id', auth()->guard('student')->user()->id)
                ->first();
        
        $grade->end_time        = Carbon::now();
        $grade->total_correct   = $count_correct_answer;
        $grade->grade           = $grade_exam;
        $grade->update();

        //redirect hasil
        return redirect()->route('student.exams.resultExam', $request->exam_group_id);
    }

    /**
     * resultExam
     *
     * @param  mixed $id
     * @return void
     */
    public function resultExam($exam_group_id)
    {
        //get exam group
        $exam_group = ExamGroup::with('exam.lesson', 'exam_session', 'student.classroom')
                ->where('student_id', auth()->guard('student')->user()->id)
                ->where('id', $exam_group_id)
                ->first();

        //get grade / nilai
        $grade = Grade::where('exam_id', $exam_group->exam->id)
                ->where('exam_session_id', $exam_group->exam_session->id)
                ->where('student_id', auth()->guard('student')->user()->id)
                ->first();

        //return with inertia
        return inertia('Student/Exams/Result', [
            'exam_group' => $exam_group,
            'grade'      => $grade,
        ]);
    }

    public function exam($userId)
    {
        $lastSession = ExamSession::latest()->first();

        if($lastSession->end_time < Carbon::now()) {
            // tidak boleh ikut quiz
            return \response()->json([
                'status'    => 404,
                'message'   => 'Sesi tidak ditemukan',
            ], 404);          
        } 

        // get exam group
        $exam_group = ExamGroup::where('student_id', $userId)
            ->where('exam_session_id', $lastSession->id)
            ->first();

        if(!$exam_group) {
            $data = ExamGroup::create([
                'exam_id'         => $lastSession->exam_id,  
                'exam_session_id' => $lastSession->id,
                'student_id'      => $userId,
            ]);

            return \response()->json([
                'status'    => 200,
                'message'   => 'User Berhasil Enroll Quiz',
                'data'      => $data
            ], 200);
        }

        return \response()->json([
            'status'    => 200,
            'message'   => 'User Melanjutkan Soal',
            'data'      => $exam_group,
        ], 200);
    }

    public function soal($page, $groupId)
    {
        //get exam group
        $exam_group = ExamGroup::with('exam.lesson', 'exam_session')
            ->where('id', $groupId)
            ->first();

        // cek apakah user sudah enroll quiz
        if(!$exam_group) {
            return \response()->json([
                'status'    => 404,
                'message'   => 'Anda belum enroll quiz ini!',
            ], 404);
        }

        // question saat ini
        $question_active = Answer::where('exam_id', $exam_group->exam->id)
                        ->where('question_order', $page)
                        ->first();

        if(!$question_active) {
            return \response()->json([
                'status'    => 404,
                'message'   => 'Soal tidak ditemukan!',
            ], 404);
        }

        // length question
        $length_question = Answer::with('question')
                        ->where('exam_id', $exam_group->exam->id)
                        ->orderBy('question_order', 'ASC')
                        ->count();

        // urutkan jawaban soal berdasarkan kolom answer_order
        if ($question_active) {
            $order = explode(',', $question_active->answer_order);
            $answer = [];
            foreach ($order as $index) {
                switch ($index) {
                    case '1':
                        $answer[] = [
                            'option' => 1,
                            'value' => $question_active->question->option_1
                        ];
                        break;
                    case '2':
                        $answer[] = [
                            'option' => 2,
                            'value' => $question_active->question->option_2
                        ];
                        break;
                    case '3':
                        $answer[] = [
                            'option' => 3,
                            'value' => $question_active->question->option_3
                        ];
                        break;
                    case '4':
                        $answer[] = [
                            'option' => 4,
                            'value' => $question_active->question->option_4
                        ];
                        break;
                    case '5':
                        $answer[] = [
                            'option' => 5,
                            'value' => $question_active->question->option_5
                        ];
                        break;
                }
            }
        }
        

        return response()->json([
            'success'           => 200,
            'message'           => "Soal ragah tuah",
            'data'              => [
                'length_question'    => $length_question,
                'question_order'     => $question_active->question_order,
                'exam_id'            => $exam_group->exam_id,
                'exam_session_id'    => $exam_group->exam_session_id,
                'question_id'        => $question_active->question->id,
                'question'           => $question_active->question->question,
                'answer'             => $answer,
                'answered'           => $question_active->answer
            ],
        ],200);
    }
}
