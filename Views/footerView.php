<?php
Class footerView{

    public function afficher_footer(){
    ?>
    <footer>
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link" href="#">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="presentationRouter.php">Présentation</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="newsRouter.php">News</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="signupRouter.php">Inscription</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="statsRouter.php">Statistiques</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contactRouter.php">Contact</a>
            </li>
        </ul>
    </footer>
            <script>
              <?php require_once("js/script.js");?>
            </script>
            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.19.1/bootstrap-table.min.js" integrity="sha512-SoNdA/8QMSSlEcJAXKdAALavPMfGJnoh/96Tosg3qxQhdktSAttyHT7ePJghxJNvLCeyJYtXcdrTgLvHHsbRcQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.14.1/extensions/filter-control/bootstrap-table-filter-control.min.js" integrity="sha512-nyuZF8Jk/nmtiE89eDURzXZ4TAbfC6WYZdbX8znasPEkHu2a9btpyGLfPHS97yMsg27AXsor9QU867gKdzHSCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script>
              <?php require_once("js/jquery.js");?>
            </script>
    <?php
    }

}