<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $fillable = ['nik', 'nama', 'tanggal_lahir', 'jenis_kelamin', 'alamat', 'no_hp'];

    public function rekamMedis()
    {
        return $this->hasMany(RekamMedis::class);
        
    }
}
