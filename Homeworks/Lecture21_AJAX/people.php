<?php

function getValue($array, $key, $default = null) {
	return isset($array[$key]) ? $array[$key] : $default;
}

$people = [
	[
		'name' => 'Brad Pitt',
		'image' => 'media/brad_pitt.jpg',
		'occupation' => 'PHP developer',
		'birthDate' => '1.1.1980',
		'gender' => 'male'
	],
	[
		'name' => 'Leonardo Di Caprio',
		'image' => 'media/leonardo_di_caprio.jpg',
		'occupation' => 'JavaScript developer',
		'birthDate' => '2.2.1981',
		'gender' => 'male'
	],
	[
		'name' => 'Jude Law',
		'image' => 'media/jude_law.jpg',
		'occupation' => 'Web designer',
		'birthDate' => '3.3.1982',
		'gender' => 'male'
	],
	[
		'name' => 'Russel Crowe',
		'image' => 'media/russel_crowe.jpg',
		'occupation' => 'Node.js developer',
		'birthDate' => '4.4.1983',
		'gender' => 'male'
	],
		[
		'name' => 'Matt Damon',
		'image' => 'media/matt_damon.jpg',
		'occupation' => 'Python developer',
		'birthDate' => '5.5.1984',
		'gender' => 'male'
	],
	[
		'name' => 'Scarlett Johansson',
		'image' => 'media/scarlett_johansson.jpg',
		'occupation' => 'C# developer',
		'birthDate' => '6.6.1985',
		'gender' => 'female'
	],
	[
		'name' => 'Angelina Jolie',
		'image' => 'media/angelina_jolie.jpg',
		'occupation' => 'Web designer',
		'birthDate' => '7.7.1986',
		'gender' => 'female'
	],
	[
		'name' => 'Salma Hayek',
		'image' => 'media/salma_hayek.jpg',
		'occupation' => 'Bartender',
		'birthDate' => '8.8.1987',
		'gender' => 'female'
	],
		[
		'name' => 'Natalie Portman',
		'image' => 'media/natalie_portman.jpg',
		'occupation' => 'JavaScript developer',
		'birthDate' => '9.9.1988',
		'gender' => 'female'
	],
	[
		'name' => 'Jessica Alba',
		'image' => 'media/jessica_alba.jpg',
		'occupation' => 'JavaScript developer',
		'birthDate' => '10.10.1989',
		'gender' => 'female'
	]
];

$selected = getValue($_POST, 'selected', 'all');

if ($selected === 'all') {
	$data = $people;
} else {
	$data = $people[$selected];
}

echo json_encode($data);


