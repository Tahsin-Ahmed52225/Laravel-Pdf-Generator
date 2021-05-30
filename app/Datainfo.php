<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Datainfo extends Model
{
    protected $table = "datainfo";
    protected $fillable = [
        'Student_name', 'Student_email', 'Department', 'Student_id',
    ];
}
