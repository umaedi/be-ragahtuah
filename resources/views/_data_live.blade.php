<?php $i = 1 ?>
@foreach ($table as $tb)
<tr>
    <td>{{ $i++ }}</td>
    <td>{{ $tb->student->nisn }}</td>
    <td>{{ $tb->student->name }}</td>
    @if ($tb->login == 1)
    <td>Sedang Mengerjakan</td>
    @else
    <td>Selesai</td>
    @endif
    <td>{{ $tb->grade }}</td>
</tr>   
@endforeach
