<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>List Hotels</title>
	
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>
    <div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<form role="form" class="form-inline" method="get">
					<div class="form-group">
						<label> Destination: </label>
						<input type="text" class="form-control" id="destination" name="destination" required>
					</div>
					<div class="form-group">
						<label> Guests: </label>
						<input type="text" class="form-control" id="guests" name="guests" required>
					</div>
					<div class="form-group">
						<label> Check In: </label>
						<input type="datetime" class="form-control" id="checkin" name="checkin" required>
					</div>
					<div class="form-group">
						<label> Check Out: </label>
						<input type="datetime" class="form-control" id="checkout" name="checkout" required>
					</div> 
					<button type="submit" class="btn btn-primary">
						Search
					</button>
				</form>
				
				<table class="table">
					<thead>
						<tr>
							<th> # </th>
							<th> Hotel Name </th>
							<th> Location </th>
							<th> Check In </th>
							<th> Check Out </th>
							<th> Total </th>
						</tr>
					</thead>
					<tbody>
						<?php
							if ($_GET) {
								$destination = $_GET['destination'];
								$guests = $_GET['guests'];
								$checkin = $_GET['checkin'];
								$checkout = $_GET['checkout'];

								$url = "https://beta.id90travel.com/api/v1/hotels.json?destination=".$destination."&guests[]=".$guests."&checkin=".$checkin."&checkout=".$checkout;
								
								// Valido la URL
								if (! filter_var($url, FILTER_VALIDATE_URL)) {	
									echo("$url is not a valid URL");
									exit;
								}
								
								$hoteles = json_decode(file_get_contents($url), true);

								foreach ($hoteles['hotels'] as $i => $hotel) {?> 
									<tr>
										<td><?php echo $i; ?></td>
										<td>
											<?php
												if (isset($hotel['name']) && ! is_null($hotel['name'])) {
													echo $hotel['name'];	
												}else {
													echo "";
												}
											?>
										</td>

										<td>
											<?php
												if (isset($hotel['location']['country']) && ! is_null($hotel['location']['country'])) {
													echo $hotel['location']['country'];	
												}else {
													echo "";
												}
											?>
										</td>
										
										<td>
											<?php
												if (isset($hotel['checkin']) && ! is_null($hotel['checkin'])) {
													echo $hotel['checkin'];	
												}else {
													echo "";
												}
											?>
										</td>

										<td>
											<?php
												if (isset($hotel['checkout']) && ! is_null($hotel['checkout'])) {
													echo $hotel['checkout'];	
												}else {
													echo "";
												}
											?>
										</td>

										<td> $
											<?php
												if (isset($hotel['total']) && ! is_null($hotel['total'])) {
													echo $hotel['total'];	
												}else {
													echo "";
												}
											?>
										</td>
									</tr>
									<?php
								}
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
  </body>
</html>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/scripts.js"></script>