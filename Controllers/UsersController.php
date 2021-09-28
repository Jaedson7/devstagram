<?php
namespace Controllers;

use \Core\Controller;
use \Models\Users;

class UserController extends Controller {

	public function index(){}

    public function login(){
        $array = array('error'=>'');

        $method = $this->getMethod();
        $data = $this->getRequestData();

        if($method == 'POST'){
            if(!empty($data['email']) && !empty($data['password'])){
                $users = new Users();
                if($users->checkCredentials($data['email'], $data['pass'])){
                    //Gerar o JWT
                }else{
                    $array['error'] = 'Acesso Negado';
                }

            }else{
                $array['error'] = 'Email e/ou senha não prenchido';
            }
        }else{
            $array['error'] = 'Metodo de requisição incompleta';
        }
    }

    $this->returnJson($array);

}