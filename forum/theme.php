<?php
	session_start ();
	if(empty($_SESSION['theme']) OR $_SESSION['theme']==1)
	{
		$_SESSION['theme']=2;
	}
	else
	{
		$_SESSION['theme']=1;
	}
	echo "<script type='text/javascript'>history.go(-1);</script>";
?>