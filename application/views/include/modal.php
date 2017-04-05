    <!---------------------COLLABORATE MODAL---------------->
    <div class="modal fade" id="collabModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4>Collaborate</h4>
                </div>
                <div class="modal-body">
                    <?php echo validation_errors();
                        echo form_open('ThreadPost'); ?>
                        <div class="titleDiv">
                        <input type="hidden" name="username" id="username" value="<?php echo $username;?>">
                        <input type="hidden" name="dateSub" id="dateSub" value="<?php echo $timestamp;?>">
                        <input placeholder="Title" type="text" size="60" class="collabTitle" name="collabTitle" required>
                        </div>
                        <div class="descDiv">
                        <textarea rows="4" type="text" cols="60" wrap="hard" name="collabDesc" class="collabDesc" maxlength="300" placeholder="Add Description" required></textarea>
                        </div>
                        <div class="charDiv">
                        <span id="numChar">0</span>/300
                        </div>
                        <div class="selectDiv">
                        <select class="collabSelect" name="collabSelect">
                            <option selected>Select Subject</option>
                            <?php 
                            foreach($followed_class as $object){
                              echo'  <option value ="'.$object->follow_classid.'">'.$object->class_code.'</option>';
                            }
                            ?>
                        </select>
                        </div>
                        <div class="subDiv">
                        <button name="collabSub" class="collabSub">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
  <!---------------------COLLABORATE EDIT MODAL---------------->
    <div class="modal fade" id="collabEdit" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4>Collaborate</h4>
                </div>
                <div class="modal-body">
                    <?php echo validation_errors();
                        $attributes = array('id' => 'editPostModal');
                        echo form_open('Home_Cont/editThread', $attributes); ?>
                        <div class="titleDiv">
                        <input type="hidden" name="threadid" id="threadid" value="">
                        <input type="hidden" name="dateSub" id="dateSub" value="<?php echo $timestamp;?>">
                        <input placeholder="Title" type="text" size="60" class="editTitle" name="editTitle" required>
                        </div>
                        <div class="descDiv">
                        <textarea rows="4" cols="60" wrap="hard" name="editDesc" class="editDesc" maxlength="300" placeholder="Add Description" required></textarea>
                        </div>
                        <div class="charDiv">
                        <span id="numChar">0</span>/300
                        </div>
                        <div class="selectDiv">
                        <span><b>Subject:</b></span>
                        <span class="collabClass" name="collabClass">
                        
                        </span>
                        </div>
                        <div class="subDiv">
                        <button name="collabSub" class="collabSub">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

     <!---------------------COLLABORATE DELETE MODAL---------------->
    <div class="modal fade" id="collabDelete" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4>Collaborate</h4>
                </div>
                <div class="modal-body">
                    <?php echo validation_errors();
                        $attributes = array('id' => 'deletePostModal');
                        echo form_open('Home_Cont/deleteThread', $attributes); ?>
                        <input type="hidden" name="id" id="id" value="">
                        <input type="hidden" name="status" id="status" value="">
                        <center><h4>Delete post: <span id="titlePost" name="titlePost"></span>?</h4></center>
                        <div class="subDiv">
                        <button name="collabSub" class="collabSub">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
   <!---------------------EDIT PROFILE-------------------->
     <div class="modal fade" id="editProfile" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4>Edit Profile</h4>
                </div>
                 <?php
                $attributes = array( 'id' => 'editProfileModal');
                echo form_open('Register/updateInfo', $attributes); ?>
                <div class="modal-body">
                        <fieldset>
                        <div>
                            <label>Name:</label>
                            <input type="hidden" name="useremail" id="useremail" value="<?php echo $username;?>">
                            <span name ="fnameEdit" class="fnameEdit"></span>
                        </div>
                        <div>
                            <label>Email Address:</label>
                            <span name="emailEdit" class="emailEdit"></span>
                        </div>
                        <div>
                            <label>Password:</label>
                            <span class="change2">(<a href="#"  id="changePW">Change Password</a>)</span>
                        </div>
                            <div id="showChangePW" style="display: none;">
                                <small style="padding-left: 20px; color: grey;">Input your New Password</small>
                                <div>
                                <input type="password" name="newpass" id="newpass" placeholder="New Password" required/><br>
                                </div>
                                <div>
                                <input type="password" name="confirmpass" id="confirmpass" placeholder="Repeat Password" required/>
                                </div>
                            </div>
                        <div>
                            <label>ID Number:</label>
                            <span name="idNumEdit" class="idNumEdit"></span>
                        </div>    
                            <div><label>College & Degree</label>
                                <span  class="change1">(<a href="#" id="changeCD">Change College & Degree</a>)</span>
                        </div>
                        
                            <div id="showChangeCD" style="display: none;">
                                <small style="color: grey;">Select your New College and Degree</small>
                                <br>
                               <span>
                                  <select name="college" id="college" name="college">
                                    <option selected>College</option>
                                    <option value="COB">COB</option>   
                                    <option value="CCS">COS</option>
                                    <option value="CED">CED</option>
                                    <option value="COE">GCOE</option>
                                    <option value="COL">COL</option>
                                    <option value="CLA">CLA</option>
                                    <option value="COS">COS</option>  
                                    <option value="SOE">SOE</option>
                                    </select>
                              </span>
                              <span>
                                   <select name="degree" id="degree" name="degree">
                                    <option>Degree</option>
                                    </select>
                              </span>
                            </div>
                        
                        <div  style="padding-bottom: 30px">
                            <input type="submit" name="submitEdit" class="collabSub">
                        </div>
                        </fieldset>
                </div>
            </form>
            </div>
        </div>
    </div>
</body>
     <script>
    $('.collabDesc').keyup(function () {
      var len = $(this).val().length;
        //console.log(len)
        $('#numChar').text(len);
    });
         
    $('#changePW').click(function(){
        document.getElementById("showChangePW").style.display= "block";
        $('.change2').hide();
    })
    
    $('#changeCD').click(function(){
        document.getElementById("showChangeCD").style.display= "block";
        $('.change1').hide();
    })
    $('#postCollab').validate();

    $(function() {

   $('#editProfileModal').validate({
        rules: {
            newpass: {
                required: true,
                minlength: 7
            },
            confirmpass:{
                required: true,
                equalTo: "#newpass"
            }
        },
        
    });
    });


    /*-----------------------------------------------------------------------------*/
   base_url = '<?=base_url()?>';

     function getTerm(){
    data =  $("#editProfileModal").serialize();
    console.log(data);
     var method = 'edit';
    $('#editProfileModal')[0].reset(); // reset form on modals
    var url;
        url = "Home_Cont/getUserInfo"; 

    var id = "<?php foreach ($userinfo as $object){
                echo $object->user_id;}?>";

    console.log(base_url + url + "/" + id);
    //Ajax Load data from ajax
    $.ajax({
        url : base_url + url + "/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            console.log(url);
            console.log(data[0].email);
            $('[name="fnameEdit"]').text(data[0].Fullname);
            $('[name="emailEdit"]').text(data[0].email);
            $('[name="idNumEdit"]').text(data[0].idnumber);
            $('[name="college"]').val(data[0].college);
              $('[name="degree"]').val(data[0].degree);
            $('#editProfile').modal('show'); // show bootstrap modal when complete loaded
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    };

   function openModal(id,title, desc, classes){
        $('[name="threadid"]').val(id);
        $('[name="editTitle"]').val(title);
        $('[name="editDesc"]').val(desc);
        $(".collabClass").text(classes);
        //console.log($(".collabClass").attr("value",classes););
        console.log('success');
        $("#collabEdit").modal("toggle");
    }

    function deleteModal(id,title){
        $('[name="id"]').val(id);
        document.getElementById("titlePost").innerHTML = title;
        $('[name="status"]').val("D");
        console.log('success');
        $("#collabDelete").modal("toggle");
    }
    </script>
</html> 