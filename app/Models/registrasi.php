<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class registrasi extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = [
        'id',
        'NPK',
        'sendEmail'


    ];

        public function karyawan(): BelongsTo
    {
        return $this->belongsTo(karyawan::class, 'NPK', 'NPK');
    }
}