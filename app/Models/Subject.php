<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['name'];



    public function exams()
    {
        return $this->hasMany(Exam::class);
    }

    public function timeTables()
    {
        return $this->hasMany(TimeTable::class, 'subject_id');
    }
}
