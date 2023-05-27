<?php

namespace App\Models;

use App\Models\User;

use Illuminate\Database\Eloquent\Model;


class User extends Model {

    protected $table = 'tbluserjob';

    protected $fillable = [
        'jobid', 'jobname',
    ];

    public $timestamps = false;

    protected $primaryKey = 'jobid';
    
}