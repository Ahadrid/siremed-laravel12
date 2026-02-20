<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Diagnosa extends Model
{
    protected $table = 'diagnosa';
    
    protected $fillable = [
        'rekam_medis_id',
        'kode_icd',
        'nama_diagnosa'
    ];

    public function rekamMedis(): BelongsTo
    {
        return $this->belongsTo(RekamMedis::class);
    }
}
