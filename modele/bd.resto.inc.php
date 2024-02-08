<?php

include_once "bd.inc.php";

function getRestoByIdR($idR) {

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from resto where idR=:idR");
        $req->bindValue(':idR', $idR, PDO::PARAM_INT);

        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}


function getRestos() {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from resto");
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $resultat[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}



function getRestosByNomR($nomR) {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from resto where nomR like :nomR");
        $req->bindValue(':nomR', "%".$nomR."%", PDO::PARAM_STR);

        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $resultat[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getRestosByAdresse($voieAdrR, $cpR, $villeR) {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from resto where voieAdrR like :voieAdrR and cpR like :cpR and villeR like :villeR");
        $req->bindValue(':voieAdrR', "%".$voieAdrR."%", PDO::PARAM_STR);
        $req->bindValue(':cpR', $cpR."%", PDO::PARAM_STR);
        $req->bindValue(':villeR', "%".$villeR."%", PDO::PARAM_STR);
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $resultat[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}



function getRestosAimesByMailU($mailU) {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select resto.* from resto,aimer where resto.idR = aimer.idR and mailU = :mailU");
        $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $resultat[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function insertResto($nom, $num_adresse, $nom_adresse, $cp, $ville, $description
, $midiSdeb, $midiSfin, $midiWdeb, $midiWfin
, $soirSdeb, $soirSfin, $soirWdeb, $soirWfin
, $emporterSdeb, $emporterSfin, $emporterWdeb, $emporterWfin){
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $tableau_horaire = "
        <table>
            <thead>
                <tr>
                    <th>Ouverture</th><th>Semaine</th>	<th>Week-end</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class='label'>Midi</td>
                    <td class='cell'>de ".$midiSdeb."h à ".$midiSfin."h</td>
                    <td class='cell'>de ".$midiWdeb."h à ".$midiWfin."h</td>
                </tr>
                <tr>
                    <td class='label'>Soir</td>
                    <td class='cell'>de ".$soirSdeb."h à ".$soirSfin."h</td>
                    <td class='cell'>de ".$soirWdeb."h à ".$soirWfin."h</td>	
                </tr>
                <tr>
                    <td class='label'>À emporter</td>
                    <td class='cell'>de ".$emporterSdeb."h à ".$emporterSfin."h</td>
                    <td class='cell'>de ".$emporterWdeb."h à ".$emporterWfin."h</td>
                </tr>
            </tbody>
        </table>";

        $request = "insert into resto(`nomR`, `numAdrR`, `voieAdrR`, `cpR`, `villeR`, `descR`, `horairesR`
        values (':nom', :num_adresse, ':nom_adresse', :cp, ':ville', ':description', );";

        $req = $cnx->prepare($request);

        // paramètres
        $req->bindValue(':nom', $nom, PDO::PARAM_STR);
        $req->bindValue(':num_adresse', $num_adresse, PDO::PARAM_INT);
        $req->bindValue(':nom_adresse', $nom_adresse, PDO::PARAM_STR);
        $req->bindValue(':cp', $cp, PDO::PARAM_INT);
        $req->bindValue(':mailU', $ville, PDO::PARAM_STR);
        $req->bindValue(':mailU', $description, PDO::PARAM_STR);
        $req->bindValue(':mailU', $tableau_horaire, PDO::PARAM_STR);
        $req->execute();

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }

    return $resultat;
}

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // prog principal de test
    header('Content-Type:text/plain');

    echo "getRestos() : \n";
    print_r(getRestos());

    echo "getRestoByIdR(1) : \n";
    print_r(getRestoByIdR(1));

    echo "getRestosByNomR('charcut') : \n";
    print_r(getRestosByNomR("charcut"));

    echo "getRestosByAdresse(voieAdrR, cpR, villeR) : \n";
    print_r(getRestosByAdresse("Ravel", "33000", "Bordeaux"));
    
    echo "getRestosAimesByMailU(mailU) : \n";
    print_r(getRestosAimesByMailU("test@bts.sio"));
}
?>