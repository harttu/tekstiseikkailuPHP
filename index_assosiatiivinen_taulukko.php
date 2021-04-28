<html>
<body>

<?php
// 0
$kauppa = array(
"otsikko" => "Kauppa",
"teksti" => "Olet kaupassa mitä teet?",
"vaihtoehdot" => array(
	array("napin_teksti" => "1. Vedät aseen esiin ja huudat kädet ylös.","mihin_siirtyy" => "KADET_YLHAALLA"),
	array("napin_teksti" => "2. Lähdet kaupasta, koska sinua pelottaa liikaa","mihin_siirtyy" => "PARKKIPAIKKA"),
	array("napin_teksti" => "3. Teeskentelet olevasi kiinnostunut biodynaamisista porkkanoista ja seuraat tilannetta.","mihin_siirtyy" => "HYLLY")
)
);

// 1
$hylly = array(
"otsikko" => "Hyllyllä",
"teksti" => "Hämäyksesi menee täydestä ja huomaat epäilyttävän hyypiön tulevan ulos pullonpalautusautomaattien viereisestä ovesta.
mitä teet?", 
"vaihtoehdot" => array(
	array("napin_teksti" => "1. Vedän aseen esiin ja huudat kädet ylös.","mihin_siirtyy" =>  "KADET_YLHAALLA"), 
	array("napin_teksti" => "2. Hyödynnät tilaisuutta ja menet nopeasti takahuoneeseen ennen kuin ovi menee kiinni.","mihin_siirtyy" => "TAKAHUONEESSA")
	)
);

// 2
$kadet_ylhaalla = array(
"otsikko" => "Pidätys",
"teksti" => "Kauppias nostaa kädet ylös, mutta takanasi kaupan apulainen vetää huomaamatta esiin katkaistun haulikon ja ... HÄVISIT",
"vaihtoehdot" => array());

// 3
$takahuoneessa = array(
"otsikko" => "Takahuone",
"teksti" => "Tulet hämyiseen huoneeseen ja huomaat huomaat pöydällä epäilyttäviä valkoisia pusseja Mitä teet?", 
"vaihtoehdot" => 	array(
		array("napin_teksti" => "1. Menet pussin luo ja maistat tuotetta.","mihin_siirtyy" => "TUNTEMATON"),
		array("napin_teksti" => "2. Epäilysi on varmistunut. Vedät aseen esiin ja ryntäät kauppaan sisään huutaen kädet ylös.","mihin_siirtyy" => "KADET_YLHAALLA")
	)
);

// 4
$parkkipaikka = array(
"otsikko" => "Parkkipaikka", // 0
"teksti" => "Menet kaupasta ulos ja päätät irtisanoutua, koska pääsi ei enää kestä. LOPPU", // 1
"vaihtoehdot" => array() // 2
);

$pelitilat = array( "KAUPPA" => $kauppa, "HYLLY" => $hylly, "KADET_YLHAALLA" => $kadet_ylhaalla, "TAKAHUONEESSA" => $takahuoneessa, "PARKKIPAIKKA" => $parkkipaikka );

$nykyinen_tila="KAUPPA";
if( isset( $_GET["valinta"] ) )  {
	$nykyinen_tila = $_GET["valinta"];
}

echo "<h1>".$pelitilat[$nykyinen_tila]["otsikko"]."</h1>";
echo $pelitilat[$nykyinen_tila]["teksti"];
echo "<br>";
foreach($pelitilat[$nykyinen_tila]["vaihtoehdot"] as $valinta){ // valinta on esim: array("napin_teksti" => "1. Menet pussin luo ja maistat tuotetta.","mihin_siirtyy" => "TUNTEMATON")
	print '
			<form action="'. $_SERVER["PHP_SELF"]. '" method="get">
			<input type="hidden" name="valinta" value="'.$valinta["mihin_siirtyy"].'">
			<input type="submit" value="'.$valinta["napin_teksti"].'"> 
			</form>';
}
?>
