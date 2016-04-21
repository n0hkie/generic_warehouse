<form id="post_data" action="<?php echo base_url();?>pos-dashboard" method="post">
    <input type="hidden" name="session_id" id="session_id" />
</form>
<!--login modal-->
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <img id="login_logo" src="<?php echo base_url(); ?>assets/images/login_logo.png"/>
          <h1 class="text-center">Welcome Back! Please Sign In</h1>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block">
            <div class="form-group">
              <input type="text" class="form-control input-lg" name="username" id="username" placeholder="Username">
            </div>
            <div class="form-group">
              <input type="password" class="form-control input-lg" name="password" id="password" placeholder="Password">
            </div>
            <div class="form-group">
              <a class="btn btn-primary btn-lg btn-block" id="signin">Sign In</a>
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          
		  </div>	
      </div>
  </div>
  </div>
</div>
<script type="application/javascript">
    $( document ).ready(function() {
        $("#signin").click(function(e){
            
            login();
        });
    });
    function login(){
        
        var username = $("#username").val();
        var password = $("#password").val();
        error = 0;
        if($.trim(username)==""){
            error = 1;

            $("#myModalTitle").html("Login");
            $("#myModalContent").html("Username is required.");
            $("#myModal").modal();            
            
            return false;
        }
        
        if($.trim(password)==""){
            error = 1;
            
            $("#myModalTitle").html("Login");
            $("#myModalContent").html("Password is required.");
            $("#myModal").modal();
            
            return false;
        }        
        
        if(error==0){
            $.ajax({
                url: "<?php echo base_url();?>pos-auth",
                headers: { 'csrf': "<?php echo $csrf;?>" },
                data: {
                    username: username,
                    password: password
                },
                type: "POST",
                success: function( json ) {
                    var obj = $.parseJSON( json );
                    
                    if(obj.success==1){
                        console.log(obj.data['admin_id']);
                        $("#session_id").val(obj.data['admin_id']);
                        $("#post_data").submit();
                    } else {
                        $("#myModalTitle").html("Login");
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