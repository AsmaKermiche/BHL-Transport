<?php
require_once("Models/transporteurModel.php");
require_once("Views/transporteurView.php");

Class transporteurController{
    public function afficher_transporteur_page_controller(){
        $transporteurView = new transporteurView();
        $transporteurView->afficher_home_page();
    }
}