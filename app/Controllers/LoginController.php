<?php 
namespace App\Controllers;

use App\Models\Petugas;
use App\Models\Masyarakat;

class LoginController extends BaseController{
    protected $petugass, $masyarakats;

    function __construct()
    {
        $this->petugass = new Petugas();
        $this->masyarakats = new Masyarakat();
    }
    public function index(){
        return view('loginView');
    }

    public function login(){
        $user = $this->request->getPost('username');
        $pass = $this->request->getPost("password");
        $dataadmin = $this->petugass->where([
            'username'=>$user
        ])->first();
        if($dataadmin){
            if(password_verify($pass, $dataadmin['password'])){
                session()->set(
                    [
                        'id_user' => $dataadmin['id_petugas'],
                        'username' => $dataadmin['username'],
                        'nama' => $dataadmin['nama_petugas'],
                        'hak_akses'=>$dataadmin['level'],
                        'loged_in' => true,
                    ]
                    );
                    return $this->response->redirect('/');
            }else{1
0 0               session()->setFlashdata('error', 'username atau password salah');
                return $this->response->redirect('/login');
            }
        }else{
            $datamasyarakat = $this->masyarakats->where([
                'username'=>$user
            ])->first();
            if($datamasyarakat){
                if(password_verify($pass, $datamasyarakat['password'])){
                    session()->set(
                        [
                            'nik' => $datamasyarakat['nik'],
                            'username' => $datamasyarakat['username'],
                            'nama' => $datamasyarakat['nama'],
                            'loged_in' => true,
                        ]
                        );
                        return $this->response->redirect('/pengaduan');
                }else{
                    session()->setFlashdata('error', 'username atau password salah');
                    return $this->response->redirect('/login');
                }
            }else{
                session()->setFlashdata('error', 'username tidak ditemukan');
                return $this->response->redirect('/login');
            }
        }
    }

    function logout(){
        session()->destroy();
        return $this->response->redirect('/login');
     }

    public function register(){
        return view('registerView');
    }

    public function pregister(){
        $pass = $this->request->getPost('password');
        $pass2 = $this->request->getPost('password2');
        if($pass == $pass2){
            $data = [
                'nik'=>$this->request->getPost('nik'),
                'nama'=>$this->request->getPost('nama'),
                'username'=>$this->request->getPost('username'),
                'password'=>password_hash($pass,PASSWORD_DEFAULT),
                'telp'=>$this->request->getPost('telp')
            ];
            $ins = $this->masyarakats->insert($data);
                return redirect('login');
        }else{
            session()->setFlashdata('error', 'password tidak cocok');
            return $this->response->redirect('/register');
        }
    }
}