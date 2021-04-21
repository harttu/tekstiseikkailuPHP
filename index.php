<html>
<body>

<?php
// 0
$kauppa = array("Olet kaupassa mitä teet?
1. Vedät aseen esiin ja huudat kädet ylös.
2. Lähdet kaupasta, koska sinua pelottaa liikaa
3. Teeskentelet olevasi kiinnostunut biodynaamisista porkkanoista ja seuraat tilannetta.",
array(2,4,1));

// 1
$hylly = array("Hämäyksesi menee täydestä ja huomaat epäilyttävän hyypiön tulevan ulos pullonpalautusautomaattien viereisestä ovesta.
mitä teet? 
1. Vedän aseen esiin ja huudat kädet ylös. 
2. Hyödynnät tilaisuutta ja menet nopeasti takahuoneeseen ennen kuin ovi menee kiinni.",
array(2,3));

// 2
$kadet_ylhaalla = array("Kauppias nostaa kädet ylös, mutta takanasi kaupan apulainen vetää huomaamatta esiin katkaistun haulikon ja ... HÄVISIT");

// 3
$takahuoneessa = array("Tulet hämyiseen huoneeseen ja huomaat huomaat pöydällä epäilyttäviä valkoisia pusseja Mitä teet? 
1. Menet pussin luo ja maistat tuotetta. 
2. Epäilysi on varmistunut. Vedät aseen esiin ja ryntäät kauppaan sisään huutaen kädet ylös.",
array(9,2));

// 4
$parkkipaikka = array("Menet kaupasta ulos ja päätät irtisanoutua, koska pääsi ei enää kestä. LOPPU");

$pelitilat = array($kauppa,$hylly,$kadet_ylhaalla,$takahuoneessa,$parkkipaikka);

$nykyinen_tila=0;
if( isset( $_GET["valinta"] ) )  {
	$nykyinen_tila = $pelitilat[$_GET["edellinen_valinta"]][1][$_GET["valinta"]-1]; // vähennetään yksi koska kyseessä array, kohdassa [1] on tieto siirtymistä
}


// näin sivu latautuu
// http://localhost/tekstiseikkailu/index.php?valinta=1
echo $pelitilat[$nykyinen_tila][0];
?>

<form action="index.php" method="get">
<input type="hidden" name="edellinen_valinta" value=<?php echo $nykyinen_tila?>>
Valinta: <input type="text" name="valinta"><br>
<input type="submit">
</form>

</body>
</html>

<!--
// kysytään käyttäjältä valinta. Sen perusteella tulostetaan uusi kohta pelitilat muuttujasta
// näytetään pelitila
-->