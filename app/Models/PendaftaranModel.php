<?php

namespace App\Models;
use CodeIgniter\Model;

class PendaftaranModel extends Model
{
    protected $table = 'pendaftaran';
    protected $primaryKey = 'id_pendaftaran';
    protected $allowedFields = ['id_beasiswa','id_mahasiswa','tanggal_daftar', 'nilai_ipk', 'bukti_ipk', 'status','keterangan'];
    public $timestamps = false;
    public function getRiwayatPendaftaran($userId = null, $level = null)
{
    $builder = $this->db->table('pendaftaran')
        ->select('
            pendaftaran.*,
            mahasiswa.nama_mahasiswa,
            mahasiswa.nik,
            mahasiswa.jurusan,
            pendaftaran.nilai_ipk,
            pendaftaran.bukti_ipk,
            beasiswa.tipe_beasiswa,
            pengguna.level
        ')
        ->join('mahasiswa', 'mahasiswa.id_mahasiswa = pendaftaran.id_mahasiswa', 'left')
        ->join('beasiswa', 'beasiswa.id_beasiswa = pendaftaran.id_beasiswa', 'left')
        ->join('pengguna', 'pengguna.id_user = mahasiswa.id_user', 'left')
        ->orderBy('pendaftaran.tanggal_daftar', 'DESC');

    if ($level == 2 && $userId !== null) {
        $builder->where('pengguna.id_user', $userId);
    }

    return $builder->get()->getResultArray();
}

}
