<?php 


$numbers = [0.36, 0.38, 0.38, 0.37, 0.40, 0.38, 0.36,
	0.29, 0.35, 0.34, 0.42, 0.47, 0.60, 0.91,
	0.29, 0.32, 0.34, 0.34, 0.49, 0.52, 0.81];

// $min = min($numbers);
// $max = max($numbers);
// $N = count($numbers);
// $r = 1 + 3.322 * log($N, 10);
// $r = floor($r);
// $l = ($max-$min)/$r;
// var_dump($l);
// $line = array();


// $element = array();
// $element["ai"] = $min;
// $ai = $min + $l * $i;
// $element["bi"] =  $ai + $l;
// $bi = $ai + $l;
// $element["zi"] = ($ai + $bi)/2;
// $ni = 0;
// for($i=0; $i<$N; $i++){
// 	if( $ai <= $numbers[$i] &&  $numbers[$i] < $bi){
// 		$ni++;
// 	}
// }
// $element["ni"] = $ni;

// array_push($line, $element);

// for($i=2; $i<=$r; $i++){
// 	$element = array();
// 	$element["ai"] = $min + $l * $i;
// 	$ai = $min + $l * $i;
// 	$element["bi"] =  $ai + $l;
// 	$bi = $ai + $l;
// 	$element["zi"] = ($ai + $bi)/2;
// 	$ni = 0;
// 	for($i=0; $i<$N; $i++){
// 		if( $ai <= $numbers[$i] &&  $numbers[$i] < $bi){
// 			$ni++;
// 		}
// 	}
// 	$element["ni"] = $ni;

// 	array_push($line, $element);
// }

$line = array(
	[

		'a' => 0.28,
		'b' => 0.34,
		'z' => 0.31,
		'n' => 6

	],
	[

		'a' => 0.34,
		'b' => 0.4,
		'z' => 0.37,
		'n' => 7

	],
	[

		'a' => 0.4,
		'b' => 0.46,
		'z' => 0.43,
		'n' => 1

	],
	[

		'a' => 0.46,
		'b' => 0.52,
		'z' => 0.49,
		'n' => 3

	],
	[

		'a' => 0.52,
		'b' => 0.58,
		'z' => 0.55,
		'n' => 0

	],
	[

		'a' => 0.58,
		'b' => 0.64,
		'z' => 0.61,
		'n' => 1

	],
	[

		'a' => 0.64,
		'b' => 0.7,
		'z' => 0.67,
		'n' => 0

	],
	[

		'a' => 0.7,
		'b' => 0.76,
		'z' => 0.73,
		'n' => 0

	],
	[

		'a' => 0.76,
		'b' => 0.82,
		'z' => 0.79,
		'n' => 1

	],
	[

		'a' => 0.82,
		'b' => 0.88,
		'z' => 0.85,
		'n' => 0

	],
	[

		'a' => 0.88,
		'b' => 0.94,
		'z' => 0.91,
		'n' => 1

	]


);


$N = count($numbers);

//Find ser stat
$serStat = 0;
foreach($line as $lineElement){
	$serStat += $lineElement['z'] * $lineElement['n'];
}
$serStat = $serStat / $N;

echo '<p>Середнє статистичне дорівнює  ' . $serStat . '</p>';


//Find moda
$modalInterval = $line[0];
for ($i=0; $i < count($line) ; $i++) { 
	if ($line[$i]['n'] > $modalInterval['n'] ){
		$modalInterval = $line[$i];
		$prevModalInterval = $line[$i-1];
		$nextModalInterval = $line[$i+1];
	}
}

$moda = 0;

$moda = $modalInterval['a'] + (($modalInterval['n'] - $prevModalInterval['n'])/(2*$modalInterval['n']-$prevModalInterval['n']-$nextModalInterval['n']))*0.6;

echo '<p>Moда дорівнює  ' . $moda . '</p>';



//Find mediana
$medianInterval = $line[4];

$Nm = 0;
for ($i=0; $i < 4; $i++) { 
	$Nm += $line[$i]['n'];
}

//$mediana = $medianInterval['a'] + (0.6/$medianInterval['n'])*($N/2 - $Nm);

echo '<p>Mедіана дорівнює  ' . $moda . '</p>';


//Find rozmah
$rozmah = max($numbers) - min($numbers);
echo '<p>Розмах дорівнює  ' . $rozmah . '</p>';


//Find disperson
$disperson = 0;
for($i=0; $i < count($line); $i++){
	$disperson += $line[0]['n']*$line[0]['z']*$line[0]['z'];
}
$disperson = $disperson / $N;
$disperson = $disperson - $serStat*$serStat;
echo '<p>Дисперсія дорівнює  ' . $disperson . '</p>';


//Find ser kvad vidh
$serKvad = sqrt($disperson);
echo '<p>Середнє квадратичне відхилення дорівнює  ' . $serKvad . '</p>';


//Find vipr disp
$viprDisp = ($N/$N-1)*$disperson;
echo '<p>Виправлена дисперсія дорівнює  ' . $viprDisp . '</p>';


//Find vipr ser kvad
$viprSerKvad = sqrt($viprDisp);
echo '<p>Виправлене середнє квадратичне відхилення  дорівнює ' . $viprSerKvad . '</p>';


//variation
$variation = $serKvad/$serStat;
echo '<p>Варіація  дорівнює ' . $variation . '</p>';


//pochatkovi moments
echo '<p>Початковий момент 0-вого порядку  дорівнює 1 </p>';
echo '<p>Початковий момент 1-го порядку  дорівнює середньому статистичному'  .  $serStat . ' </p>';
$serStat2 = 0;
foreach($line as $lineElement){
	$serStat2 += $lineElement['z'] * $lineElement['z'] * $lineElement['n'];
}
$serStat2 = $serStat2 / $N;
echo '<p>Початковий момент 2-го порядку  дорівнює '  .  $serStat2 . ' </p>';
$serStat3 = 0;
foreach($line as $lineElement){
	$serStat3 += $lineElement['z'] * $lineElement['z'] * $lineElement['z'] * $lineElement['n'];
}
$serStat3 = $serStat3 / $N;
echo '<p>Початковий момент 3-го порядку  дорівнює '  .  $serStat3 . ' </p>';
foreach($line as $lineElement){
	$serStat4 += $lineElement['z'] * $lineElement['z'] * $lineElement['z'] * $lineElement['z'] * $lineElement['n'];
}
$serStat4 = $serStat4 / $N;
echo '<p>Початковий момент 4-го порядку  дорівнює '  .  $serStat4 . ' </p>';



//find central moments
$centralMoment0 = 0;
foreach($line as $lineElement){
	$centralMoment0 += $lineElement['n'];
}
$centralMoment0 = $centralMoment0 / $N;
echo '<p>Центральний момент 0-го порядку  дорівнює '  .  $centralMoment0 . ' </p>';

$centralMoment1 = 0;
foreach($line as $lineElement){
	$centralMoment1 += $lineElement['n'] * ($lineElement['z'] - $serStat);
}
$centralMoment1 = $centralMoment1 / $N;
echo '<p>Центральний момент 1-го порядку  дорівнює '  .  $centralMoment1 . ' </p>';

$centralMoment2 = 0;
foreach($line as $lineElement){
	$centralMoment2 += $lineElement['n'] * pow($lineElement['z'] - $serStat, 2);
}
$centralMoment2 = $centralMoment2 / $N;
echo '<p>Центральний момент 2-го порядку  дорівнює  '  .  $centralMoment2 . ' </p>';

$centralMoment3 = 0;
foreach($line as $lineElement){
	$centralMoment3 += $lineElement['n'] * pow($lineElement['z'] - $serStat, 3);
}
$centralMoment3 = $centralMoment3 / $N;
echo '<p>Центральний момент 3-го порядку  дорівнює  '  .  $centralMoment3 . ' </p>';

$centralMoment4 = 0;
foreach($line as $lineElement){
	$centralMoment4 += $lineElement['n'] * pow($lineElement['z'] - $serStat, 4);
}
$centralMoment4 = $centralMoment4 / $N;
echo '<p>Центральний момент 4-го порядку  дорівнює  '  .  $centralMoment4 . ' </p>';


//asymetria 
$asymetria = $centralMoment3/pow($serStat, 3);
echo '<p>Асиметрія  дорівнює  '  .  $asymetria . ' </p>';


//ekses
$ekses = ($centralMoment4/pow($serStat,4) - 3);
echo '<p>Ексцес  дорівнює  '  .  $ekses . ' </p>';


//komylat


 $dataPoints = array(
    array("x" => 0.31, "y" => 6),
    array("x" => 0.37, "y" => 13),
    array("x" => 0.43, "y" => 14),
    array("x" => 0.55, "y" => 14),
    array("x" => 0.61, "y" => 15),
    array("x" => 0.67, "y" => 15),
    array("x" => 0.73, "y" => 15),
    array("x" => 0.79, "y" => 16),
    array("x" => 0.85, "y" => 16),
    array("x" => 0.91, "y" => 17)
 );


 ?>
<!DOCTYPE HTML>
<html>
<head>
    <script>
        window.onload = function () {

            var chart = new CanvasJS.Chart("chartContainer", {
                title: {
                    text: "Комулятивна крива за нагромадженими частотами"
                },
                data: [{
                    type: "line",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();

        }
    </script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


