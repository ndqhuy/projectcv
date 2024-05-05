<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model; 

class CvTemplates extends Model{
    protected $table = 'cv_templates';

    protected $primarykey = 'cv_template_id';

    public $timestamps = false;

    protected $fillable = [
        'cv_template_name',
        'cv_template_description',
    ];
}


?>