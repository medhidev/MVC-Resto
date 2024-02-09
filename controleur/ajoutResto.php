<?php

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include "$racine/modele/bd.resto.inc.php";
include "$racine/modele/bd.photo.inc.php";

// include "$racine/modele/authentification.inc.php";

// partie sécurité non - fonctionnel
// permet normallement de vérifier qu'un utilisateur lambda
// ne puisse pas accéder à la création d'un restaurant
// if (isLoggedOn()){
    
// }
// else {
//     echo "$racine/vue/vueListeRestos.php";
// }

if (isset($_POST["creerResto"])){

    // information récupérer pour l'ajout du restaurant
    $nom = $_POST["nomR"];
    $num_adresse = $_POST["numAdr"];
    $nom_adresse = $_POST["nomAdr"];
    $cp = $_POST["cpR"];
    $ville = $_POST["villeR"];
    $description = $_POST["descR"];
    $midiSdeb = $_POST["heureDebMidiSem"];
    $midiSfin = $_POST["heureFinMidiSem"];
    $midiWdeb = $_POST["heureDebMidiWeek"];
    $midiWfin = $_POST["heureFinMidiWeek"];
    $soirSdeb = $_POST["heureDebSoirSem"];
    $soirSfin = $_POST["heureFinSoirSem"];
    $soirWdeb = $_POST["heureDebSoirWeek"];
    $soirWfin = $_POST["heureFinSoirWeek"];
    $emporterSdeb = $_POST["heureDebEmpSem"];
    $emporterSfin = $_POST["heureFinEmpSem"];
    $emporterWdeb = $_POST["heureDebEmpWeek"];
    $emporterWfin = $_POST["heureFinEmpWeek"];

    try {
        insertResto($nom, $num_adresse, $nom_adresse, $cp, $ville, $description
        , $midiSdeb, $midiSfin, $midiWdeb, $midiWfin
        , $soirSdeb, $soirSfin, $soirWdeb, $soirWfin
        , $emporterSdeb, $emporterSfin, $emporterWdeb, $emporterWfin);

        $nomFichier = $_FILES["imageUpload"]["name"];
        addPhotos($nomFichier, );
        
        echo "<div style='color: green;'>creation du restaurant avec succès !</div>";

    } catch (Exception $e){
        // erreur
        print "Erreur: ".$e->getMessage();
        die();
    }
    
}

$titre = "Ajout resto";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueAjoutResto.php";


?>