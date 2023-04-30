<?php
 include('header.php');
 include('conn.php');
$test = array();
$result=array();
$count = 0;
// $total = 0;
$res = mysqli_query($conn,"SELECT * FROM purchase ORDER BY date_purchase");

while($row=mysqli_fetch_array($res)){
    $test[$count]["label"] = date('Y',strtotime($row["date_purchase"]));
    $test[$count]["y"] = $row["total"];
    $count++;
}
// echo ($test[0]['label']);
//  echo count($test);
foreach ($test as $value)
{
    if(isset($result[$value["label"]]))
    {
        $result[$value["label"]]["y"]+=$value["y"];
    }
    else
    {
        $result[$value["label"]]=$value;
    }
}
// print_r(array_values($result));

?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Grwonth Trend"
	},
	axisY: {
		title: "Grwonth Trend (in baht)"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## Baht",
		dataPoints: <?php echo json_encode(array_values($result), JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<?php include('navbar.php'); ?>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html> 