@extends('layouts.users.index')


@section('content')
    <div class="container">
        <!-- Wrapper for profile form container -->
        <h3>{{ $cv_template->cv_template_name }}</h3>
        <div class="form-wrapper row p-0">
            <!-- Profile form container -->
            <div class="col-9 profile-form rounded border border-dark" id="sidebar"
                style="background-color: aliceblue; color: black;">
                <form class="col" action="{{route('cvSaveAdd')}}" method="post">
                    @csrf
                    <div class="row">
                        <!-- Form fields -->
                        <div class="col-4 p-3">
                            <img src="{{ asset('images/default-avatar.webp') }}" alt="" width="100%">
                            <hr>
                            <h5>Thông tin cá nhân</h5>
                            <div class="mb-3">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fa-solid fa-phone"></i>
                                    </span>
                                    <input type="number" class="form-control" name="user_cv_phone" placeholder="Phone" aria-label="phone"
                                        aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fa-solid fa-envelope"></i>
                                    </span>
                                    <input type="email" class="form-control" name="user_cv_email" placeholder="Email" aria-label="email"
                                        aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fa-brands fa-facebook"></i>
                                    </span>
                                    <input type="text" class="form-control" name="user_cv_facebook" placeholder="Facebook" aria-label="facebook"
                                        aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fa-solid fa-location-dot"></i>
                                    </span>
                                    <input type="text" class="form-control" name="user_cv_address" placeholder="Address" aria-label="address"
                                        aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <hr>
                            <h5>Các kỹ năng</h5>
                            <div class="mb-3">
                                <label for="email" class="form-label">Tên kỹ năng</label>
                                <input type="text" class="form-control" name="user_cv_skill_name">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Mô tả kỹ năng</label>
                                <input type="text" class="form-control" name="user_cv_skill_description">
                            </div>
                            <hr>
                            <h5>Sở thích</h5>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="user_cv_interest"
                                    placeholder="Kể tên sở thích">
                            </div>
                            <hr>
                            <h5>Người giới thiệu</h5>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="user_cv_presenter"
                                    placeholder="Thông tin người giới thiệu và thông tin liên hệ">
                            </div>
                            <hr>
                            <h5>Danh hiệu và giải thưởng</h5>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="user_cv_titles_awards"
                                    placeholder="Thời gian  Tên giải thưởng">
                            </div>
                            <hr>
                            <h5>Thông tin thêm</h5>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="user_cv_more_information"
                                    placeholder="Điền thông tin thêm nếu có">
                            </div>
                        </div>
                        <div class="col-8 bg-white p-3">
                            <div class="mb-3">
                                <label for="fullname" class="form-label">Họ và tên</label>
                                <input type="text" class="form-control" name="user_cv_fullname"
                                    placeholder="Họ và Tên">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Vị trí ứng tuyển</label>
                                <input type="text" class="form-control" name="user_cv_nominee"
                                    placeholder="Vị trí ứng tuyển">
                            </div>
                            <div class=" border border-warning rounded-pill d-flex justify-content-center mb-3">
                                <h5 class="">Mục tiêu nghề nghiệp</h5>
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control" name="user_cv_career_goals" placeholder="Leave a comment here" style="height: 100px" id="floatingTextarea"></textarea>
                                <label for="floatingTextarea">Comments</label>
                            </div>
                            <hr>
                            <div class=" border border-warning rounded-pill d-flex justify-content-center mb-3">
                                <h5 class="">Kinh nghiệm làm việc</h5>
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control" name="user_cv_work_experience" placeholder="Leave a comment here" style="height: 100px" id="floatingTextarea"></textarea>
                                <label for="floatingTextarea">Comments</label>
                            </div>
                            <hr>
                            <div class=" border border-warning rounded-pill d-flex justify-content-center mb-3">
                                <h5 class="">Hoạt động</h5>
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control" name="user_cv_activities" placeholder="Leave a comment here" style="height: 100px" id="floatingTextarea"></textarea>
                                <label for="floatingTextarea">Comments</label>
                            </div>
                            <hr>
                            <div class=" border border-warning rounded-pill d-flex justify-content-center mb-3">
                                <h5 class="">Học vấn</h5>
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control" name="user_cv_education" placeholder="Leave a comment here" style="height: 100px" id="floatingTextarea"></textarea>
                                <label for="floatingTextarea">Comments</label>
                            </div>
                            <hr>
                            <div class=" border border-warning rounded-pill d-flex justify-content-center mb-3">
                                <h5 class="">Dự án</h5>
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control" name="user_cv_projects" placeholder="Leave a comment here" style="height: 100px" id="floatingTextarea"></textarea>
                                <label for="floatingTextarea">Comments</label>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary mt-2">Save</button>
                            </div>
                            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                            <input type="hidden" name="cv_template_id" value="{{ $cv_template->cv_template_id }}">
                        </div>
                    </div>

                </form>
            </div>
            <div class="col-3">
                <!-- Color options -->
                <div class="color-options mt-3">
                    <div class="">
                        <h5>Background Color</h5>
                        <button class="btn btn-outline-secondary"
                            onclick="changeBackgroundColor('sidebar', 'white')">White</button>
                        <button class="btn btn-primary"
                            onclick="changeBackgroundColor('sidebar', 'lightblue')">Blue</button>
                        <button class="btn btn-success"
                            onclick="changeBackgroundColor('sidebar', 'lightgreen')">Green</button>
                    </div>
                    <div class="">
                        <h5>Text color</h5>
                        <button class="btn btn-outline-secondary" onclick="changeTextColor('sidebar', 'white')">White
                            Text</button>
                        <button class="btn btn-dark" onclick="changeTextColor('sidebar', 'black')">Black
                            Text</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
@endsection
