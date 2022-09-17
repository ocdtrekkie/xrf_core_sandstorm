<?php

//Function xrf_has_uclass
//Use: Checks to see if a user has a particular class.
function xrf_has_uclass($uClass,$chkClass)
{
if (strpos($uClass,$chkClass) === false)
return false;
else
return true;
}

?>