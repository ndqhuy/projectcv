<?php

namespace App\Models;

use App\Models\Users;
use App\Models\Job;
use App\Models\UserCvs;


use Illuminate\Database\Eloquent\Model;

class Applications extends Model
{
    protected $table = 'applications';

    protected $primarykey = 'application_id';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'job_id',
        'user_cv_id',
        'status',
    ];

    // Định nghĩa mối quan hệ với User (một đơn ứng tuyển thuộc về một người dùng)
    public function users()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }

    // Định nghĩa mối quan hệ với Job (một đơn ứng tuyển thuộc về một công việc)
    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id', 'job_id');
    }

    // Định nghĩa mối quan hệ với UserCvs (một đơn ứng tuyển được thực hiện bằng một mẫu CV của người dùng)
    public function userCvs()
    {
        return $this->belongsTo(UserCvs::class, 'user_cv_id', 'user_cv_id');
    }
}
