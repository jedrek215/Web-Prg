

<body style="background-color: #fffde7">
   

    <!-----------------PAGE WRAPPER---------------------->
    <div class="container-fluid">
        <div class="commentRow">

            <!------------------BODY SECTION-------------------------->
            <div class="col-md-10 section">
                <div class="bodyCommentThreadSect">

                    <!-------------------THREAD LIST---------------------->
                    <?php foreach($thread_details as $object): ?>
                       <div class="comment thread">
                        <div class="col-md-3 byLine">
                          <img src="/round.png" width="50" >
                          <div class="name"><?=$object->email?></div>
                          <div class="datePosted"><?=$object->thread_datesub?></div>
                      </div>
                      <div class="col-md-9" style="margin-left: -20px;">
                        <span class="className"> <?=anchor('Classesthread_Cont/index/'.$object->class_id, $object->class_code, array('class'=>'subjLink'));?></a><a href="#" class="subjLink"></a></span>
                        <?php if($object->email != $username){
                           
                          if($this->Follow_model->isFollowing_thread($object->thread_id, $object->user_id)){
                             echo '<span><button id = "followThreadBtn'.$object->thread_id.'" name = "followThreadBtn'.$object->thread_id.'" class="followThreadBtn" onmouseover= "btnOver(this)" onmouseout= "btnOut(this)" onclick = "threadBtnClick(this,\''. $object->thread_id.'\',\'' .$object->email.'\')" style ="color:white">Following</button></span>';
                         }
                         else{
                           echo '<span><button id = "followThreadBtn'.$object->thread_id.'" name = "followThreadBtn'.$object->thread_id.'" class="followThreadBtn" onmouseover= "btnOver(this)" onmouseout= "btnOut(this)" onclick = "threadBtnClick(this,\''. $object->thread_id.'\',\'' .$object->email.'\')" style = "background:white">Follow</button></span>';
                       }
                       
                       else{
                        echo  '<span class="dropdown_sort">';
                        echo '<button class="setting"><span class="glyphicon glyphicon-cog"></span></button>';
                        echo '<div id="myDropdown" class="dropdown-content">';
                        echo        '<a onclick="openModal(\''.$object->thread_id.'\',\''.$object->thread_title.'\',\''.$object->thread_desc.'\',\''.$object->class_code.'\')">Edit Post</a>';
                        echo         '<a onclick="deleteModal(\''.$object->thread_id.'\',\''.$object->thread_title.'\')">Delete Post</a>';
                        echo '</div>                                
                    </span>';
                }?>
                <div class="title"><?=$object->thread_title?></div>
                <div class="desc"><?=$object->thread_desc?></div>
                <div>
                    <span class="commentLink">
                        Comments (<?=$object->comment_count?>)
                    </span>
                    <span class="link-span">|</span>
                    <span class="link-span"><?=$object->views?> Views</span>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<div class ="bodyCommentSection">
    <div class="commentBar">
        <span class ="commentStyle">Comments</span>
        <span class="dropdown_sort">
            <button onclick="myFunction()" class="dropbtn">Sort by</button>
            <div id="myDropdown" class="dropdown-content">
                <a href="#">Top</a>
                <a href="#">Latest</a>
                <a href="#">Oldest</a>
            </div>
        </span>
    </div>
    
    <?php if ($comments != NULL) {
        
       foreach($comments as $object): ?>
       <div class="row-comment">
        <div class="col-md-3 byLine">
            <img src="/round.png" width="50" >
            <div class="name"><?=$object->email?></div>
            <div class="datePosted"><?=$object->comment_datesub?></div>
        </div>
        <?php if($object->email == $username){
            echo  '<span class="dropdown_sort">';
            echo '<button class="setting"><span class="glyphicon glyphicon-cog"></span></button>';
            echo '<div id="myDropdown" class="dropdown-content">';
            echo        '<a onclick="openComment(\''.$object->comment_id.'\',\''.$object->thread_title.'\',\''.$object->comment_desc.'\')">Edit Comment</a>';
            echo         '<a onclick="deleteComment(\''.$object->comment_id.'\')">Delete Comment</a>';
                               // echo         '<a onclick="deleteModal(\''.$object->thread_id.'\',\''.$object->thread_title.'\')">Delete Post</a>';
            echo '</div>                                
        </span>';
    }?>
    <div class ="comment"><?=$object->comment_desc?></div>
</div>
<?php endforeach; } ?>
<!---------------------COMMENT BOX-------------------->
<?=validation_errors();?>
<?=form_open('Thread_Cont/add_comment');?>
<?=form_hidden('thread_id', $this->uri->segment(3));?>
<input type="hidden" name="username" id="username" value="<?php echo $username;?>">
<input type="hidden" name="dateSub" id="dateSub" value="<?php echo $timestamp;?>">
<div class= "commentSection">
    <div class ="commentStyle">Post a Comment</div>
    <textarea placeholder ="Comment" class = "commentbox" name="commentmessage" rows="5" cols="130" maxlength="300" required></textarea>
    <button type="submit" class = "commentbtn">Comment</button>
</div>
<?=form_close();?>
</div>
</div>
</div>
</div>
</body>
</html>