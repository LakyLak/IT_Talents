<?php
function getValue ($array, $key, $default=null) {
	return isset($array[$key]) ? $array[$key] : $default;
}
$number1 = getValue($_POST, 'number1');
$number2 = getValue($_POST, 'number2');
$math = getValue($_POST, 'math');
$result = '';

switch ($math) {
	case 'plus':
		$result = (int)$number1 + (int)$number2;
		break;
	case 'minus':
		$result = (int)$number1 - (int)$number2;
		break;
	case 'multi':
		$result = (int)$number1 * (int)$number2;
		break;
	case 'divide':
		$result = (int)$number1 / (int)$number2;
		break;
}
?>

<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		div {
			display: block;
			padding: 5px;
		}
	</style>	
</head>
<body>
	<form action="" method="post">
		<div><input type="number" id="number1" name="number1"/></div>
		<div><input type="number" id="number2" name="number2"/></div>
		<div><select name="math" id="math">
			<option value="plus" name="plus">+</option>
			<option value="minus" name="minus">-</option>
			<option value="multi" name="multi">*</option>
			<option value="divide" name="divide">/</option>
		</select></div>
		<div><input type="submit" /></div>
		<div id="result">
			<?= $result ?>
		</div>
	</form>
</body>
</html>	