<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Pest\Bootstrappers\BootKernelDump;

use function Symfony\Component\Clock\now;

class RekamMedis extends Model
{
    protected $fillable = [
        'kunjungan_id',
        'pasien_id',
        'dokter_id',
        'keluhan',
        'pemeriksaan',
        'catatan',
        'status',
        'locked_at'
    ];

    protected $casts = [
        'locked_at' => 'datetime',
    ];

    public function kunjungan(): BelongsTo
    {
        return $this->belongsTo(Kunjungan::class);
    }

    public function pasien(): BelongsTo
    {
        return $this->belongsTo(Pasien::class);
    }

    public function dokter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'dokter_id');
    }

    public function diagnosa() : HasMany 
    {
        return $this->hasMany(Diagnosa::class);
    }

    public function tindakan() : HasMany 
    {
        return $this->hasMany(Tindakan::class);
    }

    public function resep() : HasMany 
    {
        return $this->hasMany(Resep::class);   
    }


    //Helper
    public function isFinal() : bool 
    {
        return $this->status === 'final';   
    }

    public function lock() : void 
    {
        $this->update([
            'status' => 'final',
            'locked_at' => now(),
        ]);
    }
}