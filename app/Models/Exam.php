<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $fillable = ['name', 'date', 'subject_id'];

    /**
     * Get the subject that owns the exam.
     */
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function marks()
    {
        return $this->hasMany(Mark::class);
    }
}
