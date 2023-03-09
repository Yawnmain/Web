<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <link rel="stylesheet" href="css.css" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<table>
	<?php
	for ($i = 0; $i <= 10; $i++){
		echo '<tr>';
		for ($j = 0; $j <= 10; $j++){
			if ($i == 0 && $j == 0)
				echo "<td class='first'></td>";
			else if ($i == 0){
				echo "<td class='top'>";
                echo $j;
                echo '</td>';
            }
			else if ($j == 0){
				echo "<td class='left'>";
                echo $i;
                echo '</td>';
            }
			else if ($i == $j ){
				echo "<td class='diag'>";
                echo $j * $i;
                echo '</td>';
            }
			else{
				echo '<td>';
                echo $j * $i;
                echo '</td>';
            }
		}
		echo '</tr>';
	}
	?>
	</table>
</body>
</html>