<!-- Cirlce Starts -->
<div id="about"  class="container spacer about">
  <!--div class="process">
    <!--ul class="row text-center list-inline  wowload bounceInUp">
        <li>
              <span><i class="fa fa-history"></i><b>Research</b></span>
          </li>
          <li>
              <span><i class="fa fa-puzzle-piece"></i><b>Plan</b></span>
          </li>
          <li>
              <span><i class="fa fa-database"></i><b>Develop</b></span>
          </li>
          <li>
              <span><i class="fa fa-magic"></i><b>Integration</b></span>
          </li>        
          <li>
              <span><i class="fa fa-cloud-upload"></i><b>Deliver</b></span>
          </li>
      </ul ->
  </div-->
  <?php if(isset($this->image_details[0])) {?>
    <div class="mainbox logo_holder col-md-5 col-md-offset-3 col-sm-8 col-sm-offset-3">
      <img src="<?php echo $this->image_details[0]->url; ?>" class="practice_logo wowload fadeInUp">
    </div>
  <?php } ?>
  <div class="mainbox col-md-6 col-md-offset-2 col-sm-8 col-sm-offset-2">
    <h3 class="text-center wowload fadeInUp">Welcome <?php echo $this->user_details[0]->name." ".$this->user_details[0]->surname; ?></h3>  
  </div>

<?php   if (Session::get("user_account_type") == "User") {  ?>
    <!--Register Starts-->
    <form id="frmRegister" action="<?php echo URL; ?>register/register" method="post" class="container form center" scoped style="  margin-bottom: -60px;">
      <div class="row wowload fadeInLeftBig">     
        <div id="signupbox" class="mainbox col-md-6 col-md-offset-2 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                  <div class="panel-image thumbnail" >
                    <span class="glyphicon glyphicon-home thumbnail no-margin-btm" aria-hidden="true"></span>
                  </div>
                    <div class="panel-title">Practice Details</div>
                </div>  
                <div class="panel-body" >
                    <div id="signupform" class="form-horizontal" role="form">
                        <div id="signupalert" style="display:none" class="alert alert-danger">
                            <p>Error:</p>
                            <span></span>
                        </div>
                        <div class="form-group">
                            <label for="firstname" class="col-md-3 control-label">Practice Name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="<?php echo $this->user_details[0]->practice_name; ?>" required name="practice_name" placeholder="Practice Name" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-md-3 control-label">Practice Number</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="<?php echo $this->user_details[0]->practice_number; ?>" required name="practice_number" placeholder="Practice Number" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="type" class="col-md-3 control-label">Type</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="<?php echo $this->user_details[0]->type; ?>" required name="type" placeholder="Type" >
                            </div>
                        </div>
                    </div>
                 </div>
            </div>
         </div> 
      </div>
      <div id="feedback" ></div>
      <div class="row wowload fadeInRightBig">      
        <div id="signupbox" style="margin-top:0px" class="mainbox col-md-6 col-md-offset-2 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                  <div class="panel-image thumbnail" >
                    <span class="glyphicon glyphicon-user thumbnail no-margin-btm" aria-hidden="true"></span>
                  </div>
                    <div class="panel-title">Account Details</div>
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
                                <input type="text" class="form-control" value="<?php echo $this->user_details[0]->email; ?>" required disabled >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-3 control-label">Password</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" title="Leave empty to keep current password" required name="password" placeholder="Leave empty to keep current">
                            </div>
                        </div>                      
                        <div class="form-group">
                            <label for="name" class="col-md-3 control-label">Name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="<?php echo $this->user_details[0]->name; ?>" required name="name" placeholder="Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="surname" class="col-md-3 control-label">Surname</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="<?php echo $this->user_details[0]->surname; ?>" required name="surname" placeholder="Surname">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="col-md-3 control-label">Phone</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="<?php echo $this->user_details[0]->phone; ?>" required name="phone" placeholder="Phone">
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="phone" class="col-md-3 control-label"><img src="<?php echo URL; ?>public/img/loading.gif" class="loading" /></label>
                            <!-- Button -->                                        
                            <div class="col-md-9">
                                <button id="btn-signup" type="submit" class="btn btn-primary"><i class="icon-hand-right"></i> &nbsp SAVE</button>
                            </div>
                        </div>
                    </div>
                 </div>
            </div>
         </div> 
      </div>    
    </form>  
  <!--Register Ends-->            
      <form id="frmPracticeLogo" action="<?php echo URL; ?>generic/genericCreate" method="post" class="container form center">
        <div class="row wowload fadeInUp">     
          <div id="signupbox" style="margin-top:50px" class="mainbox col-md-6 col-md-offset-2 col-sm-8 col-sm-offset-2">
              <div class="panel panel-info">
                  <div class="panel-heading">
                    <div class="panel-image thumbnail" >
                      <span class="glyphicon glyphicon-home thumbnail no-margin-btm" aria-hidden="true"></span>
                    </div>
                      <div class="panel-title">Logo Manager</div>
                  </div>  
                  <div class="panel-body" >
                      <div id="signupform" class="form-horizontal" role="form">
                          <div id="signupalert" style="display:none" class="alert alert-danger">
                              <p>Error:</p>
                              <span></span>
                          </div>
                          <div class="form-group">
                              <label for="firstname" class="col-md-3 control-label">Practice Logo</label>
                              <div class="col-md-9">
                                  <input type="file" class="form-control file_input" required name="url[]" >
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="phone" class="col-md-3 control-label"><img src="<?php echo URL; ?>public/img/loading.gif" class="loading" /></label>
                              <!-- Button -->                                        
                              <div class="col-md-9">
                                  <button id="btn-signup" type="submit" class="btn btn-primary"><i class="icon-hand-right"></i> &nbsp SAVE</button>
                              </div>
                          </div>
                          <input type="hidden" name="type" value="practice_logo" />
                          <input type="hidden" id="table" name="table" value="<?php echo PREFIX; ?>image" />
                          <input type="hidden" id="user_id" name="user_id" value="<?php echo Session::get("user_id"); ?>" />
                          <input type="hidden" id="has_files" name="has_files" value="true" />
                          <input type="hidden" id="file_dirs" name="file_dirs" value="/public/uploads/practice_logo/" />
                          <input type="hidden" id="file_fields" name="file_fields" value="url" />                          
                      </div>
                   </div>
              </div>
           </div> 
        </div>  
      </form>  
<?php   }else if (Session::get("user_account_type") == "Customer") { ?>
<!--Register Starts-->
  <form id="frmRegister" action="<?php echo URL; ?>register/register" method="post" class="container form center">
    <div id="feedback" ></div>
    <div class="row wowload fadeInRightBig">      
      <div id="signupbox" style="margin-top:0px" class="mainbox col-md-6 col-md-offset-2 col-sm-8 col-sm-offset-2">
          <div class="panel panel-info">
              <div class="panel-heading">
                <div class="panel-image thumbnail" >
                  <span class="glyphicon glyphicon-user thumbnail no-margin-btm" aria-hidden="true"></span>
                </div>
                  <div class="panel-title">Account Details</div>
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
                              <input type="text" class="form-control" value="<?php echo $this->user_details[0]->email; ?>" required disabled >
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="password" class="col-md-3 control-label">Password</label>
                          <div class="col-md-9">
                              <input type="password" class="form-control" title="Leave empty to keep current password" required name="password" placeholder="Leave empty to keep current">
                          </div>
                      </div>                      
                      <div class="form-group">
                          <label for="name" class="col-md-3 control-label">Name</label>
                          <div class="col-md-9">
                              <input type="text" class="form-control" value="<?php echo $this->user_details[0]->name; ?>" required name="name" placeholder="Name">
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="surname" class="col-md-3 control-label">Surname</label>
                          <div class="col-md-9">
                              <input type="text" class="form-control" value="<?php echo $this->user_details[0]->surname; ?>" required name="surname" placeholder="Surname">
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="phone" class="col-md-3 control-label">Phone</label>
                          <div class="col-md-9">
                              <input type="text" class="form-control" value="<?php echo $this->user_details[0]->phone; ?>" required name="phone" placeholder="Phone">
                          </div>
                      </div>
                      <div class="form-group">
                        <label for="phone" class="col-md-3 control-label"><img src="<?php echo URL; ?>public/img/loading.gif" class="loading" /></label>
                          <!-- Button -->                                        
                          <div class="col-md-9">
                              <button id="btn-signup" type="submit" class="btn btn-primary"><i class="icon-hand-right"></i> &nbsp SAVE</button>
                          </div>
                      </div>
                  </div>
               </div>
          </div>
       </div> 
    </div>    
  </form>  
<!--Register Ends-->             
<?php   }else if (Session::get("user_account_type") == "Doctor") { ?>
<!--Register Starts-->
  <form id="frmRegister" action="<?php echo URL; ?>register/register" method="post" class="container form center">
    <div id="feedback" ></div>
    <div class="row wowload fadeInRightBig">      
      <div id="signupbox" style="margin-top:0px" class="mainbox col-md-6 col-md-offset-2 col-sm-8 col-sm-offset-2">
          <div class="panel panel-info">
              <div class="panel-heading">
                <div class="panel-image thumbnail" >
                  <span class="glyphicon glyphicon-user thumbnail no-margin-btm" aria-hidden="true"></span>
                </div>
                  <div class="panel-title">Account Details</div>
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
                              <input type="text" class="form-control" value="<?php echo $this->user_details[0]->email; ?>" required disabled >
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="password" class="col-md-3 control-label">Password</label>
                          <div class="col-md-9">
                              <input type="password" class="form-control" title="Leave empty to keep current password" required name="password" placeholder="Leave empty to keep current">
                          </div>
                      </div>                      
                      <div class="form-group">
                          <label for="name" class="col-md-3 control-label">Name</label>
                          <div class="col-md-9">
                              <input type="text" class="form-control" value="<?php echo $this->user_details[0]->name; ?>" required name="name" placeholder="Name">
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="surname" class="col-md-3 control-label">Surname</label>
                          <div class="col-md-9">
                              <input type="text" class="form-control" value="<?php echo $this->user_details[0]->surname; ?>" required name="surname" placeholder="Surname">
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="phone" class="col-md-3 control-label">Phone</label>
                          <div class="col-md-9">
                              <input type="text" class="form-control" value="<?php echo $this->user_details[0]->phone; ?>" required name="phone" placeholder="Phone">
                          </div>
                      </div>
                      <div class="form-group">
                        <label for="phone" class="col-md-3 control-label"><img src="<?php echo URL; ?>public/img/loading.gif" class="loading" /></label>
                          <!-- Button -->                                        
                          <div class="col-md-9">
                              <button id="btn-signup" type="submit" class="btn btn-primary"><i class="icon-hand-right"></i> &nbsp SAVE</button>
                          </div>
                      </div>
                  </div>
               </div>
          </div>
       </div> 
    </div>    
  </form>  
<!--Register Ends-->             
<?php   }else if (Session::get("user_account_type") == "Patient") { ?>
<!--Register Starts-->
  <form id="frmRegister" action="<?php echo URL; ?>register/register" method="post" class="container form center">
    <div id="feedback" ></div>
    <div class="row wowload fadeInRightBig">      
      <div id="signupbox" style="margin-top:0px" class="mainbox col-md-6 col-md-offset-2 col-sm-8 col-sm-offset-2">
          <div class="panel panel-info">
              <div class="panel-heading">
                <div class="panel-image thumbnail" >
                  <span class="glyphicon glyphicon-user thumbnail no-margin-btm" aria-hidden="true"></span>
                </div>
                  <div class="panel-title">Account Details</div>
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
                              <input type="text" class="form-control" value="<?php echo $this->user_details[0]->email; ?>" required disabled >
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="password" class="col-md-3 control-label">Password</label>
                          <div class="col-md-9">
                              <input type="password" class="form-control" title="Leave empty to keep current password" required name="password" placeholder="Leave empty to keep current">
                          </div>
                      </div>                      
                      <div class="form-group">
                          <label for="name" class="col-md-3 control-label">Name</label>
                          <div class="col-md-9">
                              <input type="text" class="form-control" value="<?php echo $this->user_details[0]->name; ?>" required name="name" placeholder="Name">
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="surname" class="col-md-3 control-label">Surname</label>
                          <div class="col-md-9">
                              <input type="text" class="form-control" value="<?php echo $this->user_details[0]->surname; ?>" required name="surname" placeholder="Surname">
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="phone" class="col-md-3 control-label">Phone</label>
                          <div class="col-md-9">
                              <input type="text" class="form-control" value="<?php echo $this->user_details[0]->phone; ?>" required name="phone" placeholder="Phone">
                          </div>
                      </div>
                      <div class="form-group">
                        <label for="phone" class="col-md-3 control-label"><img src="<?php echo URL; ?>public/img/loading.gif" class="loading" /></label>
                          <!-- Button -->                                        
                          <div class="col-md-9">
                              <button id="btn-signup" type="submit" class="btn btn-primary"><i class="icon-hand-right"></i> &nbsp SAVE</button>
                          </div>
                      </div>
                  </div>
               </div>
          </div>
       </div> 
    </div>    
  </form>  
<!--Register Ends-->            
<?php   
  }else{ 
    echo "<script type='text/javascript'>
            window.location ='".URL."';
          </script>";
  } ?>
</div>

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

form#frmRegister {
  margin-top: -45px;
}

.practice_logo{
  width: 100%;
}

.logo_holder{
  margin-top: 22px;
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

    //$("#feedback").append("<div class='alert alert-success alert-dismissable'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Success! You are now registered and a verification email is sent. <a href='"+$("#URLholder").val()+"login/index'>Continue to login.</a></div>");
    
    $('form')[0].reset();
    
    location.reload();
    //This code segment removes the feedback automatically
    /*var delay = 15666;
    setTimeout(function() {
        $("#feedback").children().fadeOut().html("");
    }, delay);
    */
  }, complete: function(response){
    $(".loading").fadeOut("fast");
    console.log("Complete. response: "+response.responseText);
  }, error: function(){
    $("#createDoctor").modal("hide");
    
    $("#feedback").append("<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Unable to delete item.</div>");
    
    //clear all fields
    $('form')[0].reset();
    
    console.log("ERROR: ");
  }
};
//Initiat AJAX on submit of frmRegister
$("#frmPracticeLogo").ajaxForm(options);

</script>
<!--div class="container">
  <pre>
    <?php 
      print_r($this->user_details);

      if(isset($this->patient_details)){
        print_r($this->patient_details);      
      }
    ?>
  </pre>
</div -->

<!-- #Cirlce Ends -->
<style type="text/css">
  .full-height{
    height: 740px;
  }
</style>