<?php
require_once("Models/annonceModel.php");
require_once("Models/userModel.php");
require_once("Views/ajouterAnnonceView.php");
require_once("Views/annonceView.php");
require_once("Models/annonceModel.php");
require_once("Views/userAnnoncesView.php");
require_once("Views/userTransactionsView.php");
require_once("Views/demandesTransporteursView.php");
require_once("Views/noterTransportView.php");

Class annonceController{
    public function afficher_annonce_complete_controller(){
        if(isset($_GET['id_annonce'])){
            $id_annonce = $_GET['id_annonce'];
        }
        $annonceView = new annonceView();
        $annonceView->afficher_annonce_complete_page($id_annonce);
    }
    public function afficher_add_annonce_controller(){
        $annonceAddView = new addAnnonceView();
        $annonceAddView->afficher_add_annonce_page();
    }

    public function get_annonce_complete_controller($id_annonce){
        $annonceModel = new annonceModel();
        $annonce = $annonceModel->get_annonce_complete_model($id_annonce);
        return $annonce;
    }
    public function get_annonce_poids_controller(){
        $annoncePoids = new annonceModel();
        $poids =$annoncePoids->get_annonce_poids_model();
        return $poids;
    }
    public function get_annonce_volume_controller(){
        $annonceVolume = new annonceModel();
        $volume =$annonceVolume->get_annonce_volume_model();
        return $volume;
    }
    public function get_annonce_moyen_controller(){
        $annonceMoyen = new annonceModel();
        $moyen =$annonceMoyen->get_annonce_moyen_model();
        return $moyen;
    }
    public function ajouter_annonce_controller()
    {
        $annonceModel = new annonceModel();
        $annonce = $annonceModel->ajouter_annonce_model($_POST);
        if($annonce){
            ?><script><?php echo("location.href = 'userAnnoncesRouter.php'");?></script><?php
        }
    }
    public function get_user_by_id_controllerr($id_user){
        $userModel = new userModel();
        $user =$userModel->get_user_by_id_modell($id_user);
        return $user;
    }
    public function get_user_by_id_controller(){
        $userModel = new userModel();
        $user =$userModel->get_user_by_id_model();
        return $user;
    }
    public function envoyer_confirmation_transporteur_controller()
    {
        $annonceModel = new annonceModel();
        $annonceModel->envoyer_confirmation_transporteur_model();
    }
    public function get_demandes_confirmation_transporteurs_postule_controller(){
        $annonceModel = new annonceModel();
        $annonces= $annonceModel->get_demandes_confirmation_transporteurs_postule_model();
        return $annonces;
    }
    public function get_demandes_confirmation_transporteurs_contact_controller(){
        $annonceModel = new annonceModel();
        $annonces= $annonceModel->get_demandes_confirmation_transporteurs_contact_model();
        return $annonces;
    }
    public function afficher_demande_confirmation_transporteur_controller(){
        $demandesAnnoncesView = new demandesAnnoncesView();
        $demandesAnnoncesView->afficher_demande_confirmation_transporteur_page();
    } 
    public function afficher_user_annonces_page_controller()
    {
        $userAnnoncesView = new userAnnoncesView();
        $userAnnoncesView->afficher_user_annonces_page();
    }
    public function get_annonce_user_controller()
    {
        if (isset($_SESSION['id_connected_user'])) {
            $id_user = $_SESSION['id_connected_user'];
        }
        $annonceModel = new annonceModel();
        $annonce = $annonceModel->get_annonces_user_model($id_user);
        return $annonce;
    }
    public function get_user_transactions_controller(){
        $user = $this->get_user_by_id_controller();
        $annonceModel = new annonceModel();
        if($user[0]->role=='client'){
            $transactions = $annonceModel->get_transactions_client_model();
        }
        elseif ($user[0]->role=='transporteur'){
            $transactions = $annonceModel->get_transactions_transporteur_model();
        }
        return $transactions;
    }
    public function afficher_user_transactions_page_controller()
    {
        $userTransactionsView = new userTransactionsView();
        $userTransactionsView->afficher_user_transactions_page();
    }
    public function noter_transport_controller(){
        $annonceModel = new annonceModel();
        $note = $annonceModel->noter_transport_model();
        if($note){
            ?><script><?php echo("location.href = 'userTransactionsRouter.php'");?></script><?php
        }
    }
    public function afficher_noter_transport_controller(){
        $noterTransportView = new noterTransportView();
        $noterTransportView->afficher_noter_transport_page();
    }

    
}