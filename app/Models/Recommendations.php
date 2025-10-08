<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recommendations extends Model
{
    protected $table = '_recommendations';
    protected $fillable = [
        'student_id',
        'strand_code',
        'recommended_material',
        'reason',
    ];
}
