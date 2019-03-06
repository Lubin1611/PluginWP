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

    <div id = infos_plugin>


    </div>
    <div id ="texte">


    </div>





    <p>DATATOURISME Powered. 2019</p>

</div>
<?php

}

add_action('admin_enqueue_scripts', 'my_scripts'); // add scripts to dashboard head

function my_scripts() {
    wp_enqueue_script('jquery');
    wp_register_script('my_script', plugins_url('../Links_Plugin/js/dynamic.js', __FILE__));
    wp_enqueue_script('my_script');
}



?>