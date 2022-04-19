<?php
require_once("headerView.php");
require_once("footerView.php");
class adminContactView
{
    public function afficher_admin_contact_page()
    {
        $header = new headerView();
        $adminController = new adminController();
        $footer = new footerView();
        $contact = $adminController->get_contact_controller();
        $adminController->update_contact_page_controller();
        $contact = $adminController->get_contact_controller();
        $header->entete_page();
        $header->afficher_header();
        $header->afficher_menu();
        $this->afficher_admin_contact($contact);
        $footer->afficher_footer();
    }
    public function afficher_admin_contact($contact)
    {
    ?>
<div class="row">
    <div class="container">
        <?php if (isset($contact)) : ?>
        <div class="form-container">
            <form method="post">
                <div style="padding-left: 20px; padding-right: 20px">
                <div class="mb-3">
                    <label class="mb-1">Numéro du téléphone</label>
                    <input class="form-control" type="text" placeholder="Enter your username" name="phone_number"
                        value="<?php echo $contact[0]->numero_telephone; ?>">
                </div>
                <div class="mb-3">
                    <label class="mb-1">Email</label>
                    <input class="form-control" type="text" placeholder="Enter your username" name="email"
                        value="<?php echo $contact[0]->email_admin; ?>">
                </div>
                <div class="mb-3">
                    <label class="mb-1">Adresse</label>
                    <input class="form-control" type="text" placeholder="Enter your username" name="adress"
                        value="<?php echo $contact[0]->address_admin; ?>">
                </div>
                    <button class="btn btn-primary" name="contact" type="submit">Modifier le contenu</button>
                </div>
            </form>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php
    }
}