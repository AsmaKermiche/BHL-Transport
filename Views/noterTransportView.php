<?php
require_once("headerView.php");
require_once("footerView.php");

class noterTransportView
{
    public function afficher_noter_transport_page()
    {
        $header = new headerView();
        $header->entete_page();
        $header->afficher_header();
        $header->afficher_menu();
        $this->afficher_noter_transport();
        $footer = new footerView();
        $footer->afficher_footer();
        $annonceController = new annonceController();
        $annonceController->noter_transport_controller();
    }

    public function afficher_noter_transport()
    {
?>
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="">
                        <h2 class="mt-5 mb-3" style="padding-left: 20px;">Noter ce transport</h2>
                        <form method="post">
                            <div class="alert alert-light">
                                <p>
                                    <input id="myRange" min="0" max="20" value="10" type="range" class="custom-range" name="note">
                                <p>Note: <span id="note"></span></p>
                                <div style="padding-bottom: 20px;"></div>
                                <input type="submit" name="noter" value="Noter" class="btn btn-success">
                                <a href="noterTransportRouter.php" class="btn btn-secondary">Annuler</a>
                                <div style="padding-bottom: 75px;"></div>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            var slider = document.getElementById("myRange");
            var output = document.getElementById("note");
            output.innerHTML = slider.value;

            slider.oninput = function() {
                output.innerHTML = this.value;
            }
        </script>
<?php
    }
}
