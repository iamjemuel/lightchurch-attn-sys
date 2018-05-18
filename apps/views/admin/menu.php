<nav class="navbar navbar-default navbar-fixed">

            <div class="container-fluid">

                <div class="navbar-header">

                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">

                        <span class="sr-only">Toggle navigation</span>

                        <span class="icon-bar"></span>

                        <span class="icon-bar"></span>

                        <span class="icon-bar"></span>

                    </button>

                    <div class="navbar-brand">
                        
                        <?php 

                            if(strpos($uri, 'current-logs')){
                                echo '<small><a href="'.$url.'admin/current-logs/">Current Logs</a> / </small>';
                            }elseif(strpos($uri, 'search-logs')){
                                echo '<small><a href="'.$url.'admin/search-logs/">Search Logs</a> / </small>';
                            }elseif(strpos($uri, 'add-backlogs')){
                                echo '<small><a href="'.$url.'admin/registered-attendees/">Registered Attendees</a> / <a href="'.$url.'admin/add-backlogs/">Add Backlogs</a></small>';
                            }elseif(strpos($uri, 'registered-attendees')){
                                echo '<small><a href="'.$url.'admin/registered-attendees/">Registered Attendees</a> / </small>';
                            }elseif(strpos($uri, 'add-member')){
                                echo '<small><a href="'.$url.'admin/registered-attendees/">Registered Attendees</a> / 
                                        <a href="'.$url.'admin/add-member/">Add Member</a></small>';
                            }elseif(strpos($uri, 'add-visitor')){
                                echo '<small><a href="'.$url.'admin/registered-attendees/">Registered Attendees</a> / 
                                        <a href="'.$url.'admin/add-visitor/">Add Visitor</a></small>';
                            }elseif(strpos($uri, 'view')){
                                echo '<small><a href="'.$url.'admin/registered-attendees/">Registered Attendees</a> </small>/';
                            }elseif(strpos($uri, 'edit')){
                                echo '<small><a href="'.$url.'admin/registered-attendees/">Registered Attendees</a> </small>/';
                            // }elseif(strpos($uri, 'search')){
                            //     echo '<small><a href="'.$url.'admin/search/">Search Logs</a> </small>/';
                            }else{
                                echo '<small><a href="'.$url.'admin/current-logs/">Current Logs</a> / </small>';
                            }
                        ?>

                    </div>

                </div>

                <div class="collapse navbar-collapse">

                    <ul class="nav navbar-nav navbar-left">

                    </ul>



                    <ul class="nav navbar-nav navbar-right">

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <p>
                                    <i class='fa fa-gear'></i>
                                    <b class="caret"></b>
                                </p>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo $url; ?>"><i class="glyphicon glyphicon-time"></i>&nbsp;Timelog</a></li>
                                <li><a href="<?php echo $url; ?>logout/"><i class="glyphicon glyphicon-log-out"></i>&nbsp;Logout</a></li>
                            </ul>

                        </li>

                        <li class="separator hidden-lg hidden-md"></li>

                    </ul>

                </div>

            </div>

        </nav>

        <div id="display_clock" style="margin-left: 30px; margin-bottom: -30px;" ></div>

