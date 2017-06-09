<?php
include ("INC_LAB.inc");
if (($linkdb = DB_connx("auraynodcap1")))
	{  echo " <b><font size=+3 color='#0000ff'  face='sans-serif'> Lignes du Scenario  <BR> ";
       echo " Attention les Lignes existantes seront détruites <BR></font></a></b>";
  echo " <form action= phpBDauray02b.php  method=POST>";
  echo "<font size=+2color='#000000' face='sans-serif'> Centrale <select name='NumCen'>";
  $result = mysql_query("SELECT idcentral FROM central");
  	if ($result)
 	 {
        while ($row =  mysql_fetch_array($result))
        {echo "<option value='$row[0]'>$row[0]";}
      }
//        echo "Address IP  :<input type='text' size='20' name='AddIP'> <BR>" ;
//        echo "Nom Centrale  :<input type='text' size='20' name='AddIP'> <BR> ";
echo "<BR><BR>";
  // echo "Fonctionne (On):<input type='radio' name='EtatFNC' value='O' checked>" ;
//   echo "Arrete (oFf):<input type='radio' name='EtatFNC' value='F' > <BR> " ;
 //  echo "Debut Mesures   :<input type='text' size='20' name='DebMes'> <BR> " ;
//   echo "Fin  Mesures   :<input type='text' size='20' name='EndMes'> <BR>";
//   echo "Temps Acquisition  Mesures   :<input type='text' size='20' name='AcqMes'> <BR> " ;

 echo "</select>";
// echo " <form action= phpBDauray01a.php  method=GET>";


echo "<table border='1' width='60%'>" ;
//$NonFonc=array("F1","F2","F3","F4","F5","F6");
for($idx=0;$idx<6;$idx++)
{
 echo "<tr>";
 echo "<td>";
 $NumLig=$idx+1;
 echo "Numero Ligne = $NumLig";
 echo "</td>";
 echo "<td>";
 $NomFonc="FON".(string)$idx;
 $NomCap="CAP".(string)$idx;
 $NomVal="VAL".(string)$idx;

 //echo " <h1><font size=+2color='#FF0000' face='sans-serif'> NumLigne <INPUT name='NumLigne' size='3' type='text'> ";
 echo "<font size=5 color='#000000' face='sans-serif'> Fonction <select name=$NomFonc> "; //$NonFonc[$idx]> " ;
       echo "<option value='NONE'> NONE";
       echo "<option value='BEGIN'> BEGIN";
       echo "<option value='WRBUS'> WRBUS";
       echo "<option value='RDBUS'> RDBUS";
       echo "<option value='IFSUP'> IFSUP";
       echo "<option value='IFINF'> IFINF";
       echo "<option value='IFEQU'> IFEQU";
       echo "<option value='ENDIF'> ENDIF";
       echo "<option value='PRIDB'> PRIDB";
       echo "<option value='ENDPR'> ENDPR";
       echo "</select>";
       echo "</td>";
  echo "<td>";
  echo "<font size=5 color='#000000' face='sans-serif'> Capteur <select name=$NomCap>";
         echo "<option value='None'> None";
  $result = mysql_query("SELECT NomCap FROM NodCap");
  	if ($result)
 	 {
        while ($row =  mysql_fetch_array($result))
        {echo "<option value='$row[0]'>$row[0]";}
      }

 echo "</select>";
      echo "</td>";
   echo "<td>";

  echo " <font size=5 color='#000000' face='sans-serif'> Valeur <INPUT name=$NomVal size='10' type='text'> ";
       echo "</td>";
      echo "</tr>";
 }
  echo "</table>";



 echo "<input type=submit value='OK'> <font size=+3 color='#000000'  face='sans-serif'>";
 echo "</font></td></form>";
echo "</tr>";
 }

?>
<a href="index.html"><button type="button">Retour</button></a>
