<html>
<body>
<?php
$kauppa = array("Olet kaupassa mitä teet?",
array(
	array("1. Vedät aseen esiin ja huudat kädet ylös.","KADET_YLHAALLA"), //0
	array("2. Lähdet kaupasta, koska sinua pelottaa liikaa","PARKKIPAIKKA"), // 1
	array("3. Teeskentelet olevasi kiinnostunut biodynaamisista porkkanoista ja seuraat tilannetta.","HYLLY") // 2
)
);

$hylly = array("Hämäyksesi menee täydestä ja huomaat epäilyttävän hyypiön tulevan ulos pullonpalautusautomaattien viereisestä ovesta.
mitä teet?",
array(
	array("1. Vedän aseen esiin ja huudat kädet ylös.","KADET_YLHAALLA"),
	array("2. Hyödynnät tilaisuutta ja menet nopeasti takahuoneeseen ennen kuin ovi menee kiinni.","TAKAHUONEESSA")
)
);

$kadet_ylhaalla = array("Kauppias nostaa kädet ylös, mutta takanasi kaupan apulainen vetää huomaamatta esiin katkaistun haulikon ja ... HÄVISIT",
array()
);

$takahuoneessa = array("Tulet hämyiseen huoneeseen ja huomaat huomaat pöydällä epäilyttäviä valkoisia pusseja Mitä teet?",
array(
	array("1. Menet pussin luo ja maistat tuotetta.","TUNTEMATON"),
	array("2. Epäilysi on varmistunut. Vedät aseen esiin ja ryntäät kauppaan sisään huutaen kädet ylös.","KADET_YLHAALLA")
)
);

$parkkipaikka = array("Menet kaupasta ulos ja päätät irtisanoutua, koska pääsi ei enää kestä. LOPPU",
array()
);

$pelitilat = array("KAUPPA" => $kauppa, "HYLLY" => $hylly, "KADET_YLHAALLA" => $kadet_ylhaalla, "TAKAHUONEESSA" => $takahuoneessa, 
"PARKKIPAIKKA" => $parkkipaikka);

$nykyinen_tila="KAUPPA";

if( isset( $_GET["valinta"] ) ) { $nykyinen_tila = $_GET["valinta"]; }

echo $pelitilat[$nykyinen_tila][0];
echo "<br>";
foreach($pelitilat[$nykyinen_tila][1] as $valinta){
	print '
			<form action="index_assosiatiivinen_taulukko.php" method="get">
			<input type="hidden" name="valinta" value="'.$valinta[1].'"><br>
			<input type="submit" value="'.$valinta[0].'">
			</form>';
}
?>
