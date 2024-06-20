<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registrasi extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = [
        'id',
        'NPK',
        'totalKeluarga',
        'Transportasi',
        'titikJemput',

    ];
}