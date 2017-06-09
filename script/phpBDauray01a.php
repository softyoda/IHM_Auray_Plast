
<?php

include ("INC_LAB.inc");
if (($linkdb = DB_connx("auraynodcap1")))
{  echo " <b><font size=+3 color='#0000ff'  face='sans-serif'> Ecriture une Ligne de Seario </font></a></b>";
   echo " <form action= phpBDauray01b.php  method=POST>";
   echo "<font size=+2color='#000000' face='sans-serif'> Centrale <select name='NumCen'>";
   $result = mysql_query("SELECT idcentral FROM central");
  	if ($result)
 	 {
        while ($row =  mysql_fetch_array($result))
        {echo "<option value='$row[0]'>$row[0]";}
      }
   echo "</select>";   echo "<BR>";
   echo "Address IP  :<input type='text' size='20' name='AddIP'> <BR>" ;
   echo "<BR>";
   echo "Fonctionne (On):<input type='radio' name='EtatFNC' value='O' checked>" ;
   echo "Arrete (oFf):<input type='radio' name='EtatFNC' value='F' > <BR> " ;
   echo "Debut Mesures   :<input type='text' size='20' name='DebMes'> <BR> " ;
   echo "Fin  Mesures   :<input type='text' size='20' name='EndMes'> <BR>";
   echo "Temps Acquisition  Mesures   :<input type='text' size='20' name='AcqMes'> <BR> " ;


 echo "<input type=submit value='OK'> <font size=+3 color='#000000'  face='sans-serif'>";
 echo "</font></form>";
//echo "</tr>";
 }

 
?>

