<?php

namespace App\Models;

use App\Models\Users;
use App\Models\CvTemplates;
use Illuminate\Database\Eloquent\Model; 

class UserCvs extends Model{
    protected $table = 'user_cvs';

    protected $primarykey = 'user_cv_id';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'cv_template_id',
        'user_cv_phone',
        'user_cv_email',
        'user_cv_facebook',
        'user_cv_address',
        'user_cv_skill_name',
        'user_cv_skill_description',
        'user_cv_interest',
        'user_cv_presenter',
        'user_cv_titles_awards',
        'user_cv_more_information',
        'user_cv_fullname',
        'user_cv_nominee',
        'user_cv_career_goals',
        'user_cv_work_experience',
        'user_cv_activities',
        'user_cv_education',
        'user_cv_projects',
    ];

    // Định nghĩa mối quan hệ với User (một đơn ứng tuyển thuộc về một người dùng)
    public function users()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }

    public function cvTemplates()
    {
        return $this->belongsTo(CvTemplates::class, 'cv_template_id', 'cv_template_id');
    }

}


?>