<?php
function getValue ($array, $key, $default=null) {
	return isset($array[$key]) ? $array[$key] : $default;
}

$username = getValue($_POST, 'username');
$password1 = getValue($_POST, 'password1');
$password2 = getValue($_POST, 'password2');
$password = '';

var_dump($_POST);

function validateRequired ($value) {
	return !empty($value);
}

function validateString ($value) {
	return is_string($value);
}

function validateAlphabethUsed ($value) {
	$validAlphabeth;
	if (strlen($value) === mb_strlen($value, 'UTF-8')) {
		$validAlphabeth = true;
	} else {
		$validAlphabeth = false;
	}
	return $validAlphabeth;
}

function validateLength ($value, $length) {
	$validLength;
	if (strlen($value) >= $length) {
		$validLength = true;
	} else {
		$validLength = false;
	}
	return $validLength;
}

function validatePasswordCapitals ($value) {
	return (bool)preg_match('/[A-Z]+/', $value);
}
function validatePasswordSmall ($value) {
	return (bool)preg_match('/[a-z]+/', $value);
}
function validatePasswordDigits ($value) {
	return (bool)preg_match('/[0-9]+/', $value);
}
function validatePasswordSpecial ($value) {
	return (bool)preg_match('/\W+/', $value);
}

function validatePassword ($value) {
	$count = 0;
	if (validatePasswordCapitals($value)) {
		$count++;
	}
	if (validatePasswordSmall($value)) {
		$count++;
	}
	if (validatePasswordDigits($value)) {
		$count++;
	}
	if (validatePasswordSpecial($value)) {
		$count++;
	}
	if ($count >= 3) {
		return true;
	} else {
		return false;
	}
}

function validateMatchingPasswords ($value1, $value2) {
	if ($value1 === $value2) {
		return true;
	} else {
		return false;
	}
}

function displayErrors($errors) {
	$html = '';
	foreach ($errors as $error) {
		$html .= "<p>$error</p>";
	}
	return $html;
}

function getErrorClass ($errors) {
	$errorClass = '';
	if (count($errors) > 0) { 
		$errorClass = "class='error'"; 
	}
	return $errorClass;
}

$errors = [];
function validateForm ($username, $password1, $password2) {
	global $errors;
	global $password;
	if (validateRequired($username)) {
		if (!validateString($username)) {
			$errors['username'][] = 'Username needs to be String!';
		}
		if (!validateAlphabethUsed($username)) {
			$errors['username'][] = 'Username needs to be in latin characters!';
		}
		if (!validateLength($username, 5)) {
			$errors['username'][] = 'Username needs to be at least 5 characters long!';
		}
	} else {
		$errors['username'][] = 'Username needs to be filled!';
	}
	if (validateRequired($password1)) {
		if (!validateLength($password1, 5)) {
			$errors['password1'][] = 'Password needs to be at least 5 characters long!';
		}
		if (!validatePassword($password1)) {
			$errors['password1'][] = "Password need to consist of one of the three of Capital, \nSmall letters, Digits and Special characters";
		}
	} else {
		$errors['password1'][] = 'Password needs to be filled!';
	}
	if (validateRequired($password2)) {
		if (!validateLength($password2, 5)) {
			$errors['password2'][] = 'Password needs to be at least 5 characters long!';
		}
		if (!validatePassword($password2)) {
			$errors['password2'][] = "Password need to consist of one of the three of Capital, \nSmall letters, Digits and Special characters";
		}
		if (validateRequired($password1)) {
			if (!validateMatchingPasswords($password1, $password2)) {
				$errors['password2'][] = "Password do not match!";
			} else {
				$password = md5($password1);
			}
		}
	} else {
		$errors['password2'][] = 'Password needs to be filled!';
	}
}

if ($_POST) {
	validateForm ($username, $password1, $password2);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Task2</title>
	<style type="text/css">
		label {
			display: block;
		}
		.error input {
			border-color: #ff0000;
		}
		.error p {
			color: #ff0000;
		}
	</style>	
</head>
<body>
	<form action="" method="post">
		<div <?= getErrorClass(getValue($errors, 'username', [])); ?>>
		<label for="username">User name:</label>
		<input type="text" id="username" name="username"/>
			<?= displayErrors(getValue($errors, 'username', [])); ?>
		</div>
		<div <?= getErrorClass(getValue($errors, 'password1', [])); ?>>
		<label for="password1">Password:</label>
		<input type="password" id="password1" name="password1"/>
			<?= displayErrors(getValue($errors, 'password1', [])); ?>
		</div>
		<div <?= getErrorClass(getValue($errors, 'password2', [])); ?>>
		<label for="password2">Retype Password:</label>
		<input type="password" id="password2" name="password2"/>
			<?= displayErrors(getValue($errors, 'password2', [])); ?>
		</div>
		<div>
		<input type="submit" />
		</div>
	</form>
	<div id="result">
		<?= "<p>Username: $username</p>" ?>
		<?= "<p>Encrypted password: $password</p>" ?>
	</div>
</body>
</html>	