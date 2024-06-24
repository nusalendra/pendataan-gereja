<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jemaat extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'jemaat';
    protected $primarykey = 'id';
    protected $fillable = ['user_id', 'nama_lengkap', 'jenis_kelamin', 'alamat', 'tanggal_lahir', 'umur', 'nama_ayah', 'nama_ibu', 'NIK', 'status_jemaat'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function baptis() {
        return $this->hasOne(Baptis::class);
    }

    public function menikah() {
        return $this->hasMany(Menikah::class);
    }

    public function sidi() {
        return $this->hasOne(Sidi::class);
    }
}
