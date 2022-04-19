<?php
require_once("headerView.php");
require_once("transporteurView.php");
require_once("footerView.php");
require_once("Helpers/functions.php");
require_once("Controllers/homeController.php");

class clientView
{
  public function afficher_home_page()
  {
    $header = new headerView();
    $home = new homeView();
    $trans = new transporteurView();
    $header->entete_page();
    $header->afficher_header();
    $home->afficher_diaporama();
    $header->afficher_menu();
    $home->afficher_search_form();
    $trans->afficher_ajouter_annonce();
    $home->afficher_annonces();
    $home->afficher_presentation();
    $footer = new footerView();
    $footer->afficher_footer();
  }
}
