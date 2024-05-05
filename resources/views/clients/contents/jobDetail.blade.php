@extends('layouts.users.index')

@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-8 pe-4 job-detail">
                <div class="row bg-white p-3 rounded">
                    <h5 class="">
                        {{ $job->job_tittle }}
                    </h5>
                    <div class="row d-flex justify-content-between mb-3">
                        <div class="col text-center">
                            <i class="fa-solid fa-coins"></i>
                            {{ $job->job_salary }}
                        </div>
                        <div class="col text-center">
                            <i class="fa-solid fa-location-dot"></i>
                            {{ $job->job_place }}
                        </div>
                        <div class="col text-center">
                            <i class="fa-solid fa-hourglass-half"></i>
                            {{ $job->job_experience }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-9">
                            <button class="btn btn-success" id="applyButton" style="width: 100%"><i
                                    class="fa-solid fa-paper-plane"></i> Ứng tuyển ngay</button>
                        </div>
                        <div class="col-3">
                            <form id="saveJobForm" action="{{ route('saveJob') }}" method="post">
                                @csrf
                                <input type="hidden" name="job_id" value="{{ $job->job_id }}">
                                <button type="submit" class="btn btn-outline-success"
                                    onclick="return confirm('Bạn có chắc muốn lưu việc làm này không?')"><i class="fa-regular fa-heart"></i> Lưu tin</button>
                            </form>
                        </div>
                    </div>
                    {{--  --}}

                </div>
                <div class="row bg-white p-3 rounded mt-3">
                    <h3>
                        Chi tiết nội dung
                    </h3>
                    <div>
                        {!! $job->job_detail_info !!}
                    </div>
                </div>
                <hr>
            </div>
            <form action="{{ route('jobApply', ['job_id' => $job->job_id]) }}" method="post" id="applicationForm"
                class="position-fixed top-40 start-50 translate-middle-x bg-light p-3" style="display: none;">
                @csrf
                <h2>Chọn mẫu CV</h2>
                @php
                    $index = 1; // Khởi tạo biến số thứ tự
                @endphp

                <select class="form-control mb-3" id="" name="user_cv_id">
                    @foreach ($userCvs as $userCv)
                        <option value="{{ $userCv->user_cv_id }}">Mẫu {{ $index++ }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary">Gửi</button>
            </form>

            <div class="col-4 ps-4 bg-white">
                <div class="row">
                    <a href="{{ route('companyDetail', ['id' => $job->company->company_id]) }}">
                        <header class="container-fluid p-0">
                            <img class="rounded w-100"
                                src="{{ asset('images/' . $job->company->background_company_image) }}" alt="">
                        </header>
                        <section class="bg-white border-bottom pb-4">
                            <div class="container container-lg">
                                <div class="d-flex align-items-start">
                                    <div class="rounded-circle border d-flex justify-content-center align-items-center bg-white"
                                        style="min-width: 100px; height: 100px; margin-top: -45px;">
                                        <img class="" style="width: 80px; height: auto;"
                                            src="{{ asset('images/' . $job->company->logo_company_image) }}"
                                            alt="">
                                    </div>
                                    <b class="fw-bold">
                                        {{ $job->company->company_name }}
                                    </b>
                                </div>
                            </div>
                        </section>
                    </a>
                </div>
                <h3>Có thể bạn quan tâm</h3>
                <div class="bg-success p-3 rounded-top">
                    <img src="https://cdn-new.topcv.vn/unsafe/400x/https://static.topcv.vn/v4/image/brand-identity/dich-vu-tu-van-cv-doc-dao-topcv.png"
                        width="100%" alt="">
                </div>
            </div>
        </div>
    </div>
    <hr>
@endsection
