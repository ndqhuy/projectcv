<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;
use App\Models\Applications;
use App\Models\Career;
use App\Models\Company;
use App\Models\Job;
use App\Models\UserCvs;
use App\Models\Users;
use App\Models\UserSavedJob;
use Illuminate\Support\Facades\Auth;
use Spatie\FlareClient\View;

class DashboardController extends Controller
{
    //
    public function admin()
    {
        return view('layouts.admin.index');
    }
    //
    public function logOut(Request $request)
    {
        Auth::logout(); // Đăng xuất người dùng

        $request->session()->invalidate(); // Hủy bỏ session của người dùng

        $request->session()->regenerateToken(); // Tạo lại CSRF token mới

        return redirect()->route('logon'); // Chuyển hướng người dùng về trang chính sau khi đăng xuất
    }
    //
    public function logon()
    {
        return view('admin.contents.logon');
    }
    public function checkLogon(Request $request)
    {
        if (Auth::attempt([
            'email' => $request->input('email'), 'password' => $request->input('password')
        ])) {
            if (Auth::user()->role == 1) {
                return redirect()->route('dashboard');
            }
        }
        // Nếu không phải admin, chuyển hướng về trang không được phép
        return redirect()->back();
    }
    //
    public function careerListDashboard()
    {
        $data = [
            'careers' => Career::get(),
        ];
        return view('admin.contents.careerListDashboard')->with($data);
    }
    public function careerAddDashboard()
    {
        return view('admin.contents.careerAddDashboard');
    }
    public function saveAddCareerDashboard(Request $request)
    {
        $career = $request->except('_token'); // Lấy các dữ liệu form trừ token

        // Tạo mới đối tượng Job và lưu vào database
        Career::create($career);

        // Chuyển hướng về danh sách công việc sau khi lưu thành công
        return redirect()->route('careerList.dashboard');
    }
    public function careerEditDashboard($id)
    {
        $career = Career::where('career_id', $id)->first();

        if (!$career) {
            // Xử lý khi không tìm thấy công việc với id tương ứng
            abort(404);
        }

        $data = [
            'career' => $career,
        ];
        return view('admin.contents.careerEditDashboard')->with($data);
    }
    public function saveEditCareerDashboard(Request $request)
    {
        $career = $request->except('_token');
        
        Career::where('career_id', $career['career_id'])->update($career);
        return redirect()->route('careerList.dashboard');
    }
    public function deleteCareerDashboard($id)
    {
        Career::where('career_id', $id)->delete();
        return redirect()->route('careerList.dashboard');
    }
    //
    public function jobListDashboard()
    {
        $data = [
            'jobs' => Job::select('job.*', 'company.company_name', 'career_name')
                ->join('company', 'job.company_id', '=', 'company.company_id')
                ->join('career', 'job.career_id', '=', 'career.career_id')
                ->get(),
        ];
        return view('admin.contents.jobListDashboard')->with($data);
    }
    //
    public function applicationsListDashboard()
    {
        $data = [
            'applications' => Applications::get(),
        ];
        return view('admin.contents.applicationsListDashboard')->with($data);
    }
    public function savedJobDashboard()
    {
        $data = [
            'userSavedJobs' => UserSavedJob::get(),
        ];
        return view('admin.contents.savedJobDashboard')->with($data);
    }
    public function userCvsListDashboard()
    {
        $data = [
            'userCvs' => UserCvs::get(),
        ];
        return view('admin.contents.userCvsListDashboard')->with($data);
    }
    //
    public function searchJobList(Request $request)
    {
        $keyword = $request->get('keyword');
        $data = [
            'jobs' => Job::where(function ($query) use ($keyword) {
                $query->where('job_name', 'like', '%' . $keyword . '%')
                ->orWhere('company_id', 'like', '%' . $keyword . '%')
                ->orWhere('carrer_id', 'like', '%' . $keyword . '%');
            })->get(),
            'keyword' => $keyword,
        ];
        return view('admin.contents.jobListDashboard')->with($data);
    }
    public function jobDetailDashboard($id)
{
    // Truy vấn thông tin công việc
    $job = Job::select('job.*', 'company.company_name', 'career.career_name')
        ->join('company', 'job.company_id', '=', 'company.company_id')
        ->join('career', 'job.career_id', '=', 'career.career_id')
        ->where('job.job_id', $id) // Đảm bảo chỉ lấy công việc với ID tương ứng
        ->first();

    // Kiểm tra nếu không tìm thấy công việc
    if (!$job) {
        abort(404); // Trả về trang lỗi 404
    }

    // Dữ liệu để truyền vào view
    $data = [
        'job' => $job,
    ];

    // Hiển thị view với dữ liệu đã lấy được
    return view('admin.contents.jobDetailDashboard')->with($data);
}

    public function jobAddDashboard()
    {
        $data = [
            'companys' => Company::orderBy('company_id', 'desc')->get(),
            'careers' => Career::orderBy('career_id', 'desc')->get(),
        ];
        return view('admin.contents.jobAddDashboard')->with($data);
    }
    public function saveAddJobDashboard(Request $request)
    {
        $job = $request->except('_token'); // Lấy các dữ liệu form trừ token

        // Kiểm tra xem có file được upload không
        if ($request->hasFile('background_job_image')) {
            $file1 = $request->file('background_job_image');

            // Kiểm tra nếu file là hợp lệ
            if ($file1->isValid()) {
                // Tạo tên file mới duy nhất
                $newFileName = uniqid() . '.' . $file1->getClientOriginalExtension();

                // Di chuyển file đã upload đến thư mục public/images
                $file1->move(public_path('images'), $newFileName);

                // Cập nhật trường 'picture' trong $job với tên file mới
                $job['background_job_image'] = $newFileName;
            } else {
                // Xử lý khi file không hợp lệ
                return redirect()->back()->with('error', 'File upload không hợp lệ.');
            }
        }

        // Tạo mới đối tượng Job và lưu vào database
        Job::create($job);

        // Chuyển hướng về danh sách công việc sau khi lưu thành công
        return redirect()->route('jobList.dashboard');
    }

    public function jobEditDashboard($id)
    {
        $job = Job::where('job_id', $id)->first();

        if (!$job) {
            // Xử lý khi không tìm thấy công việc với id tương ứng
            abort(404);
        }

        $data = [
            'job' => $job,
        ];
        return view('admin.contents.jobEditDashboard')->with($data);
    }
    public function saveEditJobDashboard(Request $request)
    {
        $job = $request->except('_token');
        // Kiểm tra xem có file được upload không
        if ($request->hasFile('background_job_image')) {
            $file1 = $request->file('background_job_image');

            // Kiểm tra nếu file là hợp lệ
            if ($file1->isValid()) {
                // Tạo tên file mới duy nhất
                $newFileName = uniqid() . '.' . $file1->getClientOriginalExtension();

                // Di chuyển file đã upload đến thư mục public/images
                $file1->move(public_path('images'), $newFileName);

                // Cập nhật trường 'picture' trong $job với tên file mới
                $job['background_job_image'] = $newFileName;
            } else {
                // Xử lý khi file không hợp lệ
                return redirect()->back()->with('error', 'File upload không hợp lệ.');
            }
        }
        Job::where('job_id', $job['job_id'])->update($job);
        return redirect()->route('jobList.dashboard');
    }
    public function deleteJobDashboard($id)
    {
        Job::where('job_id', $id)->delete();
        return redirect()->route('jobList.dashboard');
    }
    //
    public function companyListDashboard()
    {
        $data = [
            'companies' => Company::get(),
        ];
        return view('admin.contents.companyListDashboard')->with($data);
    }
    public function searchCompanyList(Request $request)
    {
        $keyword = $request->get('keyword');
        $data = [
            'companies' => Company::where(function ($query) use ($keyword) {
                $query->where('company_name', 'like', '%' . $keyword . '%')
                    ->orWhere('company_address', 'like', '%' . $keyword . '%');
            })->get(),
            'keyword' => $keyword,
        ];
        return view('admin.contents.companyListDashboard')->with($data);
    }

    public function companyDetailDashboard($id)
    {
        $company = Company::where('company_id', $id)->first();

        if (!$company) {
            // Xử lý khi không tìm thấy công việc với id tương ứng
            abort(404);
        }

        $data = [
            'company' => $company,
        ];
        return view('admin.contents.companyDetailDashboard')->with($data);
    }
    public function companyAddDashboard()
    {
        return view('admin.contents.companyAddDashboard');
    }
    public function saveAddcompanyDashboard(Request $request)
    {
        $company = $request->except('_token');

        // Xử lý upload file logo_image
        if ($request->hasFile('logo_company_image')) {
            $logoFile = $request->file('logo_company_image');
            if ($logoFile->isValid()) {
                $logoFileName = uniqid() . '.' . $logoFile->getClientOriginalExtension();
                $logoFile->move(public_path('images'), $logoFileName);
                $company['logo_company_image'] = $logoFileName;
            }
        }

        // Xử lý upload file background_image
        if ($request->hasFile('background_company_image')) {
            $bgFile = $request->file('background_company_image');
            if ($bgFile->isValid()) {
                $bgFileName = uniqid() . '.' . $bgFile->getClientOriginalExtension();
                $bgFile->move(public_path('images'), $bgFileName);
                $company['background_company_image'] = $bgFileName;
            }
        }

        // Lưu dữ liệu công ty vào cơ sở dữ liệu
        Company::create($company);

        return redirect()->route('companyList.dashboard');
    }

    public function companyEditDashboard($id)
    {
        $company = Company::where('company_id', $id)->first();

        if (!$company) {
            // Xử lý khi không tìm thấy công việc với id tương ứng
            abort(404);
        }

        $data = [
            'company' => $company,
        ];
        return view('admin.contents.companyEditDashboard')->with($data);
    }
    public function saveEditCompanyDashboard(Request $request)
    {
        $company = $request->except('_token');

        // Xử lý upload file logo_image
        if ($request->hasFile('logo_company_image')) {
            $logoFile = $request->file('logo_company_image');
            if ($logoFile->isValid()) {
                $logoFileName = uniqid() . '.' . $logoFile->getClientOriginalExtension();
                $logoFile->move(public_path('images'), $logoFileName);
                $company['logo_company_image'] = $logoFileName;
            }
        }

        // Xử lý upload file background_image
        if ($request->hasFile('background_company_image')) {
            $bgFile = $request->file('background_company_image');
            if ($bgFile->isValid()) {
                $bgFileName = uniqid() . '.' . $bgFile->getClientOriginalExtension();
                $bgFile->move(public_path('images'), $bgFileName);
                $company['background_company_image'] = $bgFileName;
            }
        }

        Company::where('company_id', $company['company_id'])->update($company);
        return redirect()->route('companyList.dashboard');
    }
    public function deleteCompanyDashboard($id)
    {
        Company::where('company_id', $id)->delete();
        return redirect()->route('companyList.dashboard');
    }


    public function userList()
    {
        $data = [
            'users' => Users::get(),
        ];
        return view('admin.contents.userList')->with($data);
    }
    public function userAdd()
    {
        return view('admin.contents.userAdd');
    }
    public function saveAddUser(Request $request)
    {
        $user = $request->except('_token');
        Users::create($user);
        return redirect('/dashboard/user-list');
    }
    public function userEdit($id)
    {
        $data = [
            'user' => Users::find($id),
        ];
        return view('admin.contents.userEdit')->with($data);
    }
    public function saveEditUser(Request $request)
    {
        $user = $request->except('_token');
        Users::where('id', $user['id'])->update($user);
        return redirect('/dashboard/user-list');
    }
    public function deleteUser($id)
    {
        Users::where('id', $id)->delete();
        return redirect('/dashboard/user-list');
    }
}
