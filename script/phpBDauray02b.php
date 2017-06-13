<?php

include ("INC_LAB.inc");
echo " <b><font size=+3 color='#0000ff'  face='sans-serif'> Modif de la Base <BR></font></a></b>";

//echo"===> $NumCen ,$FON ,$CAP, $Valeur <BR>";

if (($linkdb = DB_connx("auraynodcap1")))
   {

    reset($_POST);
    $NumCen= pos($_POST) ;
    next ($_POST);
    print (" NumCentral = <b> $NumCen ----> Effacement des Lignes </b> <BR>\n");
    $query = "DELETE FROM Senarline where central_idcentral=$NumCen";
    echo " *** $query";
    $result = mysql_query($query);
   	echo"<HR><BR>";
    if ($result==0) echo "<BIG><BIG>Désolé problème d'effacement dans BD </BIG></BIG>";



    $idx=0;
      for (;$CLE=key($_POST);next ($_POST))
      {

       $Fonction = pos($_POST);
       next ($_POST);
       $Capteur = pos($_POST);
       next ($_POST);
       $Valeur = pos($_POST);
       print(" Key > $CLE  =  <b>$Fonction , $Capteur , $Valeur , </b> <BR>\n");
       $idx++;
       $query = "INSERT INTO Senarline (NumLine,Fonction,nomvar,valeur,central_idcentral) VALUES ($idx,'$Fonction','$Capteur','$Valeur',$NumCen)";
       echo " *** $query";
       $result = mysql_query($query);
    	echo"<HR><BR>";
 	   if ($result==0) echo "<BIG><BIG>Désolé problème d'enregistrement dans BD </BIG></BIG>";
       }
	}
else echo "<BIG><BIG>Désolé pas de BD </BIG></BIG>";

?>
<a href="index.html"><button type="button">Retour</button></a>
