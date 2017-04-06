<!DOCTYPE html>


<body style="background-color: #fffde7">


    <div class="col-md-10 section">
        <!----------------BODY SECTION-------------------->
        <div class="bodySect">
            <div class="row collabSubj">
                <div class="subject">
                    <?=$classcode?>
                </div>
                <div style="padding-top: 20px;">
                    <span> 
                   <a href="#collabModal" data-toggle="modal" id="collabBtn">Collaborate</a>
               </span>
                    <span>
                   <form action="#" method="GET" id="filterForm">
                       <input type="text" id="filter" placeholder="Filter...">
                   </form>
               </span>
                </div>
            </div>
            <!----------------THREAD LIST-------------------->

            <?php if ($class_threads !=NULL){ foreach($class_threads as $object):?>
            <div class="row thread">
                <div class="col-md-3 byLine">
                    <img src="/round.png" width="50">
                    <div class="name">
                        <?=$object->email?></div>
                    <div class="datePosted">
                        <?=$object->thread_datesub?></div>
                </div>
                <div class="col-md-9">
                    <?php 
                    if($object->email != $username){ if($this->Follow_model->isFollowing_thread($object->thread_id, $object->user_id)){ echo '<span><button id = "followThreadBtn'.$object->thread_id.'" name = "followThreadBtn'.$object->thread_id.'" class="followThreadBtn" onmouseover= "btnOver(this)" onmouseout= "btnOut(this)" onclick = "threadBtnClick(this,\''. $object->thread_id.'\',\'' .$object->email.'\')" style ="color:white">Following</button></span>'; } 
                    else{ echo '<span><button id = "followThreadBtn'.$object->thread_id.'" name = "followThreadBtn'.$object->thread_id.'" class="followThreadBtn" onmouseover= "btnOver(this)" onmouseout= "btnOut(this)" onclick = "threadBtnClick(this,\''. $object->thread_id.'\',\'' .$object->email.'\')" style = "background:white">Follow</button></span>'; } } 

                else{ echo '<span class="dropdown_sort">';
                    echo '<button class="setting"><span class="glyphicon glyphicon-cog"></span></button>'; 
                    echo '<div id="myDropdown" class="dropdown-content">'; 
                    echo '<a onclick="openModal(\''.$object->thread_id.'\',\''.$object->thread_title.'\',\''.$object->thread_desc.'\',\''.$object->class_code.'\')">Edit Post</a>'; 
                    echo '<a onclick="deleteModal(\''.$object->thread_id.'\',\''.$object->thread_title.'\')">Delete Post</a>'; 
                    echo '</div></span>'; }?>

                    <div class="title">
                        <?=anchor( 'Thread_Cont/index/'.$object->thread_id, $object->thread_title, array('class'=>'titleThread'));?> </a>
                    </div>
                    <div class="desc">
                        <?=$object->thread_desc?>
                    </div>
                    <div>
                        <span class="commentLink"><?=anchor('Thread_Cont/index/'.$object->thread_id, 'Comments ('.$object->comment_count.')');?></span>
                        <span class="link-span">|</span>
                        <span class="link-span"><?=$object->views?> Views</span>
                    </div>
                </div>
            </div>
            <?php endforeach; } else echo 'No Threads'; ?>


            <!-------------PAGINATION---------------------->
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

    </html>
