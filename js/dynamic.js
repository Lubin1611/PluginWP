
/*jQuery(document).ready( function($) {

    $.ajax({
        url: "http://localhost:8888/wordpress/wp-admin/admin.php?page=test-plugin",
        success: function( data ) {
            alert( 'Your home page has ' + $(data).find('div').length + ' div elements.');
        }
    })

});

Ca marche aussi...



*/


/**
function ajaxRequest() {
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {


            var obj = JSON.parse(this.responseText);
            console.log(this.responseText);
            document.getElementById('infos').innerHTML = this.responseText + "<br><br>";

            console.log(obj.data.poi.results.length);


            document.getElementById('texte').innerHTML = "Il y a " +  obj.data.poi.total + " resultats dont : " + "<br><br>";


            for (pas = 0; pas < obj.data.poi.results.length; pas++) {

                if (obj.data.poi.results[pas].takesPlaceAt[0].endTime = "null") {

                    obj.data.poi.results[pas].takesPlaceAt[0].endTime = "heure de fin non définie par le serveur";

                }

                document.getElementById('texte').innerHTML += obj.data.poi.results[pas].rdfs_label +   "  "  + obj.data.poi.results[pas].isLocatedAt[0].schema_address[0].schema_streetAddress + " "
                    +  obj.data.poi.results[pas].isLocatedAt[0].schema_address[0].schema_addressLocality + " " + obj.data.poi.results[pas].takesPlaceAt[0].startDate + " " + obj.data.poi.results[pas].takesPlaceAt[0].startTime
                    + " " + obj.data.poi.results[pas].takesPlaceAt[0].endDate + " " + obj.data.poi.results[pas].takesPlaceAt[0].endTime + "<br><br>";

            }




        }

    };

    xhttp.open("GET", "monPlugin.php", true);

    xhttp.send();


}


window.onload = function marche(){


    document.getElementById('test').addEventListener('click', ajaxRequest);


};

**/