<?php

//Function xrf_check_auth_version
//Use: Checks authorization version.
function xrf_check_auth_version($xrf_auth_version_page, $xrf_auth_version_db)
{
	if (strpos($xrf_auth_version_db, $xrf_auth_version_page) === false)
	{
		die("The authentication version for this module is outdated.  Please report to the system administrator.");
	}
	else
		return true;
}

?>