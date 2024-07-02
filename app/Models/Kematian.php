<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kematian extends Model
{
    use HasFactory;
    protected $table = 'kematian';
    protected $primarykey = 'id';
    protected $fillable = ['jemaat_id', 'tanggal_kematian', 'lokasi_pemakaman'];

    public function jemaat() {
        return $this->belongsTo(Jemaat::class);
    }
}
