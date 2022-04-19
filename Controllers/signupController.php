<?php
require_once("Models/userModel.php");
require_once("Views/signupView.php");


class signupController
{
    public function signup()
    {
        $signupModel = new UserModel();
        $signup = $signupModel->signup($_POST);
        if($signup){
            ?><script><?php echo("location.href = 'loginRouter.php'");?></script><?php
        }
    }
    public function affichersignup()
    {
        $signupView = new signupView();
        $signupView->afficher_signup_page();
    }
}
