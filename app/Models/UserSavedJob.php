<?php

namespace App\Models;

use App\Models\Users;
use App\Models\Job;
use App\Models\UserCvs;


use Illuminate\Database\Eloquent\Model;

class UserSavedJob extends Model
{
    protected $table = 'user_saved_job';

    protected $primarykey = 'user_saved_job_id';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'job_id',
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

}
