<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model; 

class Company extends Model{
    protected $table = 'company';

    protected $primarykey = 'company_id';

    public $timestamps = false;

    protected $fillable = [
        'company_name',
        'logo_company_image',
        'background_company_image',
        'company_link',
        'company_follower',
        'company_employee',
        'company_introduction',
        'company_address'
    ];
}


?>