<?php
session_start();
require('../includes/database-infos.php');

// Informations
$description = $_POST['description_generale'];
$remarques = $_POST['remarques'];
$fichiersnumerique = $_POST['fichier_numerique'];
$notesbasdepage = $_POST['notes_bas_de_page'];
// Cliché
$nombre = $_POST['nb_cliches'];
$couleurounb = $_POST['couleur_nb'];
$negatif = $_POST['negatif'];
$taille = $_POST['taille_cliches'];
// Personne
$nom = $_POST['nom_personne'];
// Iconographie
$descriptionIco = $_POST['desc_icono'];
// SituationGéographique
$discriminant = $_POST['discriminant'];
$ville = $_POST['ville'];
// DateFormat
$jour = $_POST['jour'];
$mois = $_POST['mois'];
$annee = $_POST['annee'];
$datetxt = $_POST['datetxt'];
// Article
$refcindoc = $_POST['cindoc'];
$serie = $_POST['serie'];
$sujet = $_POST['sujet'];

$sql_add_informations = "INSERT INTO informations
(description, remarques, fichiernumérique, notesbasdepage)
VALUES('" . $description . "', '" . $remarques . "', '" . $fichiersnumerique . "', '" . $notesbasdepage . "');";

$sql_add_cliche = "INSERT INTO cliché
(nombre, couleurounb, négatifouinversible, taille)
VALUES('" . $nombre . "', '" . $couleurounb . "', '" . $negatif . "', '" . $taille . "');";

$sql_add_personne = "INSERT INTO personne
(nom) VALUES ('" . $nom . "');";

$sql_add_iconographie = "INSERT INTO iconographie
(description) VALUES ('" . $descriptionIco . "');";

$sql_add_situationgeographique = "INSERT INTO SItuationGéographique
(discriminant, ville) VALUES ('" . $discriminant . "', '" . $ville . "');";

$sql_add_dateformat = "INSERT INTO DateFormat
(jour, mois, année, datetxt) VALUES
(" . $jour . ", '" . $mois . "', " . $annee . ", '" . $datetxt . "');";

$sql_add_article = "INSERT INTO article
(refcindoc, serie, sujet) VALUES
('" . $refcindoc . "', '" . $serie . "', '" . $sujet . "');";

$conn->query($sql_add_informations);
$conn->query($sql_add_cliche);
$conn->query($sql_add_personne);
$conn->query($sql_add_iconographie);
$conn->query($sql_add_situationgeographique);
$conn->query($sql_add_dateformat);
$conn->query($sql_add_article);

header('../visualisation.php');
?>