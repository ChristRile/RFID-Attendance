<?php
session_start();
if (!isset($_SESSION['Admin-name'])) {
  header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Manage Devices</title>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="devices.css"/>
	<script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.js"integrity="sha1256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/bootbox.min.js"></script>
	<script src="js/dev_config.js"></script>
	<script>
		$(document).ready(function(){
		    $.ajax({
		      	url: "dev_up.php",
		      	type: 'POST',
		      	data: {
		        'dev_up': 1,
		  		}
	      	}).done(function(data) {
	  			$('#devices').html(data);
    		});
		});
	</script>
</head>
<body>
<?php include'header.php';?>
<main>
	<h1 class="slideInDown animated">Devices</h1>
	<section class="container py-lg-5">
		<div class="alert_dev"></div>
		<!-- devices -->
		<div class="row">
			<div class="col-lg-12 mt-4">
				<div class="panel ">
			      	<div class="panel-heading d-flex justify-content-between" style="font-size: 19px;">
						<p class="m-0 d-flex align-items-center">Your Devices:</p>
						<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
							New Device
						</button>			      
					</div>
			      	<div class="panel-body">
			      		<div id="devices"></div>
			      	</div>
			    </div>
			</div>
		</div>
		<!-- devices -->
		<!-- New Devices -->
		<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
       <div class="modal-header">
			<h3 class="modal-title" id="exampleModalLongTitle">Add new device:</h3>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
	   <form action="" method="POST" enctype="multipart/form-data">
			<div class="modal-body">
			    <label for="User-mail"><b>Device Name:</b></label>
			    <input type="text" name="dev_name" id="dev_name" placeholder="Device Name..." required/><br>
			    <label for="User-mail"><b>Device Department:</b></label>
			    <input type="text" name="dev_dep" id="dev_dep" placeholder="Device Department..." required/><br>
			</div>
       </div>
       <div class="modal-footer">
			<button type="button" name="dev_add" id="dev_add" class="btn btn-success">Create new Device</button>
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		</div>
		</form>
      </div>
    </div>
  </div>
</div>
	</section>
</main>
</body>
</html>