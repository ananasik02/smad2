<?php
$dataPoints = array(
    array("y"=> 6/0.6, "label"=> "0.28"),
    array("y"=> 7/0.6, "label"=> "0.34"),
    array("y"=> 1/0.6, "label"=> "0.4"),
    array("y"=> 3/0.6, "label"=> "0.46"),
    array("y"=> 0, "label"=> "0.52"),
    array("y"=> 1/0.6, "label"=> "0.58"),
    array("y"=> 0, "label"=> "0.64"),
    array("y"=> 0, "label"=> "0.7"),
    array("y"=> 1/0.6, "label"=> "0.76"),
    array("y"=> 0, "label"=> "0.82"),
    array("y"=> 1/0.6, "label"=> "0.88"),
    array("y"=> 1/0.6, "label"=> "0.94")
);
 
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
    title: {
        text: "Гістограма"
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