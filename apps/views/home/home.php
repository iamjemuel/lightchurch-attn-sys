<?php 
include('apps/controllers/home/home.controller.php');
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-6 col-md-6">
			<div class="card">

				<div class="card-body">
					<label>CHOOSE TIMESLOT:</label> 
					<br>
					<center>
						<input type="radio" class="slot" name="slot" value="1"> 7AM |
						<input type="radio" class="slot" name="slot" value="2"> 9AM |
						<input type="radio" class="slot" name="slot" value="3"> 11AM |
						<input type="radio" class="slot" name="slot" value="4"> 2PM <br>
						<input type="radio" class="slot" name="slot" value="5"> 4PM |
						<input type="radio" class="slot" name="slot" value="6"> 6PM |
						<input type="radio" class="slot" name="slot" value="7"> 8PM |&nbsp;
						<input type="radio" class="slot" name="slot" value="8"> 10PM 
					</center>
					<br><br>
					<label for="keyword">SEARCH SURNAME:</label>
						<input type="text" class="form-control" placeholder="Type your surname" name="keyword" id="keyword" autofocus="" list="names" required="">
						<datalist id="names">
							<?php 
								for($i = 0; $i <= count($list)-1; $i++){
							        echo '<option>'.$list[$i]['lastname'].'</option>';
							    } 
							?>
						</datalist>
				</div>
				<div class="card-footer">
					<a href="<?php echo $url; ?>admin/current-logs/" class="pull-right"><i class="fa fa-lock fa-2x"></i></a>
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-md-6">
			<div class="card">
				<div class="card-body">
					

					<label>RESULT(S):</label> <span id="count"></span></p>

					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Full Name</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody id="result">

						</tbody>
					</table>
				</div>
				<div class="card-footer"></div>
			</div>
		</div>
	</div>
</div>
<script src="<?php echo $url; ?>assets/js/home.js"></script>
<script>
	var url = '<?php echo $url; ?>';
	$('#keyword').on('input', function(){
		if($('#keyword').val() != ''){
			home.Search($('#keyword').val());
		}else{
			$('#result').html('');
			$('#count').html('');
		}
	});

	

</script>