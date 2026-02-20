<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Resep extends Model
{
    protected $table = 'resep';
    
    protected $fillable = [
        'rekam_medis_id',
        'nama_obat',
        'dosis',
        'aturan_pakai'
    ];

    public function rekamMedis(): BelongsTo
    {
        return $this->belongsTo(RekamMedis::class);
    }
}
