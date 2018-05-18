<?php 
include('apps/model/attendee.class.php');
include('apps/variables.php');
$attendee = new Attendee();

$content = '';
$members = 0;
$visitors = 0;
if($attendee->getAll()){
    $data = $attendee->getAll(); 
    for($i = 0; $i <= count($data)-1; $i++){
        $content .= '<tr>
                    <td>'.$data[$i]['firstname'].' '.$data[$i]['lastname'].'</td>
                    <td>'.$type[$data[$i]['type']].'</td>
                    <td>'.$leader[$data[$i]['network']].'</td>
                    <td><a href="'.$url.'admin/view/'.$data[$i]['id'].'/" class="btn btn-info"><i class="fa fa-user"></i></a>&nbsp;<a href="'.$url.'admin/add-backlogs/'.$data[$i]['id'].'/" class="btn btn-warning"><i class="fa fa-list"></i></a>&nbsp;<a class="btn btn-default" onclick="attendee.Delete('.$data[$i]['id'].')"><i class="fa fa-trash"></i></a></td>
            </tr>';

        if($data[$i]['type'] == 0){
            $members++;
        }else{
            $visitors++;
        }
    } 
}else{
    $content = 'No results found';
}



?>