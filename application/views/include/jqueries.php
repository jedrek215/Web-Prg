   <script>
    $('.collabDesc').keyup(function () {
      var len = $(this).val().length;
        //console.log(len)
        $('#numChar').text(len);
    });

    $('.editDesc').keyup(function () {
      var len = $(this).val().length;
        //console.log(len)
        $('#numChar1').text(len);
    });
         
    $('#changePW').click(function(){
        document.getElementById("showChangePW").style.display= "block";
        $('.change2').hide();
    })
    
    $('#changeCD').click(function(){
        document.getElementById("showChangeCD").style.display= "block";
        $('.change1').hide();
    })
    //$('#postCollab').validate();

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
                echo $object->user_id;}?> ";

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

     function openComment(id,title, comment){
        $('[name="commentid"]').val(id);
        $('.commTitle').val(title);
        $('[name="comment"]').val(comment);
        //console.log($(".collabClass").attr("value",classes););
        console.log('success');
        $("#editComment").modal("toggle");
    }

    function deleteModal(id,title){
        $('[name="id"]').val(id);
        document.getElementById("titlePost").innerHTML = title;
        $('[name="status"]').val("D");
        console.log('success');
        $("#collabDelete").modal("toggle");
    }
    function deleteComment(id){
        $('[name="deleteID"]').val(id);
        $('[name="deleteStatus"]').val("D");
        console.log('success');
        $("#commentDelete").modal("toggle");
    }

    function button_Following(btnID){
        console.log('WOOOOOH');
        btn = document.getElementById(btnID);
        btn.style.background = '#f9a825';
        btn.style.color = 'white';
        btn.innerText = 'Following';
    }

    function button_Unfollowing(btnID){
        console.log(btnID);
        btn = document.getElementById(btnID);
        btn.style.background = 'white';
        btn.style.color = '#f9a825';
        btn.innerText = 'Follow';
    }
    
    function btnOver(btn){
        if(btn.innerText == 'Follow'){
            btn.style.background = '#efefef';
        }
        else{
            btn.style.background = '#efefef';
            btn.style.color = '#f9a825';
            btn.innerText = 'Unfollow';
        }   
    }

function btnOut(btn){
    if(btn.innerText == 'Follow'){
        btn.style.background = 'white';
        btn.style.color = '#f9a825';

        var url = "Home_Cont/getUserInfo";

    }
    else{
        btn.style.background = '#f9a825';
        btn.style.color = 'white';
        btn.innerText = 'Following';
    }   
}

base_url = '<?=base_url()?>';

function threadBtnClick(btn, thread_id, email){
    if(btn.innerText == 'Follow'){
        btn.style.background = '#f9a825';
        btn.style.color = 'white';
        btn.innerText = 'Following';
        
        console.log(thread_id);
        console.log(email);

         $.ajax({
            type: "POST",
            url: base_url + "Follow_Cont/follow_thread",
            data: {thread_id: thread_id, 
                   email: email               
                },

            success: function(data){
            /*This will be changed using a Ajax function on a later date so that the data is updated without page refresh*/ 
                console.log("Data sent to server");
            }
            
        });

    }

    else{
        btn.style.background = 'white';
        btn.style.color = '#f9a825';
        btn.innerText = 'Follow'
        
        console.log(thread_id);
        console.log(email);

         $.ajax({
            type: "POST",
            url: base_url + "Follow_Cont/unfollow_thread",
            data: {thread_id: thread_id, 
                   email: email               
                },

            success: function(data){
            /*This will be changed using a Ajax function on a later date so that the data is updated without page refresh*/ 
                console.log("Data sent to server");
            }
            
        });

    }
}


  </script>
</html> 