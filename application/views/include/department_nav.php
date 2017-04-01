<div class="container-fluid">
        <div class="row">
            <!-----------------------NAVIGATION PANE------------------>
            <div class="col-md-2">
                <div class="nav-side-menu" id="navi2">
                      <div class="navbar navbar-default" id="deptBar" role="navigation">
                            <div id="collDept">Colleges & Departments</div>
                        <div class="navbar-header">
                          </div>
                          <div class="navbar-collapse collapse sidebar-navbar-collapse">
                          <ul class="nav navbar-nav">
                            <div id="colleges">
                            <?php foreach($college as $parent):?>
                            <li> <a href="#" data-toggle="collapse" data-target="#<?=$parent->college_code?>" aria-expanded="false"><?=$parent->college_name?> <i class="fa fa-sort-desc <?=$parent->college_code?>" style=" color: gray;" aria-hidden="true"></i></a></li>

                            <?php if(count($this->menu->getDepartment($parent->college_id))){?>
                                    <ul class="nav collapse collMenu" id="<?=$parent->college_code?>" role="menu" aria-labelledby="btn-1">
                                        <?php foreach($this->menu->getDepartment($parent->college_id) as $child) :
                                        echo '<li>'.anchor('Dept_Cont/index/'.$child->dept_id, $child->department). '</a></li>';
                                       endforeach;?>
                                    </ul>   
                             <?php };?>
                             <?php endforeach;?>
                            </div>
                          </ul>
                        </div>
                    </div>
                </div>
            </div>