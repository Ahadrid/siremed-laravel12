<?php

namespace App\Policies;

use App\Models\RekamMedis;
use App\Models\User;

class RekamMedisPolicy
{
    /**
     * Lihat rekam medis
     */
    public function view(User $user, RekamMedis $rekamMedis): bool
    {
        return in_array($user->role, ['admin', 'dokter', 'perawat', 'farmasi']);
    }

    /**
     * Membuat rekam medis
     */
    public function create(User $user): bool
    {
        return $user->role === 'dokter';
    }

    /**
     * Update rekam medis
     */
    public function update(User $user, RekamMedis $rekamMedis): bool
    {
        // Hanya dokter terkait
        if ($user->role !== 'dokter') {
            return false;
        }

        // Dokter harus sama
        if ($rekamMedis->dokter_id !== $user->id) {
            return false;
        }

        // Tidak boleh edit jika sudah final
        return $rekamMedis->status !== 'final';
    }

    /**
     * Finalisasi / lock rekam medis
     */
    public function finalize(User $user, RekamMedis $rekamMedis): bool
    {
        return $user->role === 'dokter'
            && $rekamMedis->dokter_id === $user->id
            && $rekamMedis->status === 'draft';
    }
}