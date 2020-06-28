<?php

    require('./includes/database-infos.php');

    $idcliche = $_GET['cliche'];
    echo "ID " . $idcliche;

    $deleteCliche = "DELETE FROM cliché WHERE indexcliché = " . $idcliche . ";";
    $deleteDate = "DELETE FROM dateformat WHERE indexdate = " . $idcliche . ";";
    $deleteIco = "DELETE FROM iconographie WHERE indexico = " . $idcliche . ";";
    $deleteInfo = "DELETE FROM informations WHERE indexinformations = " . $idcliche . ";";
    $deletePersonne = "DELETE FROM personne WHERE indexpersonne = " . $idcliche . ";";
    $deleteGeo = "DELETE FROM situationgéographique WHERE indexlieu = " . $idcliche . ";";
    $deleteArticle = "DELETE FROM article WHERE idarticle = " . $idcliche . ";";

    $conn->query($deleteCliche);
    $conn->query($deleteDate);
    $conn->query($deleteIco);
    $conn->query($deleteInfo);
    $conn->query($deletePersonne);
    $conn->query($deleteGeo);
    $conn->query($deleteArticle);

    header('Location: visualisation.php');

?>