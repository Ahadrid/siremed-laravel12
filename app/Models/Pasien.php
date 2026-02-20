<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = 'pasien'; 
    protected $fillable = [
        'nik', 
        'nama', 
        'tanggal_lahir', 
        'jenis_kelamin', 
        'alamat', 
        'no_hp'
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    public function kunjungan ()
    {
        return $this->hasMany(Kunjungan::class);
    }

    public function rekamMedis()
    {
        return $this->hasMany(RekamMedis::class);
    }
}
