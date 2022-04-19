<?php
include_once("Controllers/annonceController.php");
session_start();

class headerView
{
    public function entete_page()
    {
?>

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.19.1/bootstrap-table.min.css" integrity="sha512-Ulm5pOx2O8n6XDa0CY2S+GfOmV2R2SrvCpVmhjsxi4VmvcqB5JM5POLuePq496f9CkeAtvPpJlcjLRcTPk79iw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.14.1/extensions/filter-control/bootstrap-table-filter-control.min.css" integrity="sha512-Pwal0JWyyAFzjMgXa6voIwOKPK42RvBlXjWFOBADUELi7PBc5hJHJ/rMur9grJ6jZ3zzLcy4qOy9XhmHiQ34BQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
            <script src="https://kit.fontawesome.com/7e94ab940f.js" crossorigin="anonymous"></script>
            <title>BHL Transport</title>
        </head>
    <?php
    }
    public function afficher_header()
    {
        $role = '';
        $userController = new annonceController();
        $user = $userController->get_user_by_id_controller();
        if ($user) {
            $role = $user[0]->role;
        }
    ?>
        <div class="container">
            <?php if (!isset($_SESSION['id_connected_user']) && !isset($_SESSION['id_admin']) ) : ?>
            <nav class="navbar">
                <em>
                    <a href="index.php" class="nav-logo">
                        <img height="95px" width="100px" src="img/logo.png" ... />
                    </a>
                </em>
                    <div>
                        <a href="loginRouter.php" class="btn btn-primary">Connexion</a>
                        <a href="signupRouter.php" class="btn btn-primary">Inscription</a>
                    </div>
            </nav>
            <?php endif ?>

            <?php if (isset($_SESSION['id_connected_user'])) : ?>
            <nav class="navbar">
                <em>
                    <?php if ($role == "transporteur") : ?>
                        <a href="transporteurRouter.php" class="nav-logo">
                            <img height="95px" width="100px" src="img/logo.png" ... />
                        </a>
                    <?php endif ?>
                    <?php if ($role == "client") : ?>
                        <a href="clientRouter.php" class="nav-logo">
                            <img height="95px" width="100px" src="img/logo.png" ... />
                        </a>
                    <?php endif ?>
                </em>
                <div>
                    <?php if (isset($_SESSION['id_connected_user'])) : ?>
                        <a href="profilRouter.php" class="btn btn-primary">Mon profil</a>
                        <a href="logoutRouter.php" class="btn btn-primary">Déconnexion</a>
                    <?php endif ?>
                </div>
            </nav>
            <?php endif ?>

            <?php if (isset($_SESSION['id_admin'])) : ?>
                <nav class="navbar">
                <em>
                    <a href="index.php" class="nav-logo">
                        <img height="95px" width="100px" src="img/logo.png" ... />
                    </a>
                </em>
                    <div>
                        <a href="logoutRouter.php" class="btn btn-primary">Déconnexion</a>
                    </div>
                </nav>
            <?php endif ?>
        </div>
    <?php
    }
    public function afficher_menu()
    {
    ?>
        <div class="container" style="padding-bottom: 50px">
            <header class="header-menu">
                <a href="index.php">Accueil</a>
                <a href="presentationRouter.php">Présentation</a>
                <a href="newsRouter.php">News</a>
                <a href="signupRouter.php">Inscription</a>
                <a href="statsRouter.php">Statistiques</a>
                <a href="contactRouter.php">Contact</a>
            </header>
        </div>
<?php
    }
}
