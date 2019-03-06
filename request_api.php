<?php
/**
 * Created by PhpStorm.
 * User: stagiaire
 * Date: 2019-03-06
 * Time: 11:16
 */

add_action( 'wp_ajax_mon_action', 'mon_action' );
add_action( 'wp_ajax_nopriv_mon_action', 'mon_action' );


function mon_action ()
{

    echo "j'ai du texte a exploiter";

}