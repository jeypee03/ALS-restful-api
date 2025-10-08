<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Learningstrand extends Model
{
   
    protected $table = 'learning_strands';
    protected $fillable = [
        'title',
        'description',
        'teacher_id',
        'category',
    ];
}
