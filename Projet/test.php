<body style="Background-color:black;color:green">
<table>
<?php
	while(1==1){
?>
	<tr>
		<td><?php echo if(($c%2)==0){echo 1;}else{echo 2;}?></td><td><?php echo if(($a%2)==0){echo 1;}else{echo 2;}?></td><td><?php echo if(($b%2)==0){echo 1;}else{echo 2;}?></td><td><?php echo if(($d%2)==0){echo 1;}else{echo 2;};?></td>
	</tr>
<?php
		$c++;
		$a++;
		$b++;
		$d++;
	}
?>
</table>
</body>