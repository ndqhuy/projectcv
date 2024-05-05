@extends('layouts.users.index')


@section('content')
    <div class="container">
        <div class="row mt-4" id="mainContent">
            @foreach ($cv_templates as $cv_template)
                <div class="col-3">
                    <div class="card" style="width: 100%;">
                        <img src="https://www.topcv.vn/images/cv/screenshots/thumbs/cv-template-thumbnails-v1.2/delicate_2_v2.png?v=1.0.6"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $cv_template->cv_template_name }}</h5>
                            <p class="card-text">{{ $cv_template->cv_template_description }}</p>
                            <a href="{{ route('cvAdd', ['id' => $cv_template->cv_template_id]) }}" class="btn btn-primary">Chọn mẫu này</a>
                        </div>
                    </div>
                    <hr>
                </div>
            @endforeach
            
        </div>
    </div>
    <hr>
@endsection
