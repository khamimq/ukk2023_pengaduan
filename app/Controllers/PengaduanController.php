<?php 
namespace App\Controllers;

use CodeIgniter\Controller;

class PengaduanController extends Controller{
    public function index(){
        return view('pengaduanView');
    }
}