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
h1
{
  font-family: 'Georgia', sans-serif;
  font-size: 40px;
  text-align: center;
}
</style>
<?php
include ("INC_LAB.inc");
if (($linkdb = DB_connx("auraynodcap1")))
{  echo " <h1>Configuration Central</h1>";
   echo " <form action= phpBDauray01b.php  method=POST>";
   echo "<BR>";
   echo "<font size=+2 color='#000000' face='sans-serif'> Centrale <select name='NumCen'></font>";
   $result = mysql_query("SELECT idcentral FROM central");
  	if ($result)
 	 {
        while ($row =  mysql_fetch_array($result))
        {echo "<option value='$row[0]'>$row[0]";}
      }
   echo "</select>";
   echo "<BR>";
   echo "Adresse IP:<input type='text' name='AddIP'> <BR>" ;
   echo "<BR>";
   echo "Etat Fonctionnement : ";
   echo "On <input type='radio' name='EtatFNC' value='O' checked>" ;
   echo "Off<input type='radio' name='EtatFNC' value='F' > <BR> " ;
   echo "<BR>";
   echo "Debut Mesures :<input type='text' name='DebMes'> <BR> " ;
   echo "<BR>";
   echo "Fin  Mesures :<input type='text' name='EndMes'> <BR>";
   echo "<BR>";
   echo "Temps Acquisition Mesures :<input type='text' name='AcqMes'> <BR> " ;

 echo "<input type=submit value='OK'> <font size=+3 color='#000000'  face='sans-serif'>";
 echo "</form>";
 }
?>
<a href="index.html"><button type="button">Retour</button></a>
