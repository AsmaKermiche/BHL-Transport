$(document).ready(function () {
    $(".dropdown-menu").on('click', 'a', function(){
        $(this).parents('.dropdown').find('button').text($(this).text());
    });
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    $('#select-status').change(function() {

        var selectedValue = $(this).val();

        if ( selectedValue == 'Validé' ) {
            $('.justificatif').hide();
            $('.documents').show();
        }else {
            if ( selectedValue == 'Refusé' ) {
                $('.documents').hide();
                $('.justificatif').show();
            }
            if (( selectedValue == 'En attente') | (selectedValue == 'En cours de traitement') | (selectedValue == 'Certifié')){
                $('.justificatif').hide();
                $('.documents').hide();
            }
        }

    });
    $("#nom").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#users-table tr").filter(function() {     
          $(this).toggle($(this).find("td:first").text().toLowerCase().indexOf(value) > -1)
        });
    });
    $("#prenom").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#users-table tr").filter(function() {     
          $(this).toggle($(this).find("td:eq(1)").text().toLowerCase().indexOf(value) > -1)
        });
    });
    $("#phonenumber").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#users-table tr").filter(function() {     
          $(this).toggle($(this).find("td:eq(2)").text().toLowerCase().indexOf(value) > -1)
        });
    });
    $("#email").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#users-table tr").filter(function() {     
          $(this).toggle($(this).find("td:eq(3)").text().toLowerCase().indexOf(value) > -1)
        });
    });
    $("#username").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#users-table tr").filter(function() {     
          $(this).toggle($(this).find("td:eq(4)").text().toLowerCase().indexOf(value) > -1)
        });
    });
    $("#role").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#users-table tr").filter(function() {     
          $(this).toggle($(this).find("td:eq(5)").text().toLowerCase().indexOf(value) > -1)
        });
    });
    $("#src").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#annonces-table tr").filter(function() {     
          $(this).toggle($(this).find("td:first").text().toLowerCase().indexOf(value) > -1)
        });
    });
    $("#dest").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#annonces-table tr").filter(function() {     
          $(this).toggle($(this).find("td:eq(1)").text().toLowerCase().indexOf(value) > -1)
        });
    });
    $("#poids").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#annonces-table tr").filter(function() {     
          $(this).toggle($(this).find("td:eq(2)").text().toLowerCase().indexOf(value) > -1)
        });
    });
    $("#volume").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#annonces-table tr").filter(function() {     
          $(this).toggle($(this).find("td:eq(3)").text().toLowerCase().indexOf(value) > -1)
        });
    });
    $("#moyen").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#annonces-table tr").filter(function() {     
          $(this).toggle($(this).find("td:eq(4)").text().toLowerCase().indexOf(value) > -1)
        });
    });
    $("#type").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#annonces-table tr").filter(function() {     
          $(this).toggle($(this).find("td:eq(5)").text().toLowerCase().indexOf(value) > -1)
        });
    });
    $("#status1").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#annonces-table tr").filter(function() {     
          $(this).toggle($(this).find("td:eq(6)").text().toLowerCase().indexOf(value) > -1)
        });
    });
    $("#status2").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#annonces-table tr").filter(function() {     
          $(this).toggle($(this).find("td:eq(7)").text().toLowerCase().indexOf(value) > -1)
        });
    });
    $("#date").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#annonces-table tr").filter(function() {     
          $(this).toggle($(this).find("td:eq(8)").text().toLowerCase().indexOf(value) > -1)
        });
    });

});
