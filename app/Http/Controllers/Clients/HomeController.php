<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;
use App\Models\Applications;
use App\Models\Career;
use App\Models\Company;
use App\Models\CvTemplates;
use App\Models\Job;
use App\Models\UserCvs;
use App\Models\Users;
use App\Models\UserSavedJob;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\FlareClient\View;


class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'jobs' => Job::get(),
            'companys' => Company::orderBy('company_id', 'desc')->take(9)->get(),
            'careers' => Career::orderBy('career_id', 'desc')->get(),
        ];
        return view('clients.contents.home')->with($data);
    }

    public function searchNav(Request $request)
    {
        $keyword = $request->get('keyword');
        $career_id = $request->get('career_id');
        $data = [
            'jobs' => Job::where(function ($query) use ($keyword) {
                $query->where('job_name', 'like', '%' . $keyword . '%')
                    ->orWhere('company_id', 'like', '%' . $keyword . '%');
            })->get(),
            'companies' => Company::where(function ($query) use ($keyword) {
                $query->where('company_name', 'like', '%' . $keyword . '%')
                    ->orWhere('company_address', 'like', '%' . $keyword . '%');
            })->get(),
            'career' => Career::where(function ($query) use ($career_id) {
                $query->where('career_id', 'like', '%' . $career_id . '%');
            })->get(),
            'keyword' => $keyword,
            'career_id' => $career_id,
        ];
        return view('clients.contents.jobList')->with($data);
    }
    public function jobList()
    {
        $data = [
            'jobs' => Job::get(),
        ];
        return view('clients.contents.jobList')->with($data);
    }
    public function jobDetail($id)
    {
        $job = Job::where('job_id', $id)->with('company')->first();
        $user_id = auth()->user()->id; // Lấy ID của người dùng đã đăng nhập
        $userCvs = UserCvs::where('user_id', $user_id)->get();

        if (!$job) {
            // Xử lý khi không tìm thấy công việc với id tương ứng
            abort(404);
        }

        $data = [
            'job' => $job,
            'userCvs' => $userCvs
        ];
        return view('clients.contents.jobDetail')->with($data);
    }
    public function jobApply(Request $request, $job_id)
    {
        $user_id = Auth::id();
        $application = new Applications();
        $application->user_id = $user_id;
        $application->job_id = $job_id;
        $application->user_cv_id = $request->user_cv_id;
        $application->status = 'Đã ứng tuyển'; // Có thể có trạng thái khác tùy vào logic của bạn
        $application->save();
        // dd($application);
        return redirect()->route('jobApplied');
    }
    public function jobApplied()
    {
        $user_id = Auth::id();

        $data = [
            'applications' => Applications::where('user_id', $user_id)
                ->with('job') // Load thông tin việc làm liên quan
                ->get(),
        ];  

        return view('clients.contents.jobApplied')->with($data);
    }
    public function saveJob(Request $request)
    {
        // Lấy job_id từ request
        $job_id = $request->input('job_id');

        // Thực hiện lưu việc làm vào cơ sở dữ liệu (ví dụ: bảng user_saved_jobs)
        $user_id = auth()->id(); // Lấy ID của người dùng đã đăng nhập

        // Thực hiện lưu thông tin việc làm đã lưu của người dùng vào bảng user_saved_jobs
        $userSavedJob = new UserSavedJob();
        $userSavedJob->user_id = $user_id;
        $userSavedJob->job_id = $job_id;
        $userSavedJob->save();

        // Chuyển hướng đến trang hiển thị các việc làm đã lưu của người dùng
        return redirect()->route('savedJob'); // Điều hướng đến route hiển thị việc làm đã lưu

    }
    public function savedJob()
    {
        $user_id = auth()->id(); // Lấy ID của người dùng đã đăng nhập

        // Lấy danh sách các việc làm đã lưu của người dùng từ bảng user_saved_jobs
        $data = [
            'savedJobs' => UserSavedJob::where('user_id', $user_id)->with('job')->get()
        ];

        return view('clients.contents.savedJob')->with($data);
    }
    public function deleteSavedJob($id)
    {
        UserSavedJob::where('user_saved_job_id', $id)->delete();
        return redirect()->route('savedJob')->with('success', 'Đã xóa việc làm khỏi danh sách đã lưu.');
    }
    public function cvModel()
    {
        $data = [
            'cv_templates' => CvTemplates::get(),
        ];
        return view('clients.contents.cvModel')->with($data);
    }
    public function cvAdd($id)
    {
        $data = [
            'cv_template' => CvTemplates::where('cv_template_id', $id)->first(),
        ];

        // dd($data);
        return view('clients.contents.cvAdd ')->with($data);
    }
    public function cvSaveAdd(Request $request)
    {

        // Lấy tất cả dữ liệu từ request
        $userCv = $request->except('_token');
        UserCvs::create($userCv);

        return redirect()->route('viewUserCvs');
    }
    public function cvSaveUpdate(Request $request)
    {

        // Lấy tất cả dữ liệu từ request
        $userCv = $request->except('_token');
        UserCvs::where('user_cv_id', $userCv['user_cv_id'])->update($userCv);

        return redirect()->route('viewUserCvs');
    }
    //
    public function viewUserCvs()
    {
        $user_id = auth()->user()->id; // Lấy ID của người dùng đã đăng nhập
        $userCvs = UserCvs::where('user_id', $user_id)->get();

        return view('clients.contents.viewUserCvs', ['userCvs' => $userCvs]);
    }
    public function detailUserCv($id)
    {
        $data = [
            'cv_template' => CvTemplates::where('cv_template_id', $id)->first(),
            'userCv' => UserCvs::where('user_cv_id', $id)->first()
        ];
        // $userCv = UserCvs::findOrFail($id);

        return view('clients.contents.detailUserCv')->with($data);
    }
    public function cvDelete($id)
    {
        UserCvs::where('user_cv_id', $id)->delete();
        return redirect()->route('viewUserCvs');
    }
    public function companyList()
    {
        $data = [
            'companies' => Company::orderBy('company_id', 'desc')->take(3)->get(),
            'careers' => Career::orderBy('career_id', 'desc')->get(),
        ];
        return view('clients.contents.companyList')->with($data);
    }
    public function companyDetail($id)
    {
        $company = Company::where('company_id', $id)->first();

        if (!$company) {
            // Xử lý khi không tìm thấy công việc với id tương ứng
            abort(404);
        }

        $data = [
            'company' => $company,
        ];
        return view('clients.contents.companyDetail')->with($data);
    }
    //
    public function register()
    {
        return view('clients.contents.register');
    }
    public function saveRegister(Request $request)
    {
        $user =  new Users();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->dob = $request->dob;
        $user->address = $request->address;
        $user->phone = $request->phone;

        // // debug password hash
        // $plainPassword = $request->password;

        // // Mã hóa chuỗi mật khẩu
        // $hashedPassword = Hash::make($plainPassword);

        // // So sánh chuỗi mật khẩu với mật khẩu đã được mã hóa
        // if (Hash::check($plainPassword, $hashedPassword)) {
        //     // Chuỗi mật khẩu khớp với mật khẩu đã được mã hóa
        //     return $hashedPassword;
        // } else {
        //     // Chuỗi mật khẩu không khớp với mật khẩu đã được mã hóa
        //     return false;
        // }

        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $res = $user->save();

        if ($res) {
            return redirect()->route('login');
        } else {
            return redirect()->back();
        }
    }
    //
    public function login()
    {
        return view('clients.contents.login');
    }
    public function loginPost(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->route('home')->with('success', 'Login Successfully');
        }

        return back()->with('error', 'Login Failed');
    }

    public function logOut(Request $request)
    {
        Auth::logout(); // Đăng xuất người dùng

        $request->session()->invalidate(); // Hủy bỏ session của người dùng

        $request->session()->regenerateToken(); // Tạo lại CSRF token mới

        return redirect('/'); // Chuyển hướng người dùng về trang chính sau khi đăng xuất
    }
}
