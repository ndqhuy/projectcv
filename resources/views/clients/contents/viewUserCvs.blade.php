@extends('layouts.users.index')


@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-8 pe-4 bg-white">
                <div class="row">
                    <div class="bg-success p-3 rounded-top">
                        <h2 class="tittle_company">
                            Quản lý hồ sơ và cv
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
                    @if ($userCvs->isEmpty())
                        <p>Bạn chưa có bất kỳ việc hồ sơ nào.</p>
                    @else
                        <ul>
                            @foreach ($userCvs as $userCv)
                                <div class="col-3">
                                    <div class="card" style="width: 100%;">
                                        <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/delicate_2_v2.png?v=1.0.6"
                                            class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">Mẫu {{ $index++ }}</h5>
                                            <a href="{{ route('detailUserCv', ['id' => $userCv->user_cv_id]) }}"
                                                class="btn btn-primary">Xem chi tiết</a>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
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
