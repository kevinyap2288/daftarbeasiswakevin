<?php

namespace App\Models;
use CodeIgniter\Model;

class ParkingModel extends Model
{
    protected $table = 'beasiswa';
    protected $primaryKey = 'id_beasiswa';
    protected $allowedFields = ['tipe_beasiswa', 'tanggal_buka', 'tanggal_tutup'];
    
}