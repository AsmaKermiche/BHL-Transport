<?php
require_once("headerView.php");
require_once("footerView.php");

class ChangeStatusView
{
    public function afficher_modifier_status_page()
    {
        $adminController = new adminController();
        $header = new headerView();
        $footer = new footerView();
        $header->entete_page();
        $header->afficher_header();
        $header->afficher_menu();
        $status = $adminController->get_transporteur_status_controller();
        $adminController->update_transporteur_status_controller();
        $status = $adminController->get_transporteur_status_controller();
        $this->afficher_modifier_status($status);
        $footer->afficher_footer();
    }

    public function afficher_modifier_status($status)
    {
?>
<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mt-5 mb-3">Modifier le status</h2>
                <form method="post">
                    <div class="alert alert-danger">
                        <form name='myform' id='myform' method='post'>
                            <select name='status' class='custom-select custom-select-sm' id="select-status">
                                <option>
                                    <?php 
                                if ($status[0]->status1 == ''){
                                    echo $status[0]->status2;
                                }
                                    elseif($status[0]->status2 == ''){
                                    echo $status[0]->status1;
                                }
                                ?>
                                </option>
                                <option value='En attente'>En attente</option>
                                <option value='En cours de traitement'>En cours de traitement</option>
                                <option value='Validé'>Validé</option>
                                <option value='Refusé'>Refusé</option>
                                <?php if($status[0]->status1 != ''): ?>
                                <option value='Certifié'>Certifié</option>
                                <?php endif; ?>
                            </select>
                            <div class="form-group">
                                <label class="documents">La liste des documents</label>
                                <textarea class="form-control documents" placeholder="Entrez la liste des documents"
                                    name="documents" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="justificatif">Justificatif de refus</label>
                                <textarea class="form-control justificatif" placeholder="Entrez le justificatif"
                                    name="justificatif" rows="5"></textarea>
                            </div>
                            <p>
                                <input type="submit" name="submit" class="btn btn-success">
                            </p>
                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    }
}