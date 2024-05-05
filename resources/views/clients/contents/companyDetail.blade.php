@extends('layouts.users.index')

@section('content')
    <div class="container">
        <header class="container-fluid p-0">
            <img class="rounded w-100" src="{{asset('images/' . $company->background_company_image)}}" alt="">
        </header>
        <section class="bg-white border-bottom pb-4">
            <div class="container container-lg">
                <div class="d-flex align-items-start">
                    <div class="rounded-circle border d-flex justify-content-center align-items-center bg-white"
                        style="min-width: 200px; height: 200px; margin-top: -45px;">
                        <img class="" style="width: 135px; height: auto;"
                            src="{{asset('images/' . $company->logo_company_image)}}"
                            alt="">
                    </div>
                    <h1 class="fw-bold p-4 fs-2">
                        {{$company->company_name}}
                    </h1>
                    <button class="btn btn-success d-flex align-items-center gap-3 py-2 px-3 mt-4">
                        <i class="fa-solid fa-plus"></i>
                        <span class="fw-bold text-nowrap">Theo dõi công ty</span>
                    </button>
                </div>
            </div>
        </section>
        <div class="row mt-4">
            <div class="col-8 pe-4 bg-white ">
                <div class="row">
                    <span class="bg-success rounded-top p-3 tittle_company">Giới thiệu công ty</span>
                </div>
                <div class="row mt-3">
                    <p>
                        {!! $company->company_introduction!!}
                    </p>
                </div>
            </div>
            <div class="col-4 ps-4 bg-white">
                <div class="row">
                    <span class="bg-success rounded-top p-3 tittle_company">THông tin liên hệ</span>
                </div>
                <div class="row">
                    <span class="my-3"><i class="fa-solid fa-location-dot"></i> Địa chỉ công ty</span>
                    <p>{{$company->company_address}}</p>
                    <br>
                </div>
                <div class="row mt-2">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.5476283838057!2d106.66243187377488!3d10.769304859327594!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f7c8bf050ff%3A0x4fa87595d124cc0c!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBIb2EgU2VuIC0gQ8ahIHPhu58gVGjDoG5oIFRow6Fp!5e0!3m2!1svi!2s!4v1712194916918!5m2!1svi!2s"
                        width="300" height="380" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

            </div>
        </div>
    </div>
    <hr>
@endsection
