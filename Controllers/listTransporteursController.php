<?php
require_once("Models/annonceModel.php");
require_once("Views/listTrasporteursView.php");

Class listController{
    public function afficher_list_page_controller(){
        $listView = new listView();
        $listView->afficher_list_page();
    }
    public function get_list_controller(){
        $annonceModel = new annonceModel();
        $list = $annonceModel->get_list_model();
        return $list;
    }
    public function get_list_transporteurs_postules_controller(){
        $annonceModel = new annonceModel();
        $list = $annonceModel->get_list_trasnporteurs_postules_model();
        return $list;
    }
    
}