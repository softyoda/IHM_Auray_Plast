
<?php

include ("INC_LAB.inc");
if (($linkdb = DB_connx("auraynodcap1")))
{  echo " <b><font size=+3 color='#0000ff'  face='sans-serif'> TeleChargement Fichier Scrit vers Central </font></a></b>";
   echo " <form action= phpFTPauray01b.php  method=POST>";
   echo "<font size=+2color='#000000' face='sans-serif'> Centrale <select name='NumCen'>";
   $result = mysql_query("SELECT idcentral FROM central");
  	if ($result)
 	 {
        while ($row =  mysql_fetch_array($result))
        {echo "<option value='$row[0]'>$row[0]";}
      }
 echo "</select>";   echo "<BR>";
   echo "Nom de Loggin sur la Central :<input type='text' size='20' name='logName'> <BR>" ;
   echo "<BR>";
   echo "Password =   :<input type='text' size='20' name='PassW'> <BR> " ;


 echo "<input type=submit value='OK'> <font size=+3 color='#000000'  face='sans-serif'>";
 echo "</font></form>";

 }

 
?>

