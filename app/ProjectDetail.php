<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectDetail extends Model
{
    protected $fillable = [
    		'user_id',
    		'project_title',
    		'project_detail',
    ];
}
