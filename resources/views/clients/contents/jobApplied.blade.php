@extends('layouts.users.index')


@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-8 pe-4 bg-white">
                <div class="row">
                    <div class="bg-success p-3 rounded-top">
                        <h2 class="tittle_company">
                            Việc làm đã ứng tuyển
                        </h2>
                        <p class="tittle_company">Khám phá cơ hội việc làm được gợi ý dựa trên mong muốn, kinh nghiệm và kỹ
                            năng
                            của bạn. Đón lấy sự nghiệp thành công với công việc phù hợp nhất dành cho bạn!</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    @php
                        $index = 1; // Khởi tạo biến số thứ tự
                    @endphp

                    @if ($applications->isEmpty())
                        <p>Bạn chưa ứng tuyển vào bất kỳ việc làm nào.</p>
                    @else
                        <ul>
                            @foreach ($applications as $application)
                                <li>
                                    <a href="{{ route('jobDetail', ['id' => $application->job->job_id]) }}">
                                        <div class="card mb-3 p-0" style="max-width: 100%;">
                                            <div class="row g-0">
                                                <div class="col-md-4">
                                                    <img src="{{ asset('images/' . $application->job->background_job_image) }}" width="100%"
                                                        class="img-fluid rounded-start" alt="...">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{ $application->job->job_name }}</h5>
                                                        <p class="card-text">{{ $application->job->job_tittle }}</p>
                                                        <span>Trạng thái: {{ $application->status }}</span>
                                                        <p class="card-text"><small class="text-muted">{{ $application->job->job_place }}</small></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                </div>
            </div>
            <div class="col-4 ps-4 bg-white">
                <h3>Có thể bạn quan tâm</h3>
                <div class="bg-success p-3 rounded-top">
                    <img src="https://cdn-new.topcv.vn/unsafe/400x/https://static.topcv.vn/v4/image/brand-identity/dich-vu-tu-van-cv-doc-dao-topcv.png"
                        width="100%" alt="">
                </div>
            </div>
        </div>
    </div>
    </div>
    <hr>
@endsection
