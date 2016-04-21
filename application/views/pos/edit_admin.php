<form class="form-horizontal" role="form">
  <div class="form-group">
    <label class="control-label col-sm-2" for="last_name">Last Name:</label>
    <div class="col-sm-10">
      <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Enter Last Name" value="<?php echo $last_name;?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="first_name">First Name:</label>
    <div class="col-sm-10"> 
      <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Enter First Name" value="<?php echo $first_name;?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="username">Username:</label>
    <div class="col-sm-10">
      <input type="text" name="username" class="form-control" id="username" placeholder="Enter Username" value="<?php echo $username;?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="password">Password:</label>
    <div class="col-sm-10"> 
      <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
    </div>
  </div>    
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="button" id="save_profile" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>
<script type="application/javascript">
    $( document ).ready(function() {
        $("#save_profile").click(function(e){
            
            save_profile();
        });
    });
    function save_profile(){
        var last_name = $("#last_name").val();
        var first_name = $("#first_name").val();        
        var username = $("#username").val();
        var password = $("#password").val();
        error = 0;
        if($.trim(last_name)==""){
            error = 1;

            $("#myModalContent").html("Last name is required.");
            $("#myModal").modal();            
            
            return false;
        }
        if($.trim(first_name)==""){
            error = 1;

            $("#myModalContent").html("First name is required.");
            $("#myModal").modal();            
            
            return false;
        }        
        if($.trim(username)==""){
            error = 1;

            $("#myModalContent").html("Username is required.");
            $("#myModal").modal();            
            
            return false;
        }
                       
        if(error==0){
            $.ajax({
                url: "<?php echo base_url();?>pos-admin-update",
                headers: { 'csrf': "<?php echo $csrf;?>" },
                data: {
                    last_name: last_name,
                    first_name: first_name,                    
                    username: username,
                    password: password,
                    token: "<?php echo $token;?>"
                },
                type: "POST",
                success: function( json ) {
                    var obj = $.parseJSON( json );
                    
                    if(obj.success==1){
                        $("#myModalContent").html(obj.message);
                        $("#myModal").modal();
                    } else {
                        $("#myModalContent").html(obj.message);
                        $("#myModal").modal();
                    }
                },
                error: function( xhr, status, errorThrown ) {
                    console.log( "Error: " + errorThrown );
                    console.log( "Status: " + status );
                    console.dir( xhr );
                },
                complete: function( xhr, status ) {
                    
                }
            });
        }
    }
</script>