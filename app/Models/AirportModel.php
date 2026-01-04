<?php

namespace App\Models;

use CodeIgniter\Model;

class AirportModel extends Model
{
    protected $table = 'airports';
    protected $primaryKey = 'id';
    protected $allowedFields = ['iata_code', 'name', 'city', 'country'];
    protected $useTimestamps = false;
}