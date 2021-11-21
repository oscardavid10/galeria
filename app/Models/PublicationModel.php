<?php namespace App\Models;

use CodeIgniter\Model;

class PublicationModel extends Model{
    protected $table = 'imagenes';
    protected $allowedFields = ['imagen', 'user','creado','nombre','pic_title'];

    public function get($id = false){
        if($id === false){
            return $this->findAll();
        }

        return $this->asArray()
        ->where(['id' => $id])
        ->first();
    }

    public function show(){
        $db = \Config\Database::connect();
        $builder = $db->table('imagenes');
        $builder->select('imagenes.*');
        // $builder->join('user','user.id = user');
        $builder->orderBy('orden','ASC');
        
        return $builder->get()->getResultArray();
    }
}


?>