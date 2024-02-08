<?php

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
session_start();

if ($_SESSION["restaurateur"]){
    if (isset($_POST["creerResto"])){
        // Ajout du restaurant
        // $nom =
        // $num_adresse
        // $nom_adresse
        // $cp, $ville
        // $description
        // $midiSdeb
        // $midiSfin
        // $midiWdeb
        // $midiWfin
        // $soirSdeb
        // $soirSfin
        // $soirWdeb
        // $soirWfin
        // $emporterSdeb
        // $emporterSfin
        // $emporterWdeb
        // $emporterWfin

        // insertResto($nom, $num_adresse, $nom_adresse, $cp, $ville, $description
        // , $midiSdeb, $midiSfin, $midiWdeb, $midiWfin
        // , $soirSdeb, $soirSfin, $soirWdeb, $soirWfin
        // , $emporterSdeb, $emporterSfin, $emporterWdeb, $emporterWfin);

        // if ()
    }
}

$titre = "Ajout resto";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueAjoutResto.php";

?>