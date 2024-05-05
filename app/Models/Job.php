<?php

namespace App\Models;

use App\Models\Company;
use App\Models\Career;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'job';

    protected $primarykey = 'job_id';

    public $timestamps = false;

    protected $fillable = [
        'job_name',
        'company_id',
        'career_id',
        'background_job_image',
        'job_tittle',
        'job_salary',
        'job_place',
        'job_experience',
        'job_detail_info',
    ];

    // Trong model Job.php

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'company_id');
    }

    public function career()
    {
        return $this->belongsTo(Career::class, 'career_id', 'career_id');
    }
}
