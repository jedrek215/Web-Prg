    <!---------------------COLLABORATE MODAL---------------->
    <div class="modal fade" id="collabModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4>Collaborate</h4>
                </div>
                <div class="modal-body">
                    <form action="#" method="post">
                        <div class="titleDiv">
                        <input placeholder="Title"type="text" size="60" class="collabTitle" name="collabTitle" required>
                        </div>
                        <div class="descDiv">
                        <textarea rows="4" cols="60" wrap="hard" name="collabDesc" class="collabDesc" maxlength="300" placeholder="Add Description" required></textarea>
                        </div>
                        <div class="charDiv">
                        <span id="numChar">0</span>/300
                        </div>
                        <div class="selectDiv">
                        <select class="collabSelect" name="collabSelect">
                            <option selected>Select Subject</option>
                            <option value="">WEB-PRG</option>
                            <option>MICPRO2</option>
                            <option>COMPARC</option>
                            <option>BASCDSP</option>
                            <option>PICCTRL</option>
                            <option>LBYMIC2</option>
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
    
   <!---------------------EDIT PROFILE-------------------->
     <div class="modal fade" id="editProfile" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4>Edit Profile</h4>
                </div>
                <div class="modal-body">
                    <form action="#" method="post" class="editProfileModal">
                        <div>
                            <label>Name:</label>
                            <span class="fnameEdit"> FirstName </span>
                            <span class="lnameEdit"> LastName </span>
                        </div>
                        <div>
                            <label>Email Address:</label>
                            <span class="emailEdit"> first_last@dlsu.edu.ph</span>
                        </div>
                        <div>
                            <label>Password:</label>
                            <span class="change2">(<a href="#"  id="changePW">Change Password</a>)</span>
                        </div>
                            <div id="showChangePW" style="display: none;">
                                <small style="padding-left: 20px; color: grey;">Input your New Password</small>
                                <div>
                                <input type="password" placeholder="New Password"><br>
                                </div>
                                <div>
                                <input type="passowrd" placeholder="Repeat Password">
                                </div>
                            </div>
                        <div>
                            <label>ID Number:</label>
                            <span class="idNumEdit">11412345</span>
                        </div>    
                            <div><label>College & Degree</label>
                                <span class="change1">(<a href="#" id="changeCD">Change College & Degree</a>)</span>
                        </div>
                        
                            <div id="showChangeCD" style="display: none;">
                                <small style="color: grey;">Select your New College and Degree</small>
                                <br>
                               <span>
                                  <select id="college" name="college">
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
                                   <select id="degree" name="degree">
                                    <option>Degree</option>
                                    </select>
                              </span>
                            </div>
                        
                        <div  style="padding-bottom: 30px">
                            <button name="submitEdit" class="collabSub">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
     <script>
    $('.collabDesc').keyup(function () {
      var len = $(this).val().length;
        console.log(len)
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
    </script>
   
</html> 