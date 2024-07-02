<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jemaat extends Model
{
    use HasFactory;
    protected $table = 'jemaat';
    protected $primarykey = 'id';
    protected $fillable = ['user_id', 'nama_lengkap', 'jenis_kelamin', 'alamat', 'tanggal_lahir', 'golongan_darah', 'surat_akte_lahir',' nama_ayah', 'nama_ibu', 'NIK', 'status_jemaat', 'status_vaksin'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function baptis() {
        return $this->hasOne(Baptis::class);
    }

    public function menikah() {
        return $this->hasOne(Menikah::class);
    }

    public function sidi() {
        return $this->hasOne(Sidi::class);
    }

    public function kematian() {
        return $this->hasOne(Kematian::class);
    }
}
