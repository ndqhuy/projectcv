<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model; 

class Career extends Model{
    protected $table = 'career';

    protected $primarykey = 'career_id';

    public $timestamps = false;

    protected $fillable = [
        'career_name',
    ];
}


?>