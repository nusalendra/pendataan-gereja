<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sidi extends Model
{
    use HasFactory;
    protected $table = 'sidi';
    protected $primarykey = 'id';
    protected $fillable = ['jemaat_id', 'tanggal_sidi', 'surat_baptis', 'status_sidi'];

    public function jemaat() {
        return $this->belongsTo(Jemaat::class);
    }
}
