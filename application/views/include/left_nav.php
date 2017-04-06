
  <div class="container-fluid">
        <div class="row">
            <!--------------------NAVIGATION PANE-------------------->
            <div class="col-md-2">
                <div class="sidebar-nav" id="navi1">
                      <div class="navbar navbar-default" id="coursesBar" role="navigation">
                          <div class="navbar-collapse collapse sidebar-navbar-collapse">
                          <ul class="nav navbar-nav">
                            <li style="color: #f57f17; padding-left:40px; font-size:15px; border-bottom:1px solid # #f57f17;">Courses</li>
                           <!--<li><a href="/classesthread.html">MICPRO2</a></li>-->
                            <?php if ($followed_class != NULL){
                            foreach($followed_class as $object){
                              //echo'  <option value ="'.$object->follow_classid.'">'.$object->class_code.'</option>';
                              echo '<li>'.anchor('Classesthread_Cont/index/'.$object->follow_classid, $object->class_code). '</a></li>';
                              }
                            } else{
                              echo '<br><center><li><a href="'.base_url('Class_Cont').'"><h4>Follow Classes</h4></a></li></center><br>';
                              }?>
                          </ul>
                        </div>
                    </div>
                </div>
                <div class="sidebar-nav" id="navi">
                      <div class="navbar navbar-default" id="followBar" role="navigation">
                        <div class="navbar-collapse collapse sidebar-navbar-collapse">
                          <ul class="nav navbar-nav">
                            <li><a href="<?php echo base_url('/Home_Cont/followingthreads')?>">Following</a></li>
                            <li><a href="<?php echo base_url('/Home_Cont/')?>">All Threads</a></li>
                            <li><a href="<?php echo base_url('/Home_Cont/mythreads')?>">My Threads</a></li>
                          </ul>
                        </div>
                    </div>
                </div>
            </div>