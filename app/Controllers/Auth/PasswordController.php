<?php

    namespace App\Controllers\Auth;

    use App\Models\User;
    use App\Controllers\Controller;
    use Respect\Validation\Validator as v;

    class PasswordController extends Controller{

        public function getChangePassword($request, $response){
            return $this->view->render($response, 'auth/password/change.twig');
        }

        public function postChangePassword($request, $response){

            $validation = $this->validator->validate($request, [
                'password_old' => v::noWhiteSpace()->notEmpty()->matchesPassword($this->auth->user()->password),
                'password' => v::noWhiteSpace()->notEmpty()
            ]);

            if($validation->failed()){
                return $response->withRedirect($this->router->pathFor('auth.password.change'));
            }

            $this->auth->user()->setPassword($request->getParam('password'));

            $this->flash->addMessage('info', 'Password cambiado con éxito');

            return $response->withRedirect($this->router->pathFor('home'));

        }

    }