<?php
include ("INC_LAB.inc");

$NumCen=$_POST["NumCen"];
$AddIP=$_POST["AddIP"];
$EtatFNC=$_POST["EtatFNC"];
$DebMes=$_POST["DebMes"];
$EndMes=$_POST["EndMes"];
$AcqMes=$_POST["AcqMes"];

echo"<HR>Modif de la Base <BR>";
echo"===> $NumCen ,$AddIP ,$EtatFNC, $DebMes ,$EndMes ,$AcqMes <BR>";

if (($linkdb = DB_connx("auraynodcap1")))
	{
    	echo"<HR><BR>";
    	$query = "UPDATE  central set AddIP='$AddIP',EtatFNC='$EtatFNC',DebMes='$DebMes',EndMes='$EndMes',AcqMes='$AcqMes' where idcentral=$NumCen";
    	echo " *** $query";
 	$result = mysql_query($query);
    	echo"<HR><BR>";
 	if ($result) echo "<BIG><BIG>==>OK resultat = $result</BIG></BIG><BR>";

	 else echo "<BIG><BIG>Désolé PB d'enregistrement dans BD </BIG></BIG>";
	}
	else echo "<BIG><BIG>Désolé pas de BD </BIG></BIG>";


?>
<a href="index.html"><button type="button">Retour</button></a>
