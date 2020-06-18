<?php
require_once("includes/variables.php");
require_once("includes/functions_auth.php");
require_once("includes/functions_db.php");
require_once("includes/functions_redir.php");
require_once("includes/functions_sec.php");
$xrf_auth_version_page = "0S.1";

// Guest settings
$xrf_myid = 0;
$xrf_myusername = "";
$xrf_myuclass = "";
$xrf_myulevel = 1;

$xrf_db = @mysqli_connect($xrf_dbserver, $xrf_dbusername, $xrf_dbpassword, $xrf_dbname) or die(mysqli_connect_error());

ob_start();
session_start();

$xrf_config_query="SELECT * FROM g_config";
$xrf_config_result=mysqli_query($xrf_db, $xrf_config_query);

$xrf_site_name=xrf_mysql_result($xrf_config_result,0,"site_name");
$xrf_site_url=xrf_mysql_result($xrf_config_result,0,"site_url");
$xrf_site_key=xrf_mysql_result($xrf_config_result,0,"site_key");
$xrf_auth_version_db=xrf_mysql_result($xrf_config_result,0,"auth_version");
$xrf_server_name=xrf_mysql_result($xrf_config_result,0,"server_name");
$xrf_admin_email=xrf_mysql_result($xrf_config_result,0,"admin_email");
$xrf_admin_id=xrf_mysql_result($xrf_config_result,0,"admin_id");
$xrf_vlog_enabled=xrf_mysql_result($xrf_config_result,0,"vlog_enabled");
$xrf_style_default=xrf_mysql_result($xrf_config_result,0,"style_default");

xrf_check_auth_version($xrf_auth_version_page, $xrf_auth_version_db) or die("Unable to verify authentication version.  Please report to the system administrator.");

$xrf_myemail = $_SERVER['HTTP_X_SANDSTORM_USER_ID'];
$xrf_myusername = $_SERVER['HTTP_X_SANDSTORM_USERNAME'];

// Ensure user is logged in
if ($xrf_myid == 0)
{
die("You are not logged in!");
}
else
{
	$xrf_userdata_query="SELECT * FROM g_users WHERE id='$xrf_myid'";
	$xrf_userdata_result=mysqli_query($xrf_db, $xrf_userdata_query);
	
	@$xrf_mydatereg=xrf_mysql_result($xrf_userdata_result,0,"datereg");
	@$xrf_mylastlogin=xrf_mysql_result($xrf_userdata_result,0,"lastlogin");
	@$xrf_myuclass=xrf_mysql_result($xrf_userdata_result,0,"uclass");
	@$xrf_myulevel=xrf_mysql_result($xrf_userdata_result,0,"ulevel");
	@$xrf_mystylepref=xrf_mysql_result($xrf_userdata_result,0,"style_pref");
}
?>