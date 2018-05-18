<?php 
include('apps/controllers/admin/current.controller.php');
?>

<div class="container-fluid">

    <div class="row">
        <div class="col-lg-4 col-md-4"></div>
        <div class="col-lg-4 col-md-4">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-lg-4">
                            <center><small><b>MEMBER(S):</b></small><br>
                            <h3 align="center"><?php echo $member; ?></h3>
                            <!-- <center><small><a href="#" data-toggle="modal" data-target="#myModalViewMembers">View</a></small></center> -->
                        </div>
                        <div class="col-lg-4">
                            <center><small><b>VISITOR(S):</b></small><br>
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
        <div class="col-lg-4 col-md-4"></div>
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
    $('#current').DataTable();
</script>