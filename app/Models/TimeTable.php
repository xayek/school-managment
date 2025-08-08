<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // <-- EKLENDİ
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TimeTable extends Model
{
    use HasFactory; // Artık doğru trait

    /**
     * Toplu atamaya izin verilen alanlar
     */
    protected $fillable = [
        'day',
        'period',
        'subject_id',
    ];

    /**
     * Eğer migration'da tablo adın "timetables" ise ve
     * Laravel'in varsayılanı "time_tables" ile uyuşmuyorsa,
     * aşağıdakini aç:
     */
    // protected $table = 'timetables';

    /**
     * Ders ilişkisi (TimeTable belongsTo Subject)
     */
    public function subject(): BelongsTo
    {
        // Subject modeli App\Models\Subject altında varsayılıyor.
        return $this->belongsTo(Subject::class);
    }
}
