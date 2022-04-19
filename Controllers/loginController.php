<?php
require_once("Models/userModel.php");
require_once("Views/loginView.php");


class loginController
{
    public function login()
    {
        // isset($data[0]->role) ? $data[0]->role : false;
        $loginModel = new UserModel();
        $loginData = $loginModel->login($_POST);
        if (isset($loginData)) {
            $_SESSION['id_connected_user'] = $loginData[0]->id_user;
            $_SESSION['role'] = $loginData[0]->role;
            $loginRole = $loginData[0]->role;
            //check here if we add username nd pass
            if ($loginRole == "transporteur") {
                ?><script><?php echo("location.href = 'transporteurRouter.php'");?></script><?php
            } elseif ($loginRole == "client") {
                ?><script><?php echo("location.href = 'clientRouter.php'");?></script><?php
            }
        }
    }
    public function afficherLogin()
    {
        $loginView = new LoginView();
        $loginView->afficher_login_page();
    }
    public function logoutController()
    {
        $userModel = new userModel();
        $userModel->logout();
    }
}
