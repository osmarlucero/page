<?php 
	var_dump($_POST);
	echo "<hr>";
	$num1=$_POST["numero1"];
	$num2=$_POST["numero2"];

	switch($_POST['option']){
		case 1:
			echo ($num1+$num2);
		break;
		case 2:
			echo ($num1-$num2);
		break;
		case 3:
			echo ($num1*$num2);
		break;
		case 4:
			echo ($num1/$num2);
		break;
	}
 ?>