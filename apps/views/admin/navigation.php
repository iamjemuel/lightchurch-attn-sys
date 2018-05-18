<?php 

    $active_a = "";
    $active_b = "";
    $active_c = "";
    $active_d = "";
    // $active_e = "";


    if(strpos($uri, 'current-logs')){
        $active_a = 'active';
    }elseif(strpos($uri, 'search-logs')){
        $active_b = 'active';
    }elseif(strpos($uri, 'add-backlogs')){
        $active_c = 'active';
    }elseif(strpos($uri, 'registered-attendees')){
        $active_c = 'active';
    }elseif(strpos($uri, 'add-member')){
        $active_c = 'active';
    }elseif(strpos($uri, 'add-visitor')){
        $active_c = 'active';
    }elseif(strpos($uri, 'view')){
        $active_c = 'active';
    }elseif(strpos($uri, 'edit')){
        $active_c = 'active';
    // }elseif(strpos($uri, 'search')){
    //     $active_e = 'active';
    }else{
        $active_a = 'active';
    }

?>

            <ul class="nav">
                <li class="<?php echo $active_a; ?>">

                    <a href="<?php echo $url; ?>admin/current-logs/">

                        <i class="pe-7s-note2"></i>

                        <p>Current Logs</p>

                    </a>

                </li>

                
                <li class="<?php echo $active_b; ?>">

                    <a href="<?php echo $url; ?>admin/search-logs/">

                        <i class="pe-7s-search"></i>

                        <p>Search Logs</p>

                    </a>

                </li>

                <li class="<?php echo $active_c; ?>">

                    <a href="<?php echo $url; ?>admin/registered-attendees/">

                        <i class="pe-7s-server"></i>

                        <p>Registered Attendees</p>

                    </a>

                </li>

                <!-- <li class="<?php echo $active_e; ?>">

                    <a href="<?php echo $url; ?>admin/search/">

                        <i class="pe-7s-search"></i>

                        <p>Search Logs</p>

                    </a>

                </li> -->

            </ul>