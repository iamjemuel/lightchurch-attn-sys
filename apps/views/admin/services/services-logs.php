<?php 
include('apps/controllers/admin/services.controller.php');
?>

<div class="container-fluid">
	<div class="card">
		<div class="content">
			<form action="<?php echo $url;?>admin/search-logs/" method="GET" id="search">	
				<div class="row">
					<div class="col-lg-4 col-md-4">
						<small><b>FROM:</b></small><br>
							<?php 
								if(isset($_GET['from']) && isset($_GET['to'])){
									echo '<input type="date" class="form-control" name="from" id="from" value="'.$_GET['from'].'" required><br>';
								}else{
									echo '<input type="date" class="form-control" name="from" id="from" required><br>';
								}
							?>
						<small><b>TO:</b></small><br>
							<?php 
								if(isset($_GET['from']) && isset($_GET['to'])){
									echo '<input type="date" class="form-control" name="to" id="to" value="'.$_GET['to'].'" required>';
								}else{
											echo '<input type="date" class="form-control" name="to" id="to" required>';
								}
							?>
					</div>
					<div class="col-lg-4 col-md-4">
						<small><b>TIMESLOT:</b></small><br>
						<center>
							<?php 
								for($i = 0; $i <= count($slots)-1; $i++){
									if(isset($_GET['timeslot'])){
										if($_GET['timeslot'] == $i){
											if($i == 4){
												echo '<input type="radio" class="slot" name="timeslot" value="'.$i.'" checked> '.$slots[$i].' | <br>';
											}else{
												echo '<input type="radio" class="slot" name="timeslot" value="'.$i.'" checked> '.$slots[$i].' | ';
											}
										}else{
											if($i == 4){
												echo '<input type="radio" class="slot" name="timeslot" value="'.$i.'" > '.$slots[$i].' | <br>';
											}else{
												echo '<input type="radio" class="slot" name="timeslot" value="'.$i.'" > '.$slots[$i].' | ';
											}
										}	
									}else{
										if($i == 0){
											if($i == 4){
												echo '<input type="radio" class="slot" name="timeslot" value="'.$i.'" checked> '.$slots[$i].' | <br>';
											}else{
												echo '<input type="radio" class="slot" name="timeslot" value="'.$i.'" checked> '.$slots[$i].' | ';
											}
										}else{
											if($i == 4){
												echo '<input type="radio" class="slot" name="timeslot" value="'.$i.'" > '.$slots[$i].' | <br>';
											}else{
												echo '<input type="radio" class="slot" name="timeslot" value="'.$i.'" > '.$slots[$i].' | ';
											}
										}
										
									}
									
									
								}
							?>
						</center>
						
					</div>

					<div class="col-lg-4 col-md-4">
						<small><b>NETWORK LEADER:</b></small><br>
						
						<select name="network" id="network" class="form-control">
							<?php if(isset($_GET['network'])): ?>
								<option value="all" <?php if ($_GET['network'] == 'all') $selected; ?>>All</option>
								<option value="0" <?php if ($_GET['network'] == '0') echo $selected; ?>>No lifegroup leader</option>
								<option value="1" <?php if ($_GET['network'] == '1') echo $selected; ?>>Ronald Acuna</option>
								<option value="2" <?php if ($_GET['network'] == '2') echo $selected; ?>>Alvin Madronio</option>
								<option value="3" <?php if ($_GET['network'] == '3') echo $selected; ?>>Albert Madronio</option>
								<option value="4" <?php if ($_GET['network'] == '4') echo $selected; ?>>Glenn Corpuz</option>
								<option value="5" <?php if ($_GET['network'] == '5') echo $selected; ?>>Mark Christian De Omania</option>
								<option value="6" <?php if ($_GET['network'] == '6') echo $selected; ?>>Arjuna Aguilar</option>
								<option value="7" <?php if ($_GET['network'] == '7') echo $selected; ?>>Mel Aguilar</option>
								<option value="8" <?php if ($_GET['network'] == '8') echo $selected; ?>>Carla Baldomero</option>
								<option value="9" <?php if ($_GET['network'] == '9') echo $selected; ?>>Mechole Williams</option>
								<option value="10" <?php if ($_GET['network'] == '10') echo $selected; ?>>Dorothy Magbuhos</option>
								<option value="11" <?php if ($_GET['network'] == '11') echo $selected; ?>>Jenny Madronio</option>
								<option value="12" <?php if ($_GET['network'] == '12') echo $selected; ?>>Stephanie Cadiong</option>
								<option value="13" <?php if ($_GET['network'] == '13') echo $selected; ?>>Robert/Mike</option>
								<option value="14" <?php if ($_GET['network'] == '14') echo $selected; ?>>Clariza Fortuna</option>
								<option value="15" <?php if ($_GET['network'] == '15') echo $selected; ?>>Elena Encio</option>
								<option value="16" <?php if ($_GET['network'] == '16') echo $selected; ?>>Restie Cadiong</option>
						<?php else: ?>
								<option value="all" selected="">All</option>
								<option value="0">No lifegroup leader</option>
								<option value="1">Ronald Acuna</option>
								<option value="2">Alvin Madronio</option>
								<option value="3">Albert Madronio</option>
								<option value="4">Glenn Corpuz</option>
								<option value="5">Mark Christian De Omania</option>
								<option value="6">Arjuna Aguilar</option>
								<option value="7">Mel Aguilar</option>
								<option value="8">Carla Baldomero</option>
								<option value="9">Mechole Williams</option>
								<option value="10">Dorothy Magbuhos</option>
								<option value="11">Jenny Madronio</option>
								<option value="12">Stephanie Cadiong</option>
								<option value="13">Robert/Mike</option>
								<option value="14">Clariza Fortuna</option>
								<option value="15">Elena Encio</option>
								<option value="16">Restie Cadiong</option>
						<?php endif ?>
						</select>
						<br><br>
						<button type="submit" class="btn btn-info btn-fill btn-block" name="s">Search</button>
					</div>
					
				</div>
			</form>
		</div>
	</div>

	<div class="card">
		<div class="content">
			<div class="row">
				<div class="col-lg-4">
					<p>SEARCH RESULT(S):</p>
				</div>
				<div class="col-lg-4">
					<center>
						<table class="table center-block">
							<tr>
								<td>MEMBER(S)</td>
								<td>VISITOR(S)</td>
								<td>TOTAL</td>
							</tr>
							<tr>
								<td><center><span><b id="member"><?php echo $members; ?></b></span></center></td>
								<td><center><span><b id="visitor"><?php echo $visitors; ?></b></span></center></td>
								<td><center><span><b id="total"><?php echo $total; ?></b></span></center></td>
							</tr>
						</table>
					</center>
				</div>
				<div class="col-lg-4">
					<div class="dropdown pull-right">
						<button class="btn btn-info btn-fill dropdown-toggle " type="button" data-toggle="dropdown"><i class="fa fa-print"></i> Print
						<span class="caret"></span></button>
							<ul class="dropdown-menu">
						    	<li><a href="#" onclick="helper.Print(0, 'services')">Count only</a></li>
						    	<li><a href="#" onclick="helper.Print(1, 'services')">Count and Names</a></li>
						  	</ul>
					</div>
				</div>
			</div>
			<table class="table table-striped table-bordered" cellspacing="0" width="100%" id="services">
				<thead>
					<tr>
						<th>FULLNAME</th>
						<th>NETWORK LEADER</th>
						<th>TYPE</th>
						<th>TIMESLOT</th>
						<th>DATE ATTENDED</th>
					</tr>
				</thead>
				
				<tbody id="result">
					<?php echo $content; ?>
				</tbody>
			</table>

			<table class="table" style="display: none;">
				<thead>
					<tr>
						<th>FULLNAME</th>
						<th>NETWORK LEADER</th>
						<th>TYPE</th>
						<th>TIMESLOT</th>
						<th>DATE ATTENDED</th>
					</tr>
				</thead>
				
				<tbody id="results">
					<?php echo $content; ?>
				</tbody>
			</table>

		</div>
	</div>
</div>

<script>
	$('#search').submit(function(e){
		if(helper.convertMilli($('#to').val()) > helper.convertMilli($('#from').val())){
	        
	    }else{
	        helper.showNotification('bottom', 'left', 2, 0, 'Wrong range of dates.');
	        e.preventDefault();
	    }
	});

	$('#services').DataTable();
</script>