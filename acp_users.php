<?php
require_once("includes/global_req_login.php");
require_once("includes/header.php");

if ($xrf_myulevel < 3)
{
xrf_go_redir("index.php","Invalid permissions.",2);
}
else
{

echo "<b>User Accounts</b><p>";

$query="SELECT * FROM g_users";
$result=mysqli_query($xrf_db, $query);

$num=mysqli_num_rows($result);

echo "<table>";
$qq=0;
while ($qq < $num) {

$id=xrf_mysql_result($result,$qq,"id");
$username=xrf_mysql_result($result,$qq,"username");
$sandstormuserid=xrf_mysql_result($result,$qq,"sandstormuserid");

echo "<tr><td width=200>$username ($id)</td><td width=200>$sandstormuserid</td></tr>";
$qq++;
}

echo "</table>";
}

require_once("includes/footer.php");
?>