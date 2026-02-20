<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tindakan extends Model
{
    protected $table = 'tindakan';
    protected $fillable = [
        'rekam_medis_id',
        'nama_tindakan',
        'keterangan'
    ];

    public function rekamMedis(): BelongsTo
    {
        return $this->belongsTo(RekamMedis::class);
    }
}
