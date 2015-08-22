<!--Register Starts-->
<div id="contact" class="spacer fullpage">
    <form id="frmLogin" action="<?php echo URL; ?>login/login" method="post" class="container form center">
        <h2 class="text-center  wowload fadeInUp no-margin-btm">Login</h2>
        <div id="feedback" ></div>
        <div class="row wowload fadeInRightBig">      
            <div id="signupbox" style="margin-top:0px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="panel-image thumbnail" >
                            <span class="glyphicon glyphicon-user thumbnail no-margin-btm" aria-hidden="true"></span>
                        </div>
                        <div class="panel-title">Enter your details</div>
                    </div>  
                    <div class="panel-body" >
                        <div id="signupform" class="form-horizontal" role="form">
                            <div id="signupalert" style="display:none" class="alert alert-danger">
                                <p>Error:</p>
                                <span></span>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-md-3 control-label">Email</label>
                                <div class="col-md-9">
                                    <input type="email" class="form-control" required name="email" placeholder="Email Address" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-md-3 control-label">Password</label>
                                <div class="col-md-9">
                                    <input type="password" class="form-control" required name="password" placeholder="Password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-md-3 control-label"><!--img src="<?php echo URL; ?>public/img/loading.gif" class="loading" /--></label>
                                <!-- Button -->                                        
                                <div class="col-md-9">
                                    <input type="checkbox" name="user_rememberme" class="remember-me-checkbox" scoped style="width:15px;" />
                                    <label class="remember-me-label">Keep me logged in (for 2 weeks)</label>
                                </div>
                            </div>                            
                            <div class="form-group">
                                <label for="phone" class="col-md-3 control-label"><img src="<?php echo URL; ?>public/img/loading.gif" class="loading" /></label>
                                <!-- Button -->                                        
                                <div class="col-md-9">
                                    <button id="btn-signup" type="submit" class="btn btn-primary"><i class="icon-hand-right"></i> &nbsp LOGIN</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-md-3 control-label"></label>
                                <!-- Button -->                                        
                                <div class="col-md-9">
                                    <a href="<?php echo URL; ?>register/index">Register</a>
                                    |
                                    <a href="<?php echo URL; ?>login/requestpasswordreset">Forgot my Password</a>                        
                                </div>
                            </div>
                        </div>
                     </div>
                </div>
             </div> 
        </div>      
    </form>
</div>
<!--Register Ends-->

<style type="text/css">
.panel-image{
  width: 66px;
  height: 56px;
  margin: 0px;  
  float: left;
}

.panel-image > span{
    font-size: 25px;
    text-align: center;
}

.panel-heading{
    height: 52px;
}

.panel-title{
   width: 80%;
  float: right;
  font-size: 22px;
  margin-top: 10px;  
}

.remember-me-checkbox{
    width: 15px;
}
</style>

<script type="text/javascript">
/*
    Theses are the jquery.forms options for frmAddDoctor above that uses the generic controller 
*/
var options = {
    beforeSend: function(){
        $(".loading").fadeIn("fast");
    console.log("beforeSend");
    }, uploadProgress: function(event, position, total, percentComplete){
        console.log("uploadProgress");
    }, success: function(response){
        console.log(response);
        if(response == "Success" || response == "success"){
            $("#feedback").append("<div class='alert alert-success alert-dismissable'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Login Success!</div>");
            window.location = $("#URLholder").val()+"index/welcome";            
        }else{
            $("#feedback").append("<div class='alert alert-danger alert-dismissable'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>"+response+".</div>");            
        }
    
        //This code segment removes the feedback automatically
        /*var delay = 15666;
        setTimeout(function() {
            $("#feedback").children().fadeOut().html("");
        }, delay);
        */
    }, complete: function(response){
        $(".loading").fadeOut("fast");
        console.log("Complete. response: "+response.responseText);
    }, error: function(response){
        $("#createDoctor").modal("hide");
        console.log(response);
        $("#feedback").append("<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Server responded with an error.</div>");
        
        //clear all fields
        $('form')[0].reset();
        
        console.log("ERROR: ");
    }
};
//Initiat AJAX on submit of frmRegister
$("#frmLogin").ajaxForm(options);

</script>
