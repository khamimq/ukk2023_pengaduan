<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Masyarakat;
class MasyarakatController extends BaseController{
    protected $masyarakats;

    function __construct()
    {
        $this->masyarakats = new Masyarakat();
    }

    public function index(){
        $data['masyarakat'] = $this->masyarakats->findAll();
        return view('masyarakatView',$data);
    }

}