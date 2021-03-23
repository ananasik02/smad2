<?php

$dataPoints = array(
    array("y"=> 6/21, "label"=> "0.28"),
    array("y"=> 13/21, "label"=> "0.34"),
    array("y"=> 14/21, "label"=> "0.4"),
    array("y"=> 17/21, "label"=> "0.46"),
    array("y"=> 17/21, "label"=> "0.52"),
    array("y"=> 18/21, "label"=> "0.58"),
    array("y"=> 18/21, "label"=> "0.64"),
    array("y"=> 18/21, "label"=> "0.7"),
    array("y"=> 19/21, "label"=> "0.76"),
    array("y"=> 19/21, "label"=> "0.82"),
    array("y"=> 20/21, "label"=> "0.88"),
    array("y"=> 20/21, "label"=> "0.94")
);
 
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "Емпірична функція розподілу"
	},
	axisY: {
		title: ""
	},
	data: [{
		type: "stepLine",
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
</body>
</html>