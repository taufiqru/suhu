<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"></link>
		<link rel="stylesheet" href="bootstrap/css/bootstrap-grid.min.css"></link>
		<link rel="stylesheet" href="bootstrap/css/bootstrap-reboot.min.css"></link>
		<style type="text/css">
			@font-face{
				font-family : A-Space;
				src : url("font/A-Space.woff") format("woff");
			}

			body{
				background-color: #222d32;
				color : white;
				font-family: A-Space;
			}

			.container{
				display:flex;
			}
			
			.row > div {
				border : 2px solid #76dbd1;
				word-wrap: break-word;
			}

			div > p{
				margin-top: 5px;
			}

			.value{
				font-size: 80px;
			}

			.status{
				color:green;
			}

		</style>
		<title>Thermal Monitoring</title>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-12" style="border:0px" >&nbsp;</div>
			</div>
			<div class="row">
				<div class="col-1" style="border:0px"></div>
				<div class="col-10" id="title">
					<p><h1>Thermal Monitoring</h1></p>
				</div>
				<div class="col-1" style="border:0px"></div>
			</div>
			<div class="row">
				<div class="col-1" style="border:0px"></div>
				<div class="col-2">
					<p><h4>All Sensor</h4></p>
				</div>
				<div class="col-8">
					<div class="row">
						<div class="col-12"><p><h2>Sensor 1</h2></p></div>
					</div>
					<div class="row">
						<div class="col-6" style="text-align : center;">
							<p>Temperature</p>
							<p class="value">25 &deg; c</p>
							<p>Status : <span class="status">Normal</span></p>
						</div>
						<div class="col-6 " style="text-align : center;">
							<p>Humidity</p>
							<p class="value">60 %</p>
							<p>Status : <span class="status">Normal</span></p>
						</div>
					</div>
					<div class="row">
						<div class="col-6">Temperature Graph</div>
					
						<div class="col-6">Humidity Graph</div>
					</div>
				</div>
				<div class="col-1" style="border:0px"></div>
			</div>
		</div>

	</body>
	<script type="text/javascript" href="bootstrap/js/bootstrap.min.js"></script>	
</html>