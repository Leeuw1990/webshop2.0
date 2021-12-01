<?php
namespace app\controller;
use app\controller\Controller;
use app\core\Request;
use app\model\RegisterModel;

class AuthController extends Controller
{
    public function login()
    {
        return $this->render('login');
    }

    public function register(Request $request)
    {
        $registerModel = new RegisterModel();
        if($request->isPost()) {
            $registerModel->loadData($request->getBody());

            if($registerModel->validate() && $registerModel->register()) {
                return 'Succes';
            }
            return $this->render('register', [
                'model' => $registerModel
            ]);
        }
        return $this->render('register');
    }
}
