<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $fillable = [
        'student_id',
        'exam_id',
        'marks_obtained',
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
}
