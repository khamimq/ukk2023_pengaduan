<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Petugas;
class PetugasController extends BaseController{
    protected $petugass;

    function __construct()
    {
        $this->petugass = new Petugas();
    }
    public function index(){
        $data['petugas'] = $this->petugass->findAll();
        return view('petugasView',$data);
    }

    public function save(){
        $data = [
            'nama_petugas'=>$this->request->getPost('nama_petugas'),
            'username'=>$this->request->getPost('username'),
            'password'=>password_hash($this->request->getPost('password'),PASSWORD_DEFAULT),
            'telp'=>$this->request->getPost('telp'),
            'level'=>$this->request->getPost('level'),
        ];
        $ins = $this->petugass->insert($data);
        if($ins){
            return redirect('petugas');
        }
    }

    public function edit($id){
        $pass = $this->request->getPost('password');
        if(empty($pass)){
            $data = [
                'nama_petugas'=>$this->request->getPost('nama_petugas'),
                'username'=>$this->request->getPost('username'),
                'telp'=>$this->request->getPost('telp'),
                'level'=>$this->request->getPost('level'),
            ];
        }else{
            $data = [
                'nama_petugas'=>$this->request->getPost('nama_petugas'),
                'username'=>$this->request->getPost('username'),
                'password'=>password_hash($this->request->getPost('password'),PASSWORD_DEFAULT),
                'telp'=>$this->request->getPost('telp'),
                'level'=>$this->request->getPost('level'),
            ];
        }
        $this->petugass->update($id,$data);
        return redirect('petugas');
    }

    public function hapus($id){
        $this->petugass->delete($id);
        return redirect('petugas');
    }

}