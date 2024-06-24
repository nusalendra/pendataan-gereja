<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sidi extends Model
{
    use HasFactory;
    protected $table = 'sidi';
    protected $primarykey = 'id';
    protected $fillable = ['jemaat_id', 'gereja_yang_membaptis', 'tanggal_sidi', 'status_sidi'];

    public function jemaat() {
        return $this->belongsTo(Jemaat::class);
    }
}
