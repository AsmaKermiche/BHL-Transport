<?php
require_once("Models/profilModel.php");
require_once("Views/profilView.php");

Class profilController{
    public function afficher_profil_page_controller(){
        $profilView = new profilView();
        $profilView->afficher_profil_page();
    }
    public function get_user_by_id_controller(){
        $profilModel = new profilModel();
        $user = $profilModel->get_user_by_id_model();
        return $user; 
    }
    public function update_user_profil_controller(){
        $profilModel = new profilModel();
        $update = $profilModel->update_user_profil_model();
        return $update; 
    }



}