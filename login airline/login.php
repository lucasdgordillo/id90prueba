<!doctype html>
<html lang="en">
  <head>
    <title>Login Airline</title>
	
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="css/custom.css">
  </head>

  <body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">		
					<div class="card">
						<div class="loginBox">
							<img src="images/airline-logo.png" class="img-responsive" alt="airlines-logo">
							
							<h2>Login</h2>

							<form action="validate-connection.php" method="post">                           	
								<div class="form-group">
									<select name="airline" id="airline" class="form-control input-lg" required>
										<option value="" disabled selected>Select your airline</option>
										<?php
											$airlines = json_decode(file_get_contents("https://beta.id90travel.com/airlines"), true );

											foreach ($airlines as $airline) {?>
												<option value="<?php echo $airline['name'] ?>"><?php echo strtoupper($airline['name']) ?></option>
												<?php
											}?>
									</select>
								</div>
								<div class="form-group">									
									<input type="text" class="form-control input-lg" name="username" placeholder="Username" required>        
								</div>							
								<div class="form-group">        
									<input type="password" class="form-control input-lg" name="password" placeholder="Password" required>       
								</div>								    
									<button type="submit" class="btn btn-success btn-block">Login</button>
							</form>													
						</div>	
					</div>
				</div>
			</div>
		</div>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>	