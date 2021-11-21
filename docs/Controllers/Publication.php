<?php
namespace App\Controllers;
use App\Models\PublicationModel;
use CodeIgniter\Exceptions\AlertError;

class publication extends BaseController{
    public function index(){
        $model = new PublicationModel();
        $data['posts'] = $model->show();
        echo view('header');
        echo view('publication/all', $data);
        echo view('footer');
    }


    public function add(){
        $model = new PublicationModel();
        $data['posts'] = $model->get();
        $usuario = session()->user;

        $file = $this->request->getFile('imagen');
        $name = $file->getName();
        $file->move(ROOTPATH.'public/images/'.$usuario);
        $model->save(['nombre' => $name, 'creado' => $usuario]);

        return redirect()->to(base_url() . '/publication');
    }

    public function edit($id){
        $model = new PublicationModel();
        $usuario = session()->user;

        if($this->request->getMethod() === 'post' )
        {
            $file = $this->request->getFile('imagen');
            $name = $file->getName();
            $file->move(ROOTPATH.'public/images/'.$usuario);

            $model->save(['id' => $this->request->getPost('id'),  'nombre' => $name]);
            return redirect()->to(base_url() . '/publication');
        }else{
            $data['post'] = $model->get($id);
            echo view('header');
            echo view('publication/edit', $data);
            echo view('footer');
        }
        
    }

    public function delete($id){
        $model = new PublicationModel();

        $model->delete($id);
        return redirect()->to(base_url() . '/publication');
        
    }
}