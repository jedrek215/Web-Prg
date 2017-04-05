
<body style="background-color: #fffde7">
  <!------------------TOP NAVIGATION-------------------->
    <nav class="navbar navbar-default " id="header">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="<?php echo base_url('/Home_Cont')?>"><span style="font-family:'luna'" id="Collab">Collab</span></a>
        </div>
        <ul class="nav navbar-nav" id="menuBar">
          <li><a href="<?php echo base_url('/Home_Cont')?>">Home</a></li>
          <li><a href="<?php echo base_url('/Notif_Cont')?>">Notifications <span class="badge">3</span></a></li>
          <li><a href="<?php echo base_url('/Class_Cont')?>">Classes</a></li>            
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><form action="" method="GET">
            <input type="text" id="search" placeholder="Search...">
            </form>
            </li>
            <li><a href="#" id="searchBtn"><span class="glyphicon glyphicon-search"></span></a></li>
          <li class="dropdown" id="user"><a class="dropdown-toggle" data-toggle="dropdown" href="#">
              <img src="<?php echo base_url('userIcon.jpg')?>" width="35" ></a>
              <ul class="dropdown-menu" id="dropdownMenu">
                <li class="nameHere"><center><?php foreach ($userinfo as $object){
                                              echo $object->Fullname;}?></center></li>
                <hr>
                <li> <a href="" id="edit" data-toggle="modal">Edit Profile</a></li>
                <li><a href="<?php echo base_url('/Login_Cont')?>">Logout</a></li>
              </ul>
          </li> 
        </ul>
      </div>
    </nav>


    <script>
        $("#edit").on('click', function() {
         getTerm();
        // window.location = "http://www.google.com";
        });
    </script> 