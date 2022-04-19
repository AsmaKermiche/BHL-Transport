<?php
require_once("headerView.php");
require_once("footerView.php");

class contactView
{
    public function afficher_contact_page()
    {
        $header = new headerView();
        $header->entete_page();
        $header->afficher_header();
        $header->afficher_menu();
        $this->afficher_contact();
        $footer = new footerView();
        $footer->afficher_footer();
    }
    public function afficher_contact()
    {
        $contactController = new contactController();
        $contact = $contactController->get_contact_controller();
?>
        <div class="content" style="padding-bottom: 89px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <h2>Contactez-nous</h2>
                        <ul class="list-unstyled pl-md-5 mb-5">
                            <li>
                                <span class="mr-3"><i class="fas fa-map-pin" style="padding: 20px ; color: var(--green)"></i> <?php echo $contact[0]->address_admin; ?></span>
                            </li>
                            <li class="d-flex text-black mb-2">
                                <span class="mr-3"><i class="fas fa-phone" style="padding: 20px ; color: var(--green)"></i> <?php echo $contact[0]->numero_telephone; ?></span>
                            </li>
                            <li class="d-flex text-black">
                                <span class="mr-3"><i class="fas fa-envelope" style="padding: 20px ; color: var(--green)"></i><a href="mailto:someone@example.com"><?php echo $contact[0]->email_admin; ?> </a></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
