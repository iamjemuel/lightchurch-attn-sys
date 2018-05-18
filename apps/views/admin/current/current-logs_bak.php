<?php 
include('apps/controllers/admin/current.controller.php');
?>

<div class="container-fluid">

    <div class="row">
        <div class="col-lg-8 col-md-8">
            <div class="card">
                <div class="content">
                    <p><b>SEARCH</b></p>
                    <form action="<?php echo $url; ?>admin/current-logs/" method="GET" name="search">
                    <div class="row">
                        <div class="col-lg-6">

                            <center><small><b>CHOOSE TIMESLOT:</b></small><br>
                            <?php 
                                for($i = 0; $i <= count($slots)-1; $i++){
                                    if(isset($_GET['timeslot'])){
                                        if($i == $_GET['timeslot']){
                                            if($i == 4){
                                                echo '<input type="radio" class="timeslot" name="timeslot" value="'.$i.'" checked> '.$slots[$i].'<br>';
                                            }else{
                                                echo '<input type="radio" class="timeslot" name="timeslot" value="'.$i.'" checked> '.$slots[$i].' | ';
                                            }
                                        }else{
                                            if($i == 4){
                                                echo '<input type="radio" class="timeslot" name="timeslot" value="'.$i.'"> '.$slots[$i].'<br>';
                                            }else{
                                                echo '<input type="radio" class="timeslot" name="timeslot" value="'.$i.'"> '.$slots[$i].' | ';
                                            }
                                            
                                        }
                                        
                                    }else{
                                        if($i == 0){
                                            if($i == 4){
                                                echo '<input type="radio" class="timeslot" name="timeslot" value="'.$i.'" checked> '.$slots[$i].'<br>';
                                            }else{
                                                echo '<input type="radio" class="timeslot" name="timeslot" value="'.$i.'" checked> '.$slots[$i].' | ';
                                            }
                                            
                                        }else{
                                            if($i == 4){
                                                echo '<input type="radio" class="timeslot" name="timeslot" value="'.$i.'"> '.$slots[$i].'<br>';
                                            }else{
                                                echo '<input type="radio" class="timeslot" name="timeslot" value="'.$i.'"> '.$slots[$i].' | ';
                                            }
                                        }
                                        
                                    }
                                    
                                }
                            ?>
                        </div>

                        <div class="col-lg-6">
                            <center><small><b>CHOOSE NETWORK LEADER:</b></small></center>
                            <select name="network" id="network" class="form-control">
                                
                            <?php 
                                if(isset($_GET['network'])){
                                    echo '<option value="16">All</option>';
                                }else{
                                    echo '<option value="16" selected>All</option>';
                                }

                                for($i = 0; $i < count($leader); $i++){
                                    if(isset($_GET['network'])){
                                        if($i == $_GET['network']){
                                            echo '<option value="'.$i.'" selected>'.$leader[$i].'</option>';
                                        }else{
                                            echo '<option value="'.$i.'">'.$leader[$i].'</option>';
                                        }
                                    }else{
                                        echo '<option value="'.$i.'">'.$leader[$i].'</option>';
                                    }
                                    
                                }
                            ?>

                        </select>
                        </div>

                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-lg-4">
                            <center><small><b>MEMBER:</b></small><br>
                            <h3 align="center"><?php echo $member; ?></h3>
                            <!-- <center><small><a href="#" data-toggle="modal" data-target="#myModalViewMembers">View</a></small></center> -->
                        </div>
                        <div class="col-lg-4">
                            <center><small><b>VISITOR:</b></small><br>
                            <h3 align="center"><?php echo $visitor; ?></h3>
                            <!-- <center><small><a href="#" data-toggle="modal" data-target="#myModalViewMembers">View</a></small></center> -->
                        </div>
                        <div class="col-lg-4">
                            <center><small><b>TOTAL:</b></small><br>
                            <h3 align="center"><?php echo $total; ?></h3>
                            <!-- <center><small><a href="#" data-toggle="modal" data-target="#myModalViewMembers">View</a></small></center> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="card">
        <div class="content">
            <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="current">

                <thead>
                    <tr>
                        <th>Fullname</th>
                        <th>Network Leader</th>
                        <th>Type</th>
                        <th>Timeslot</th>
                    </tr>
                </thead>

                <tbody>
                    <?php echo $content; ?>
                </tbody>

            </table>
        </div>
    </div>

<script>
    $('.timeslot').change(function(){
        console.log($("input[type='radio'][name='timeslot']:checked").val());
        document.search.submit();
    });
    $('#network').change(function(){
        console.log($("input[type='radio'][name='timeslot']:checked").val());
        document.search.submit();
    });
</script>
<script>
    $('#current').DataTable();
</script>