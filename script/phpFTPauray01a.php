<style>
input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
h1{
  font-family: 'Georgia', sans-serif;
  font-size: 40px;
  text-align: center;
}
</style>
<?php

include ("INC_LAB.inc");
if (($linkdb = DB_connx("auraynodcap1")))
{  echo " <h1>Téléchargement fichier script vers la centrale</h1>";
   echo " <form action= phpFTPauray01b.php  method=POST>";
   echo "<font size=+2 color='#000000' face='sans-serif'> Centrale <select name='NumCen'>";
   $result = mysql_query("SELECT idcentral FROM central");
  	if ($result)
 	 {
        while ($row =  mysql_fetch_array($result))
        {echo "<option value='$row[0]'>$row[0]";}
      }
   echo "</select>";
   echo "<BR>";
   echo "Login de la Centrale :<input type='text' size='20' name='logName'> <BR>" ;
   echo "<BR>";
   echo "Password :<input type='text' size='20' name='PassW'> <BR> " ;


 echo "<input type=submit value='OK'> <font size=+3 color='#000000'  face='sans-serif'>";
 echo "</font></form>";

 }

?>
<a href="index.html"><button type="button">Retour</button></a>
