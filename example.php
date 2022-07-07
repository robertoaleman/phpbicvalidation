<?php
require("class_vco.php");

if(isset($_POST['check']))
	{
	if ($_POST['check']!= "")
	{

		$check = new validate_container_owner();
		$check->calculate($_POST['check']);
	}
	else
	{
			echo "<h2>the value is null!, try again!</h2>";
	}
	 	}
?>
<style type="text/css">
body,td,th,h2 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	text-align:center;
}
</style>

<div style='text-align:center'>
<form action="example.php" method="post" name="check" target="_self">
<input name="check" type="text" size="11" maxlength="11" />
<input name="" type="submit" value="submit" />
</form>
</div>