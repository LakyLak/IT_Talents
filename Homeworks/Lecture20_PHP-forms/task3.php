<?php

function getValue ($array, $key, $default=null) {
	return !empty($array[$key]) ? $array[$key] : $default;
}

$value = getValue($_POST, 'value', '0');
$conversion = getValue($_POST, 'conversion', 'c-f');

function calculateCelsius ($value) {
	$result = ($value - 32) / 1.8;
	return sprintf('%0.2F', $result);
}

function calculateFahrenheit ($value) {
	$result = ($value * 1.8) + 32; 
	return sprintf('%0.2F', $result);
}

function validateRequired($value) {
	return !empty($value);
}

if ($_POST) {
	
}

function formResult ($value, $conversion) {
	if ($conversion == 'c-f') {
		$html = "<p>$value degrees of Celsius is ";
		$html .= calculateFahrenheit($value);
		$html .= ' degrees of Fahrenheit</p>';
		return $html;
	} 
	if ($conversion == 'f-c') {
		$html = "<p>$value degrees of Fahrenheit is ";
		$html .= calculateCelsius($value);
		$html .= ' degrees of Celsius</p>';
		return $html;
	}
	
}

var_dump($_POST);


?>

<!DOCTYPE html>
<html>
<head>
	<title>Task 3</title>
	<style type="text/css">
		
	</style>
</head>
<body>
	<form action="" method="post">
		<input name="value" id="convert_input" type="number">
		<button type="submit"">Convert</button>
		<p id="result_convert">
			<?= formResult($value, $conversion) ?>
		</p>
		<div class="radios">
			<input type="radio" name="conversion" value="c-f" id="c-f" checked="checked"/>
			<label for="c-f">Celsius to Fahrenheit</label>
		</div>
		<div class="radios">
			<input type="radio" name="conversion" value="f-c" id="f-c"/>
			<label for="f-c">Fahrenheit to Celsius</label>
		</div>
					
	</form>
</body>
</html>
