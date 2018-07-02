<?php

require_once(__DIR__.'/data.php');

/**
 * Расчет голов команд друг другу
 * @param int $c1 - Id команды
 * @param int $c1 - Id команды-соперника
 * @return array (int) Количество голов командами друг другу
 */
function match($c1, $c2) {
	$power_c1 = calculatePowerC($c1);
	$power_c2 = calculatePowerC($c2);

	// Рассчитаем коэффицент победы К1 над К2
	$power_c1_to_c2 =
		($power_c1['success'] - $power_c2['success'])
		-
		($power_c1['fail'] - $power_c2['fail'])
	;
	// Коэффицент приводим к единице, если он слишком низкий (позволяет несколько уравновесить силу команды)
	if ($power_c1_to_c2 < 1) {
		$power_c1_to_c2 = 1;
	}
	$power_c2_to_c1 =
		($power_c2['success'] - $power_c1['success'])
		-
		($power_c2['fail'] - $power_c1['fail'])
	;
	if ($power_c2_to_c1 < 1) {
		$power_c2_to_c1 = 1;
	}

	// Рассчитаем кол-во голов К1 -> К2
	$goal1_to_2 = $power_c1['avg_scored'] * $power_c1_to_c2 * $power_c1['fail'] / $power_c2['success'];
	// Если самый слабый вариант К1 сильнее К2, то округялем  большую сторону кол-во голов
	if ($power_c1['success'] - $power_c1['fail'] > $power_c2['success']) {
		$goal1_to_2 = ceil($goal1_to_2);
	} else {
		$goal1_to_2 = floor($goal1_to_2);
	}

	// Рассчитаем кол-во голов К2 -> К1
	$goal2_to_1 = $power_c2['avg_scored'] * $power_c2_to_c1 * $power_c2['fail'] / $power_c1['success'];
	// В зависимости от мощи команды округляем кол-во голов в большую или меньшую сторону
	if ($power_c2['success'] - $power_c2['fail'] > $power_c1['success']) {
		$goal2_to_1 = ceil($goal2_to_1);
	} else {
		$goal2_to_1 = floor($goal2_to_1);
	}

	return [$goal1_to_2, $goal2_to_1];
}

function calculatePowerC($c) {
	global $data;

	$comand = $data[$c];

	$power = [
		'name' => trim($comand['name']),
		'avg_scored' => round($comand['goals']['scored'] / $comand['games']),
		'avg_skiped' => round($comand['goals']['skiped'] / $comand['games']),
		'success' => round($comand['win'] / ($comand['draw'] + $comand['defeat']), 1),
		'fail' => round($comand['defeat'] / ($comand['draw'] + $comand['win']), 1),
	];

	return $power;
}
