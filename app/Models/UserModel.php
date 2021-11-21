<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model{
    protected $table = 'user';
    protected $allowedFields = ['name','password','login'];

    public function get($id = false){
        if($id === false){
            return $this->findAll();
        }

        return $this->asArray()
        ->where(['id' => $id])
        ->first();
    }

    public function login($data){
        return $this->asArray()->where($data)->first();
    }
}


?>