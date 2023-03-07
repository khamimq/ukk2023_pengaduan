<?php 
namespace App\Models;

use CodeIgniter\Model;

class Masyarakat extends Model{
    protected $table      = 'masyarakat';
    // Uncomment below if you want add primary key
     protected $primaryKey = 'nik';
     protected $allowedFields = ['nik','nama','username','password','telp','status'];
}