<?php
require_once("Models/adminModel.php");
require_once("Models/presentationModel.php");
require_once("Models/contactModel.php");
require_once("Views/adminView.php");
require_once("Views/adminUsersView.php");
require_once("Views/adminAnnoncesView.php");
require_once("Views/adminTransporteursView.php");
require_once("Views/adminClientsView.php");
require_once("Views/adminChangeStatusView.php");
require_once("Views/adminUsersProfilView.php");
require_once("Views/adminValiderAnnonceView.php");
require_once("Views/adminLoginView.php");
require_once("Views/adminNewsView.php");
require_once("Views/adminContentView.php");
require_once("Views/adminSignalementsView.php");
require_once("Views/adminPresentationView.php");
require_once("Views/adminContactView.php");
require_once("Views/adminAjouterNewsView.php");
class adminController
{

    public function afficher_admin_page_controller()
    {
        $adminView = new adminView();
        $adminView->afficher_admin_page();
    }

    public function get_categories_controller()
    {
        $adminModel = new adminModel();
        $categories = $adminModel->get_categories_model();
        return $categories;
    }

    public function get_all_users_controller()
    {
        $adminModel = new adminModel();
        $users = $adminModel->get_all_users_model();
        return $users;
    }
    public function get_user_by_id_controller()
    {
        $adminModel = new adminModel();
        $user = $adminModel->get_user_by_id_model();
        return $user;
    }
    public function afficher_user_profil_controller()
    {
        $adminUsersProfilView = new adminUsersProfilView();
        $adminUsersProfilView->afficher_user_profil_page();
    }

    public function afficher_users_page_controller()
    {
        $adminUsersView = new adminUsersView();
        $adminUsersView->afficher_admin_users_page();
    }

    public function get_all_transporteurs_controller()
    {
        $adminModel = new adminModel();
        $transporteurs = $adminModel->get_all_transporteurs_model();
        return $transporteurs;
    }

    public function afficher_transporteurs_page_controller()
    {
        $adminTransporteursView = new adminTransporteursView();
        $adminTransporteursView->afficher_admin_transporteurs_page();
    }

    public function update_transporteur_status_controller()
    {
        $adminModel = new adminModel();
        if (isset($_GET['id_user'])) {
            $id_transporteur = $_GET['id_user'];
        }
        $adminModel->update_transporteur_status_model($id_transporteur);
    }

    public function afficher_change_status_controller()
    {
        $adminChangeStatusView = new ChangeStatusView();
        $adminChangeStatusView->afficher_modifier_status_page();
    }

    public function get_transporteur_status_controller()
    {
        $adminModel = new adminModel();
        if (isset($_GET['id_user'])) {
            $id_transporteur = $_GET['id_user'];
        }
        $status = $adminModel->get_transporteur_status_model($id_transporteur);
        return $status;
    }

    public function get_all_clients_controller()
    {
        $adminModel = new adminModel();
        $clients = $adminModel->get_all_clients_model();
        return $clients;
    }

    public function afficher_clients_page_controller()
    {
        $adminClientsView = new adminClientsView();
        $adminClientsView->afficher_admin_clients_page();
    }
    public function get_all_annonces_controller()
    {
        $adminModel = new adminModel();
        $annonces = $adminModel->get_all_annonces_model();
        return $annonces;
    }
    public function afficher_annonces_page_controller()
    {
        $adminAnnoncesView = new adminAnnoncesView();
        $adminAnnoncesView->afficher_admin_annonces_page();
    }
    public function get_all_annonces_non_validees_controller()
    {
        $adminModel = new adminModel();
        $annonces = $adminModel->get_all_annonces_non_validees_model();
        return $annonces;
    }
    public function afficher_valider_annonces_page_controller()
    {
        $adminAnnoncesValiderView = new adminAnnoncesValiderView();
        $adminAnnoncesValiderView->afficher_admin_valider_annonces_page();
    }
    public function afficher_admin_login_page_controller()
    {
        $adminLoginView = new adminLoginView();
        $adminLoginView->afficher_login_admin_page();
    }
    public function login_admin_controller()
    {
        $adminModel = new adminModel();
        $admin = $adminModel->login_admin_model();
        if(isset($admin)){
            $_SESSION['id_admin'] = $admin[0]->id_admin;
            ?><script><?php echo("location.href = 'adminHomeRouter.php'");?></script><?php
        }
    }
    public function get_all_news_controller(){
        $adminModel = new adminModel();
        $news = $adminModel->get_all_news_model();
        return $news;
    }
    public function afficher_news_admin_page_controller(){
        $adminNewsView = new adminNewsView();
        $adminNewsView->afficher_admin_news_page();
    }
    public function afficher_add_news_admin_page_controller(){
        $addNewsView = new addNewsView();
        $addNewsView->afficher_admin_add_news_page();
    }
    public function add_news_controller(){
        $adminModel = new adminModel();
        $adminModel->add_news_model();
    }
    public function afficher_admin_content_page_controller(){
        $adminContentView = new adminContentView();
        $adminContentView->afficher_admin_content_page();
    }
    public function get_presentation_controller(){
        $presentationModel = new presentationModel();
        $presentation = $presentationModel->get_presentation_model();
        return $presentation;
    }
    public function update_presentation_page_controller(){
        $adminModel = new adminModel();
        $adminModel->update_presentation_model();
    }
    public function afficher_admin_presentation_page_controller(){
        $adminPresentationView = new adminPresentationView();
        $adminPresentationView->afficher_admin_presentation_page();
    }
    public function get_contact_controller(){
        $contactModel = new contactModel();
        $contact = $contactModel->get_contact_model();
        return $contact;
    }
    public function update_contact_page_controller(){
        $adminModel = new adminModel();
        $adminModel->update_contact_model();
    }
    public function afficher_admin_contact_page_controller(){
        $adminContactView = new adminContactView();
        $adminContactView->afficher_admin_contact_page();
    }
    public function get_all_signalements_controller(){
        $adminModel = new adminModel();
        $signalements = $adminModel->get_all_signalements_model();
        return $signalements;
    }
    public function afficer_signalements_admin_page_controller(){
        $adminSignalementsView = new adminSignalementsView();
        $adminSignalementsView->afficher_admin_signalements_page();
    }



}
