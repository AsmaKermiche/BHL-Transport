<?php
require_once("Models/statsModel.php");
require_once("Views/statistiquesView.php");


class statsController
{
    public function get_number_users_controller()
    {
        $statsModel = new statsModel();
        $users = $statsModel->get_users_number_model();
        return $users;
    }
    public function get_number_annonces_controller()
    {
        $statsModel = new statsModel();
        $annonces = $statsModel->get_annonces_number_model();
        return $annonces;
    }
    public function afficher_stats_page_controller(){
        $statsView = new statsView();
        $statsView->afficher_stats_page();
    }
}
