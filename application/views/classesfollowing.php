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
        <?php if ($followed_class !=NULL){ foreach($followed_class as $object):?>
        <div class="row thread subj">
            <div class="col-md-12">
                <div class="subjClass">
                    <span class="subjA">
                        <?=anchor('Classesthread_Cont/index/'.$object->class_id, $object->class_code, array('class'=>'subjLink'));?></a>&nbsp;<small>(<?=$object->class_name?>)</small></a>
                    </span>
                    
                    <?php 
                    if ($this->Follow_model->isFollowing_class($object->class_id, $username)){ 
                        echo '<span><button id = "followClassBtn'.$object->class_id.'" name = "followClassBtn'.$object->class_id.'" class="followClassBtn" onmouseover= "btnOver(this)" onmouseout= "btnOut(this)" onclick = "classBtnClick(this,\''. $object->class_id.'\',\'' .$username.'\')" style ="color:white">Following</button></span>'; } 
                    else{ echo '<span><button id = "followClassBtn'.$object->class_id.'" name = "followClassBtn'.$object->class_id.'" class="followClassBtn" onmouseover= "btnOver(this)" onmouseout= "btnOut(this)" onclick = "classBtnClick(this,\''. $object->class_id.'\',\'' .$username.'\')" style = "background:white">Follow</button></span>'; }
                    ?>

                </div>
                <div class="desc">
                    <?=$object->class_desc?></div>
                <div>
                    <span class="link-span">
                                <span class="link-span"><?=anchor('Classesthread_Cont/index/'.$object->class_id, $object->post_count.' posts');?></span></span>
                    <span class="link-span">|</span>
                    <span class="link-span"><?= $this->menu->getClassFollowers($object->class_id);?> Followers</span>
                </div>
            </div>
        </div>
        <?php endforeach; }?>
        <!------------PAGINATION---------------->

    </div>
</div>
</div>
</div>
