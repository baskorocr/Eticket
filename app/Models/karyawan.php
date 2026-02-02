<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class karyawan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = [
        'Id',
        'NPK',
        'Nomer',
        'Bersedia',
        'Tabahan',
        
    ];

    public function regis(): HasOne
    {
        return $this->hasOne(registrasi::class, 'NPK', 'NPK');
    }
}