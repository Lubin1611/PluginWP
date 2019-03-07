<?php
/* Plugin name: Plugin Links
Plugin uri: localhost
Description: Plugin crée pour l'agence LINKS de laon
Version: 1.0
Author: Lubin
*/

register_activation_hook( FILE , maFonction);

add_action('admin_menu','test_plugin_setup_menu');



function test_plugin_setup_menu () {

    add_menu_page('Test Plugin Page', 'Plugin Links', 'manage_options', 'test-plugin', 'test_init' );
}


add_action('admin_enqueue_scripts', 'my_styles');

function my_styles() {

    wp_register_style( 'custom_wp_admin_css', plugins_url('/Links_Plugin/css/style.css'));
    wp_enqueue_style( 'custom_wp_admin_css' );

}



function test_init() {

   ?>

<div id = 'wrap'>

<h1 id = titrePlugin >Bienvenue sur le plugin de Links !</h1>

<p>Ici vous trouverez toutes les infos concernant les Evènements sur DataTourisme</p>

    <p>D'ici vous allez pouvoir charger les fichiers contenus dans la base de données Blazegraph/ PhpMyadmin au besoin. Ces données
    seront stockées de manières a ce que vous y ayez accès en permanence.</p>

    <label>Cliquez sur le bouton</label><input type="button" value="Interroger" id = "test">

    <div id ="texte">


    </div>

    <div id = infos_plugin>

        <table id="planning" border="0">
            <tr>
                <th>Intitulé du spectacle</th>
                <th>Adresse</th>
            </tr>
        </table>

    </div>








    <p>DATATOURISME Powered. 2019</p>

</div>
<?php

}

/*******link de ma page js *********/

add_action('admin_enqueue_scripts', 'my_scripts'); // add scripts to dashboard head

function my_scripts() {
    wp_enqueue_script('jquery');
    wp_register_script('my_script', plugins_url('../Links_Plugin/js/dynamic.js', __FILE__));
    wp_enqueue_script('my_script');
}

/**** provient de la librairie wordpress *****/


add_action( 'admin_footer', 'my_action_javascript' ); // Write our JS below here

function my_action_javascript() {

    ?>

<script type="text/javascript" >

    jQuery(document).ready(function($) {

        var data = {
            'action': 'my_action',

        };

        // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php

            jQuery.post(ajaxurl, data, function(response) {


                console.log(response);


                var obj = JSON.parse(response);

           document.getElementById('test').addEventListener('click', function () {

               document.getElementById('texte').innerHTML = "Il y a " +  obj.data.poi.total + " resultats dont : " + "<br><br>"


               function generate_table() {

                   var obj = JSON.parse(response);

                   for (var t = 0; t < obj.data.poi.results.length; t++ ) {

                       if (obj.data.poi.results[t].takesPlaceAt[0].endTime = "null") {

                           obj.data.poi.results[t].takesPlaceAt[0].endTime = "heure de fin non définie par le serveur";

                       }



                       tr = document.createElement("tr");


                       td1 = document.createElement("td");
                       txt1 = document.createTextNode(obj.data.poi.results[t].rdfs_label);
                       td1.appendChild(txt1);
                       tr.appendChild(td1);


                       td2 = document.createElement("td");
                       txt2 = document.createTextNode(obj.data.poi.results[t].isLocatedAt[0].schema_address[0].schema_streetAddress);
                       td2.appendChild(txt2);
                       tr.appendChild(td2);


                       td3 = document.createElement("td");
                       txt3 = document.createTextNode(obj.data.poi.results[t].isLocatedAt[0].schema_address[0].schema_addressLocality);
                       td3.appendChild(txt3);
                       tr.appendChild(td3);


                       td4= document.createElement("td");
                       txt4 = document.createTextNode(obj.data.poi.results[t].takesPlaceAt[0].startDate);
                       td4.appendChild(txt4);
                       tr.appendChild(td4);


                       td5= document.createElement("td");
                       txt5 = document.createTextNode(obj.data.poi.results[t].takesPlaceAt[0].startTime);
                       td5.appendChild(txt5);
                       tr.appendChild(td5);


                       td6= document.createElement("td");
                       txt6 = document.createTextNode(obj.data.poi.results[t].takesPlaceAt[0].endDate);
                       td6.appendChild(txt6);
                       tr.appendChild(td6);


                       td7= document.createElement("td");
                       txt7 = document.createTextNode(obj.data.poi.results[t].takesPlaceAt[0].endTime);
                       td7.appendChild(txt7);
                       tr.appendChild(td7);

                       document.getElementById('planning').appendChild(tr);

                   }

               }

               generate_table()

           });


        });
    });

</script>

    <?php
}

/********************************************************************************/


add_action( 'wp_ajax_my_action', 'my_action' );

function my_action() {

//define('SERVER', 'sparql'); # switch resolver to pure sparql
    header('Access-Control-Allow-Credentials: true', true);
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: Content-Type');

    $payload = null;

    switch ($_SERVER['REQUEST_METHOD']) {
        case 'POST':
            if (isset($_SERVER['CONTENT_TYPE']) && 'application/json' === $_SERVER['CONTENT_TYPE']) {
                $rawBody = file_get_contents('php://input');
                $requestData = json_decode($rawBody ?: '', true);
            } else {
                $requestData = $_POST;
            }
            break;
        case 'GET':
            $requestData = $_GET;
            break;
        default:
            exit;
    }

    $payload = isset($requestData['query']) ? $requestData['query'] : null;


// composer autoload
    require __DIR__ . '/vendor/autoload.php';

// instanciation du client
    $api = \Datatourisme\Api\DatatourismeApi::create('http://localhost:9999/blazegraph/namespace/kb/sparql');

// éxecution d'une requête

    $result = $api->process('{
    poi (
     size: 100,          # <- Limite le nombre de résultats par page
     from: 0,    
    )
    {
    total
    results {
    rdfs_label
      isLocatedAt {
        schema_address {
            schema_streetAddress
            cedex
            schema_addressLocality
            }
            }
      takesPlaceAt {
      startDate
      startTime
      endDate
      endTime
      }
    }
  }
}');

// prévisualisation des résultats


    echo json_encode($result);

    wp_die();

    // this is required to terminate immediately and return a proper response
}














/*function myenqueue() {

    wp_enqueue_script( 'mon-script-ajax', get_template_directory_uri() . 'Links_Plugin/js/dynamic.js', array('jquery') );
    wp_localize_script( 'mon-script-ajax', 'adminAjax', admin_url( 'admin-ajax.php' ) );
}


add_action( 'wp_ajax_get_my_post', 'mafonction' );
add_action( 'wp_ajax_nopriv_get_my_post', 'mafonction' );


function mafonction()
{
    echo "test";

    die();

}
*/




