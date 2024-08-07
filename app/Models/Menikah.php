<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menikah extends Model
{
    use HasFactory;
    protected $table = 'menikah';
    protected $primarykey = 'id';
    protected $fillable = ['jemaat_id', 'nama_pasangan', 'jenis_kelamin_pasangan', 'tempat_lahir_pasangan', 'tanggal_lahir_pasangan', 'nama_ayah_pasangan', 'nama_ibu_pasangan', 'surat_baptis_pasangan', 'surat_sidi_pasangan', 'status_menikah'];

    public function jemaat() {
        return $this->belongsTo(Jemaat::class);
    }
}
