<?php
function DB_connx($DATABASE)
{
  $linkdb= @mysql_pconnect("localhost","root","auray");
  if ($linkdb && mysql_select_db($DATABASE,$linkdb))
 return($linkdb);
  else return(FALSE);
}
function DEBUT_html($TITRE)
{
 	print "<HTML><HEAD>";
 	print "<TITLE>$TITRE</TITLE>";
	print "</HEAD><BODY>";
}
function FIN_html()
{
  	echo "</BODY></HTML>";
 }

?>
