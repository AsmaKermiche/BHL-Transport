<?php
require_once("Models/contactModel.php");
require_once("Views/contactView.php");

Class contactController{
    public function afficher_contact_page_controller(){
        $contactView = new contactView();
        $contactView->afficher_contact_page();
    }
    public function get_contact_controller(){
        $contactModel = new contactModel();
        $contact = $contactModel->get_contact_model();
        return $contact;
    }
}