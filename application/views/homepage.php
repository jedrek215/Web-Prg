

<body style="background-color: #fffde7">
  
    <!-----------------PAGE WRAPPER---------------------->
  
            <!------------------BODY SECTION ---------------------->
            <div class="col-md-10 section">
                <div class="bodySect">
                     <div class="row collaborate">
                        <span> 
                         <a href="#collabModal" data-toggle="modal" id="collabBtn">Collaborate</a>
                         </span>
                         <span style="">
                             <form action="#" method="GET" id="filterForm">
								<input type="text" id="filter" placeholder="Filter...">
                             </form>
                         </span>
                    </div>
                <!-------------------THREAD LIST---------------------->
					<?php foreach($thread_details as $object): ?>
						<div class="row thread">
					
							<div class="col-md-3 byLine">
								<img src="/round.png" width="50" >
								<div class="name"><?=$object->email?> </div>
								<div class="datePosted"><?=$object->thread_datesub?></div>
							</div>
								
							<div class="col-md-9">
								<span class="className"> <a href="#" class="subjLink"><?=$object->class_code?></a></span>
								<span><a href class="followBtn">Following</a></span>
								<div class="title"><?=anchor('Thread_Cont/index/'.$object->thread_id, $object->thread_title);?></a></div>
								<div class="desc"><?=$object->thread_desc?></div>
								<span class="link-span">
								<a href="#" class="commentLink">Comments <span class="commentNumber">(24)</span></a>
								</span>
								<span class="link-span">|</span>
								<span class="link-span">144 Views</span>
							</div>
						
						</div>
					<?php endforeach; ?>
					
                <!---------------------PAGINATION-------------------->
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