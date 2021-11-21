<?php
namespace App\Controllers;
use App\Models\UserModel;

class user extends BaseController{
    public function index(){
        $model = new UserModel();
        $data['users'] = $model->get();
        echo view('header');
        echo view('user/all', $data);
        echo view('footer');
    }

    public function add(){
        $model = new UserModel();
        $data['users'] = $model->get();

        if($this->request->getMethod() === 'post' && $this->validate(['user' => 'required']) && $this->validate(['name' => 'required']) && $this->validate(['password' => 'required']))
        {
            $model->save(['login' => $this->request->getPost('user'), 'name' => $this->request->getPost('name'), 'password' => md5($this->request->getPost('password'))]);
        }
        return redirect()->to(base_url() . '/user');
    }

    public function edit($id){
        $model = new UserModel();

        if($this->request->getMethod() === 'post' && $this->validate(['user' => 'required']) && $this->validate(['name' => 'required']) && $this->validate(['password' => 'required']))
        {
            $model->save(['id' => $this->request->getPost('id'), 'login' => $this->request->getPost('user'), 'name' => $this->request->getPost('name'), 'password' => md5($this->request->getPost('password'))]);
            return redirect()->to(base_url() . '/user');
        }else{
            $data['user'] = $model->get($id);
            echo view('header');
            echo view('user/edit', $data);
            echo view('footer');
        }
        
    }

    public function delete($id){
        $model = new UserModel();

        $model->delete($id);
        return redirect()->to(base_url() . '/user');
        
    }

    public function logout(){
        // $model = new UserModel();

        session()->destroy();
        return redirect()->to(base_url());
        
    }
    
    public function login(){
        $model = new UserModel();

        if($this->request->getMethod() === 'post' && $this->validate(['login' => 'required', 'password' => 'required'])){
            $user = $model->login(['login' => $this->request->getPost('login'),
                                    'password' => md5($this->request->getPost('password'))]);

        if(isset($user)){
            session()->set(['user' => $user['id'], 'name' => $user['name']]);
            return redirect()->to(base_url() . '/publication');
        }

        session()->setFlashdata('login_error', 'Los datos ingresados no son correctos.');

        }
        // return redirect()->to(base_url() . '/publication');
        return redirect()->to(base_url());
    }
}