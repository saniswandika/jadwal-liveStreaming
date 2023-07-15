<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'absensi';
    protected $fillable = [
        'periode' ,
        'tanggal_absen',
        'name',
        'nama_acara' ,
        'bukti_absen' ,
        'nama_pj' ,
        'attendance',
        'keterangan'
     ];
    
}
