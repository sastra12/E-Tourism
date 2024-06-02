<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'bookings';
    protected $fillable = [
        'nama_pemesan', 'jenis_kelamin', 'nik', 'type_tour', 'tanggal_perjalanan',
        'durasi_menginap', 'makanan', 'total_tagihan', 'status'
    ];
}
