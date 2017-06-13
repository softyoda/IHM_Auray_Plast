<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}
h1{
  font-family: 'Georgia', sans-serif;
  font-size: 40px;
  text-align: center;
}
p{
  font-family: 'Georgia', sans-serif;
  font-size: 20px;
}
tr:nth-child(even){background-color: #f2f2f2}
</style>
<?php

include ("INC_LAB.inc");
if (($linkdb = DB_connx("auraynodcap1")))
	{  echo " <h1>Ecriture  Lignes du Scenario </h1><BR> ";
     echo " <p>Attention les Lignes existantes seront détruites<BR></font></p>";
  echo " <form action= phpBDauray02b.php  method=POST>";
  echo "<font size=+2color='#000000' face='sans-serif'> Centrale <select name='NumCen'>";
  $result = mysql_query("SELECT idcentral FROM central");
  	if ($result)
 	 {
        while ($row =  mysql_fetch_array($result))
        {echo "<option value='$row[0]'>$row[0]";}
      }

echo "<BR><BR>";
echo "</select>";

echo "<table>" ;
//$NonFonc=array("F1","F2","F3","F4","F5","F6");
for($idx=0;$idx<7;$idx++)
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
