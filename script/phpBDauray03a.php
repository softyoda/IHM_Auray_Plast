<style>
h1{
  font-family: 'Georgia', sans-serif;
  font-size: 40px;
  text-align: center;
}
</style>
<?php

include ("INC_LAB.inc");
if (($linkdb = DB_connx("auraynodcap1")))
{  echo " <h1>Creation du fichier Script</h1>";
   echo " <form action= phpBDauray03b.php  method=POST>";
   echo "<font size=+2color='#000000' face='sans-serif'> Centrale <select name='NumCen'>";
   $result = mysql_query("SELECT idcentral FROM central");
  	if ($result)
 	 {
        while ($row =  mysql_fetch_array($result))
        {echo "<option value='$row[0]'>$row[0]";}
      }
 echo "</select>";   echo "<BR>";


 echo "<input type=submit value='OK'> <font size=+3 color='#000000'  face='sans-serif'>";
 echo "</font></form>";
 }
?>
<a href="index.html"><button type="button">Retour</button></a>
