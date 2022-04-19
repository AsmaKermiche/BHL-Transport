<?php
require_once("Models/clientModel.php");
require_once("Views/clientView.php");

Class clientController{
    public function afficher_client_page_controller(){
        $clientView = new clientView();
        $clientView->afficher_home_page();
    }
}