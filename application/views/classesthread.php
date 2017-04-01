<!DOCTYPE html>


<body style="background-color: #fffde7">

   
            <div class="col-md-10 section">
                <!----------------BODY SECTION-------------------->
                <div class="bodySect">
                     <div class="row collabSubj">
                        <div class="subject"><?=$classcode?></div>
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

                     <?php  if ($class_threads != NULL){
                     foreach($class_threads as $object):?>
                     <div class="row thread">
                        <div class="col-md-3 byLine">
                            <img src="/round.png" width="50" >
                            <div class="name"><?=$object->email?></div>
                            <div class="datePosted"><?=$object->thread_datesub?></div>
                        </div>
                        <div class="col-md-9">
                            <span><a href="" class="followBtn">Following</a></span>

                            <div class="title"><?=anchor('Thread_Cont/index/'.$object->thread_id, $object->thread_title, array('class'=>'titleThread'));?> </a></div>
                            <div class="desc"> <?=$object->thread_desc?>
                            </div>
                            <div>
                                <span class="link-span">
                                <a href="#" class="commentLink">Comments <span class="commentNumber">(24)</span></a>
                                </span>
                                <span class="link-span">|</span>
                                <span class="link-span">144 Views</span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; }
                    else echo 'No Threads';
                ?>


                <!-------------PAGINATION---------------------->
                    <div class="row">
                      <nav aria-label="...">
                          <ul class="pagination">
                            <li class="page-item disabled">
                              <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active">
                              <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
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