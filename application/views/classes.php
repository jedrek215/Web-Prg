<div class="col-md-10 section">
    <!--------------BODY SECTION-------------------->
    <div class="bodySect">
        <div class="row collabSubj" style="padding-bottom:20px; text-align: center">
            <span style="float:left"> 
                         <a href="#collabModal" data-toggle="modal" id="collabBtn" >Collaborate</a>
                         </span>
            <span class="deptClass">
                         Classes Following
                         </span>

        </div>
        <!----------------CLASS THREAD -------------->
        <?php if ($followed_class !=N ULL){ foreach($followed_class as $object):?>
        <div class="row thread subj">
            <div class="col-md-12">
                <div class="subjClass">
                    <span class="subjA">
                        <?=anchor('Classesthread_Cont/index/'.$object->class_id, $object->class_code, array('class'=>'subjLink'));?></a>&nbsp;<small>(<?=$object->class_name?>)</small></a>
                    </span>
                    
                    <?php 
                    if ($this->Follow_model->isFollowing_class($object->class_id, $object->user_id)){ echo '<span><button id = "followClassBtn'.$object->class_id.'" name = "followClassBtn'.$object->class_id.'" class="followClassBtn" onmouseover= "btnOver(this)" onmouseout= "btnOut(this)" onclick = "classBtnClick(this,\''. $object->class_id.'\',\'' .$object->email.'\')" style ="color:white">Following</button></span>'; } 

                    else{ echo '<span><button id = "followClassBtn'.$object->class_id.'" name = "followClassBtn'.$object->class_id.'" class="followClassBtn" onmouseover= "btnOver(this)" onmouseout= "btnOut(this)" onclick = "classBtnClick(this,\''. $object->class_id.'\',\'' .$object->email.'\')" style = "background:white">Follow</button></span>'; }
                    ?>

                </div>
                <div class="desc">
                    <?=$object->class_desc?></div>
                <div>
                    <span class="link-span">
                                20 posts</span>
                    <span class="link-span">|</span>
                    <span class="link-span">50 Followers</span>
                </div>
            </div>
        </div>
        <?php endforeach; }?>
        <!------------PAGINATION---------------->
        <div class="row">
            <nav aria-label="...">
                <ul class="pagination">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
</div>
</div>
