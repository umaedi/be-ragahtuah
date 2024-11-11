<template>
    <Head>
        <title>Dashboard - Aplikasi Ujian Online</title>
    </Head>
    <div class="container-fluid mb-5 mt-5">
        <div class="row">
            <div class="col-12 col-sm-6 col-xl-3 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row d-block d-xl-flex align-items-center">
                            <div
                                class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center"
                            >
                                <div
                                    class="icon-shape icon-shape-info rounded me-4 me-sm-0"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor"
                                        class="bi bi-back icon icon-md"
                                        viewBox="0 0 16 16"
                                    >
                                        <path
                                            d="M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2V2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H2z"
                                        />
                                    </svg>
                                </div>
                                <div class="d-sm-none">
                                    <h2 class="h5">Kelas</h2>
                                    <h3 class="fw-extrabold mb-1">
                                        {{ classrooms }}
                                    </h3>
                                </div>
                            </div>
                            <div class="col-12 col-xl-7 px-xl-0">
                                <div class="d-none d-sm-block">
                                    <h2 class="h5">Kelas</h2>
                                    <h3 class="fw-extrabold mb-1">
                                        {{ classrooms }}
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-3 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row d-block d-xl-flex align-items-center">
                            <div
                                class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center"
                            >
                                <div
                                    class="icon-shape icon-shape-success rounded me-4 me-sm-0"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor"
                                        class="bi bi-people-fill icon icon-md"
                                        viewBox="0 0 16 16"
                                    >
                                        <path
                                            d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"
                                        />
                                        <path
                                            fill-rule="evenodd"
                                            d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"
                                        />
                                        <path
                                            d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"
                                        />
                                    </svg>
                                </div>
                                <div class="d-sm-none">
                                    <h2 class="h5">Siswa</h2>
                                    <h3 class="fw-extrabold mb-1">
                                        {{ students }}
                                    </h3>
                                </div>
                            </div>
                            <div class="col-12 col-xl-7 px-xl-0">
                                <div class="d-none d-sm-block">
                                    <h2 class="h5">Siswa</h2>
                                    <h3 class="fw-extrabold mb-1">
                                        {{ students }}
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-3 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row d-block d-xl-flex align-items-center">
                            <div
                                class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center"
                            >
                                <div
                                    class="icon-shape icon-shape-tertiary rounded me-4 me-sm-0"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor"
                                        class="bi bi-pencil-square icon icon-md"
                                        viewBox="0 0 16 16"
                                    >
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"
                                        />
                                        <path
                                            fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"
                                        />
                                    </svg>
                                </div>
                                <div class="d-sm-none">
                                    <h2 class="h5">Ujian</h2>
                                    <h3 class="fw-extrabold mb-1">
                                        {{ exams }}
                                    </h3>
                                </div>
                            </div>
                            <div class="col-12 col-xl-7 px-xl-0">
                                <div class="d-none d-sm-block">
                                    <h2 class="h5">Ujian</h2>
                                    <h3 class="fw-extrabold mb-1">
                                        {{ exams }}
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-3 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row d-block d-xl-flex align-items-center">
                            <div
                                class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center"
                            >
                                <div
                                    class="icon-shape icon-shape-danger rounded me-4 me-sm-0"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor"
                                        class="bi bi-stopwatch icon icon-md"
                                        viewBox="0 0 16 16"
                                    >
                                        <path
                                            d="M8.5 5.6a.5.5 0 1 0-1 0v2.9h-3a.5.5 0 0 0 0 1H8a.5.5 0 0 0 .5-.5V5.6z"
                                        />
                                        <path
                                            d="M6.5 1A.5.5 0 0 1 7 .5h2a.5.5 0 0 1 0 1v.57c1.36.196 2.594.78 3.584 1.64a.715.715 0 0 1 .012-.013l.354-.354-.354-.353a.5.5 0 0 1 .707-.708l1.414 1.415a.5.5 0 1 1-.707.707l-.353-.354-.354.354a.512.512 0 0 1-.013.012A7 7 0 1 1 7 2.071V1.5a.5.5 0 0 1-.5-.5zM8 3a6 6 0 1 0 .001 12A6 6 0 0 0 8 3z"
                                        />
                                    </svg>
                                </div>
                                <div class="d-sm-none">
                                    <h2 class="h5">Sesi Ujian</h2>
                                    <h3 class="fw-extrabold mb-1">
                                        {{ exam_sessions }}
                                    </h3>
                                </div>
                            </div>
                            <div class="col-12 col-xl-7 px-xl-0">
                                <div class="d-none d-sm-block">
                                    <h2 class="h5">Sesi Ujian</h2>
                                    <h3 class="fw-extrabold mb-1">
                                        {{ exam_sessions }}
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4 col-12 mb-2">
                        <Link
                            href="/admin/students"
                            class="btn btn-md btn-success border-0 shadow w-100 text-white"
                            ><i class="fa fa-eye"></i> Lihat semua
                        </Link>
                    </div>
                    <div class="col-md-8 col-12 mb-2">
                        <form @submit.prevent="handleSearch">
                            <div class="input-group">
                                <input
                                    type="text"
                                    class="form-control border-0 shadow"
                                    v-model="search"
                                    placeholder="masukkan nomor ujian atau nama lalu enter..."
                                />
                                <span class="input-group-text border-0 shadow">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-md-12">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table
                                class="table table-bordered table-centered table-nowrap mb-0 rounded"
                            >
                                <thead class="thead-dark">
                                    <tr class="border-0">
                                        <th
                                            class="border-0 rounded-start"
                                            style="width: 5%"
                                        >
                                            No.
                                        </th>
                                        <th class="border-0">Nomor Ujian</th>
                                        <th class="border-0">Nama</th>
                                        <th class="border-0">Kelas</th>
                                        <th class="border-0">Gender</th>
                                        <th class="border-0">Password</th>
                                        <th class="border-0 rounded-end">
                                            Status
                                        </th>
                                    </tr>
                                </thead>
                                <div class="mt-2"></div>
                                <tbody>
                                    <tr
                                        v-for="(
                                            student, index
                                        ) in xstudents.data"
                                        :key="index"
                                    >
                                        <td class="fw-bold text-center">
                                            {{
                                                ++index +
                                                (xstudents.current_page - 1) *
                                                    xstudents.per_page
                                            }}
                                        </td>
                                        <td>{{ student.nisn }}</td>
                                        <td>{{ student.name }}</td>
                                        <td class="text-center">
                                            {{ student.classroom.title }}
                                        </td>
                                        <td class="text-center">
                                            {{ student.gender }}
                                        </td>
                                        <td>{{ student.password }}</td>
                                        <td class="text-center">
                                            <button
                                                @click.prevent="
                                                    updateStatus(
                                                        student.id,
                                                        student.login
                                                    )
                                                "
                                                :class="{
                                                    'btn btn-sm btn-success border-0 shadow text-white':
                                                        student.login == 1,
                                                    'btn btn-sm btn-primary border-0 shadow text-white':
                                                        student.login == 2,
                                                    'btn btn-sm btn-primary border-0 shadow':
                                                        student.login == 0,
                                                }"
                                            >
                                                {{
                                                    student.login == 1
                                                        ? "On"
                                                        : "Off"
                                                }}
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <Pagination :links="students.links" align="end" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
//import layout Admin
import LayoutAdmin from "../../../Layouts/Admin.vue";

//import Heade from Inertia
import { Head, Link } from "@inertiajs/inertia-vue3";

//import inertia adapter
import { Inertia } from "@inertiajs/inertia";

//import ref from vue
import { ref } from "vue";

export default {
    //layout
    layout: LayoutAdmin,

    //register components
    components: {
        Head,
        Link,
    },

    //props
    props: {
        students: Number,
        exams: Number,
        exam_sessions: Number,
        classrooms: Number,
        xstudents: Object,
    },

    setup(props) {
        //define state search
        const search = ref(
            "" || new URL(document.location).searchParams.get("q")
        );

        //define method search
        const handleSearch = () => {
            Inertia.get("/admin/students", {
                //send params "q" with value from state "search"
                q: search.value,
            });
        };

        //define method update
        const updateStatus = (id, login) => {
            Inertia.put(`/admin/student/update_status_login/${id}`, {
                data: login,
            });
        };

        //return
        return {
            search,
            handleSearch,
            updateStatus,
        };
    },
};
</script>

<style></style>
