<?php
require_once("Models/transporteurModel.php");
require_once("Models/adminModel.php");
require_once("Models/userModel.php");
require_once("Models/annonceModel.php");
require_once("Views/confirmerPostuleView.php");
require_once("Views/adminConfirmerValiderAnnonceView.php");
require_once("Views/confirmTransactionView.php");
require_once("Views/signalerView.php");

Class confirmController{
    public function afficher_confim_postuler_page_controller(){
        $confimView = new ConfirmPostulerView();
        $confimView->afficher_confirm_postuler_page();
    }
    public function insert_demande_postuler_controller(){
        $transporteurModel = new tranporteurModel();
        $postuler = $transporteurModel->insert_demande_postuler_model();
        if($postuler && isset($_POST['postuler'])){
            ?><script><?php echo("location.href = 'transporteurRouter.php'");?></script><?php
        }
    }
    public function afficher_confim_valider_page_controller(){
        $confimView = new adminConfirmValiderView();
        $confimView->afficher_confirm_valider_page();
    }
    public function valider_annonce_controller(){
        if(isset($_GET['id_annonce'])){
        $id_annonce = $_GET['id_annonce'];
        }
        $adminModel = new adminModel();
        $valider = $adminModel->valider_annonce_model($id_annonce);
        if($valider && isset($_POST['valider'])){
            ?><script><?php echo("location.href = 'adminValiderAnnonceRouter.php'");?></script><?php
        }
    }
    public function afficher_confim_transaction_page_controller(){
        $confimView = new ConfirmTransactionView();
        $confimView->afficher_confirm_transaction_page();
    }
    public function insert_transaction_controller(){
        $annonceModel = new annonceModel();
        $postuler = $annonceModel->inserer_transaction_model();
        if($postuler && isset($_POST['transporter'])){
            ?><script><?php echo("location.href = 'demandesRouter.php'");?></script><?php
        }
    }
    public function signaler_user_controller(){
        $userModel = new UserModel();
        $signaler = $userModel->signaler_user_model();
        if($signaler && isset($_POST['signaler'])){
            ?><script><?php echo("location.href = 'userTransactionsRouter.php'");?></script><?php
        }
    }
    public function afficher_signaler_page_controller(){
        $signalerView = new signalerView();
        $signalerView->afficher_signaler_page();
    }




}