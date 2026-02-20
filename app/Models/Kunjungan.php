<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Kunjungan extends Model
{
    protected $table = 'kunjungan';

    protected $fillable = [
        'tanggal_kunjungan', 
        'poli', 
        'status',
        'dokter_id',
        'status'
    ];

    protected $casts = [
        'tanggal_kunjungan' => 'date',
    ];

    public function pasien(): BelongsTo 
    {
        return $this->belongsTo(Pasien::class);
    }

    public function dokter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'dokter_id');
    }

    public function rekamMedis(): HasOne
    {
        return $this->hasOne(RekamMedis::class);
    }

}
