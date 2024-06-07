<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}