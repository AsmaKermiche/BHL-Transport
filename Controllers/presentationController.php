<?php
require_once("Models/presentationModel.php");
require_once("Views/presentationView.php");

Class presentationController{
    public function afficher_presentation_page_controller(){
        $presentationView = new presentationView();
        $presentationView->afficher_presentation_page();
    }
    public function get_presentation_controller(){
        $presentationModel = new presentationModel();
        $presentation = $presentationModel->get_presentation_model();
        return $presentation;
    }
}