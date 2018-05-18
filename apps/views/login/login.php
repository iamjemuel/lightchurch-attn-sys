<div class="container">
	<br>
	<div class="row">
		<div class="col-lg-4 col-md-4"></div>
		<div class="col-lg-4 col-md-4">
			<div class="card card-primary">
				<div class="card-title"></div>
				<div class="card-body">
					<center><img src="<?php echo $url; ?>assets/img/light-web-logo.jpg" class="img-fluid" style="margin-top: -30px;" alt="LightChurch Logo"></center>
					<br>
					<form action="<?php echo $url; ?>" id="login_form">
						<label for="username">Username:</label>
						<input type="text" class="form-control" name="username" autofocus="" required=""><br>
						<label for="password">Password:</label>
						<input type="password" class="form-control" name="password" required=""><br>
						<button class="btn btn-outline-success btn-block" type="submit">Login</button>
					</form>

					
				</div>
			</div>
		</div>
		<div class="col-lg-4 col-md-4"></div>
	</div>
</div>

<script>
	var url = '<?php echo $url; ?>';
</script>