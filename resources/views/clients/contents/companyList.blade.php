@extends('layouts.users.index')

@section('intro')
<div class="row">
    <h1 class="text-center text-success">
        Danh sách các công ty nổi bật
    </h1>
</div>
<div class="row mb-4">
    <span class="text-center">
        Tiếp cận 40,000+ tin tuyển dụng việc làm mỗi ngày từ hàng nghìn doanh nghiệp uy tín
        tại Việt Nam
    </span>
</div>
@include('clients.blocks.searchHeader')
@include('clients.blocks.carouselHeader')
@endsection

@section('content')
<div class="container">
    <div class="row mt-4">
        <div class="pe-4 bg-white">
            <div class="row">
                <div class="bg-success p-3 rounded-top">
                    <h2 class="tittle_company">
                        Công ty phù hợp
                    </h2>
                    <p class="tittle_company">Khám phá cơ hội việc làm được gợi ý dựa trên mong muốn, kinh nghiệm và kỹ
                        năng
                        của bạn. Đón lấy sự nghiệp thành công với công việc phù hợp nhất dành cho bạn!</p>
                </div>
            </div>
            <hr>
        </div>
    </div>
    <div class="row">
        @foreach ($companies as $company)
        <div class="col-4">
            <a href="{{route('companyDetail', ['id' => $company->company_id])}}">
                <header class="container-fluid p-0">
                    <img class="rounded w-100" src="{{asset('images/' . $company->background_company_image)}}" alt="">
                </header>
                <section class="bg-white border-bottom pb-4">
                    <div class="container container-lg">
                        <div class="d-flex align-items-start">
                            <div class="rounded-circle border d-flex justify-content-center align-items-center bg-white" style="min-width: 100px; height: 100px; margin-top: -45px;">
                                <img class="" style="width: 80px; height: auto;" src="{{asset('images/' . $company->logo_company_image)}}" alt="">
                            </div>
                            <b class="fw-bold">
                                {{$company->company_name}}
                            </b>
                        </div>
                    </div>
                </section>
            </a>
        </div>
        @endforeach
    </div>
    <hr>
    <hr>
</div>
@endsection