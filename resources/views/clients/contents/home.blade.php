@extends('layouts.users.index')

@section('intro')
@include('clients.blocks.titleHeader')
@include('clients.blocks.searchHeader')
@include('clients.blocks.carouselHeader')
@endsection

@section('content')
<div class="container">

    <div class="row mt-4">
        <h3>Top các công ty hàng đầu</h3>
        @foreach ($companys as $company)
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
    <div class="row mt-3">
        <h3>Việc làm hấp dẫn</h3>

        @foreach ($jobs as $job)
        <div class="col-4">
            <a href="{{route('jobDetail', ['id' => $job->job_id])}}">
                <div class="card mb-3 p-0" style="max-width: 100%;">
                    <div class="row g-0">
                        <div class="col-md-6">
                            <img src="{{ asset('images/' . $job->background_job_image) }}" width="100%" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="card-title">{{ $job->job_name }}</h5>
                                <p class="card-text">{{ $job->job_tittle }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
<br>
<hr>
@endsection