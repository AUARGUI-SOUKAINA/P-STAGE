<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'student_id',
        'timetable_id',
    ];

    public function students()
    {
        return $this->hasMany(User::class);
    }

    public function timetable()
    {
        return $this->belongsTo(Timetable::class);
    }
}
