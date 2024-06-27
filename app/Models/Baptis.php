<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baptis extends Model
{
    use HasFactory;
    protected $table = 'baptis';
    protected $primarykey = 'id';
    protected $fillable = ['jemaat_id', 'tanggal_baptis', 'status_baptis'];

    public function jemaat() {
        return $this->belongsTo(Jemaat::class);
    }
}
