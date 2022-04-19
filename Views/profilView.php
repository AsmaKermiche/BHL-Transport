<?php
require_once("headerView.php");
require_once("footerView.php");
class profilView
{
    public function afficher_profil_page()
    {
        $header = new headerView();
        $profilController = new profilController();
        $footer = new footerView();
        $user = $profilController->get_user_by_id_controller();
        $profilController->update_user_profil_controller();
        $user = $profilController->get_user_by_id_controller();
        $header->entete_page();
        $header->afficher_header();
        $header->afficher_menu();
        if ($user[0]->role == "transporteur") {
            $this->afficher_status_card($user);
            $this->afficher_mes_annonces_mes_transactions_mes_demandes();
            if($user[0]->justificatif != ''){
                $this->afficher_justificatif($user);
            }elseif($user[0]->liste_documents != ''){
                $this->afficher_liste_documents($user);
            }
        }
        if ($user[0]->role == "client") {
            $this->afficher_mes_annonces_mes_transactions();
        }
        $this->afficher_profil($user);
        $footer->afficher_footer();
    }
    public function afficher_mes_annonces_mes_transactions()
    {
?>
<div class="container">
    <div class="card-deck">
        <div class="card shadow-sm mb-4">
            <div class="card-body d-flex flex-column">
                <a href="userAnnoncesRouter.php">
                    <h5 class="card-title mt-auto suite">Mes annonces</h5>
                </a>
            </div>
        </div>
        <div class="card shadow-sm mb-4">
            <div class="card-body d-flex flex-column">
                <a href="userTransactionsRouter.php">
                    <h5 class="card-title mt-auto suite">Mes transactions</h5>
                </a>
            </div>
        </div>
    </div>
</div>
<?php
    }
    public function afficher_mes_annonces_mes_transactions_mes_demandes()
    {
    ?>
<div class="container">
    <div class="card-deck">
        <div class="card shadow-sm mb-4">
            <div class="card-body d-flex flex-column" style="background-color: #f1f3f5;">
                <a href="userAnnoncesRouter.php">
                    <h5 class="card-title mt-auto suite">Mes annonces</h5>
                </a>
            </div>
        </div>
        <div class="card shadow-sm mb-4">
            <div class="card-body d-flex flex-column" style="background-color: #f1f3f5;">
                <a href="userTransactionsRouter.php">
                    <h5 class="card-title mt-auto suite">Mes transactions</h5>
                </a>
            </div>
        </div>
        <div class="card shadow-sm mb-4">
            <div class="card-body d-flex flex-column"style="background-color: #f1f3f5;">
                <a href="demandesRouter.php">
                    <h5 class="card-title mt-auto suite">Mes demandes</h5>
                </a>
            </div>
        </div>
    </div>
</div>
<?php
    }
    public function afficher_liste_documents($user){
        ?>
<div class="container">
    <div class="row justify-content-left" style="padding-bottom: 30px; padding-left: 15px">
        <div class="card">
            <div class="card-body">
                <?php
                            if ($user[0]->liste_documents != '') {
                                $liste = $user[0]->liste_documents;
                            }
                            ?>
                <h5 class="card-title">La liste des documents</h5>
                <p class="card-text"><?php echo $liste ?> </p>
            </div>
        </div>
    </div>
</div>
<?php
    }
    public function afficher_justificatif($user){
        ?>
<div class="container">
    <div class="row justify-content-left" style="padding-bottom: 30px; padding-left: 15px">
        <div class="card">
            <div class="card-body">
                <?php
                            if ($user[0]->justificatif != '') {
                                $liste = $user[0]->justificatif;
                            }
                            ?>
                <h5 class="card-title">Justificatif de refus</h5>
                <p class="card-text"><?php echo $liste ?> </p>
            </div>
        </div>
    </div>
</div>
<?php
    }

    public function afficher_status_card($user)
    {
    ?>
<div class="container">
    <div class="row justify-content-left" style="padding-bottom: 30px; padding-left: 15px">
        <div class="card">
            <div class="card-body">
                <?php
                            if ($user[0]->status1 == '') {
                                $status = $user[0]->status2;
                            } elseif ($user[0]->status2 == '') {
                                $status = $user[0]->status1;
                            }
                            ?>
                <h5 class="card-title">Status de votre demande</h5>
                <p class="card-text"><?php echo $status ?> </p>
            </div>
        </div>
    </div>
</div>
<?php
    }
    public function afficher_profil($user)
    {
    ?>
<div class="row">
    <div class="container">
        <?php if (isset($user)) : ?>
        <div class="form-container">
            <form method="post">
                <div style="padding-left: 20px; padding-right: 20px"> 
                <div class="mb-3">
                    <label class="mb-1">Nom d'utilisateur</label>
                    <input class="form-control" type="text" placeholder="Enter your username" name="username"
                        value="<?php echo $user[0]->username; ?>">
                </div>
                <!-- Form Row-->
                <div class="row gx-3 mb-3">
                    <div class="col-md-6">
                        <label class="mb-1">Prénom</label>
                        <input class="form-control" type="text" placeholder="Enter your first name" name="prenom"
                            value="<?php echo $user[0]->prenom; ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="mb-1">Nom</label>
                        <input class="form-control" type="text" placeholder="Enter your last name" name="nom"
                            value="<?php echo $user[0]->nom; ?>">
                    </div>
                </div>
                <!-- Form Row-->
                <div class="row gx-3 mb-3">
                    <div class="col-md-6">
                        <label class="mb-1">Email</label>
                        <input class="form-control" type="email" placeholder="Enter your email" name="email"
                            value="<?php echo $user[0]->email; ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="mb-1">Numéro de téléphone</label>
                        <input class="form-control" type="tel" placeholder="Enter your phone number" name="phone_number"
                            value="<?php echo $user[0]->numero_telephone; ?>">
                    </div>
                </div>
                <!-- Form Row-->
                <div class="row gx-3 mb-3">
                    <div class="col-md-6">
                        <label class="mb-1"> Adresse principale</label>
                        <input class="form-control" type="text" placeholder="Enter your address" name="adress"
                            value="<?php echo $user[0]->adresse_principale; ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="mb-1">Mot de passe</label>
                        <input class="form-control" type="password" placeholder="Enter your password" name="password"
                            value="<?php echo $user[0]->mot_de_passe; ?>">
                    </div>
                </div>
                <?php if ($user[0]->role == 'transporteur') : ?>
                <div class="row gx-3 mb-3">
                    <div class="col-md-6">
                        <label class="mb-1">Adresse source</label>
                        <input class="form-control" type="text" placeholder="Enter your src" name="src"
                            value="<?php echo $user[0]->adrsrc; ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="mb-1">Adresse destination</label>
                        <input class="form-control" type="text" placeholder="Enter your dest" name="dest"
                            value="<?php echo $user[0]->adrdest; ?>">
                    </div>
                </div>
                <?php endif; ?>
                <!-- Save changes button-->
                <button class="btn btn-primary" type="submit">Modifier le profil</button>
                </div>
            </form>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php
    }
}