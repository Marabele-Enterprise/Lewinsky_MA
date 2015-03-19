<?php  $for="sub";
	require_once("../head.php");

if(!$loginStat) //This code segment checks if the user is logged in
{
    $fgmembersite->RedirectToURL("../index.php");
    exit;
}

if(strcmp($fgmembersite->UserType(),'Artist') == 0)
{
	//Artist Logged in
}
else
{
	//Customer Logged in
	$fgmembersite->RedirectToURL("customerView.php");
}

?>
<?php require_once("../pageTop.php"); ?>
	<div id="pageContent" >
				<?php
					$id = $fgmembersite->UserID();
					$DETAILS = array();
					$DETAILS = getUserIDDetails($id);
					
					echo'
						<h1>	
							Your Account Details '.$DETAILS["Name"].'
						</h1>
						<h2>	
							You may make changes to your account details. Click "Update Details" when you are done.
						</h2>
						<div class="sitePromo" style="height: 510px; width: 637px;">
							<form method="post" enctype="multipart/form-data" id="updateUserForm" class="registerForm" style="width: 700px; height: auto; margin-bottom: 10px; " >
								<div class="formContent" style="height: auto; width: 359px; margin: 0 auto; ">
									Name: <input type="text" name="Name" id="Name" placeholder="Name" value="'.$DETAILS["Name"].'" ><br>
									Surname: <input type="text" name="Surname" id="Surname" placeholder="Surname" value="'.$DETAILS["Surname"].'" ><br>
									Phone Number: <input type="tel" name="Phone" id="Phone" placeholder="Phone" value="'.$DETAILS["phoneNumber"].'" ><br>
									Email: <input type="email" name="email" id="email" placeholder="Email" autocomplete="off" value="'.$DETAILS["email"].'" ><br>
									Password: <input type="password" name="password" id="password" placeholder="Password" title="Leave blank to keep current password."><br>
									Confirm Password: <input type="password" name="cpassword" id="cpassword" placeholder="Password" title="Leave blank to keep current password." ><br>
									<input type="hidden" name="usertype" id="usertype" value="Artist" />
									<input type="hidden" name="userid" id="userid" value="'.$id.'" />
									<input type="hidden" name="updatetype" id="updatetype" value="details" />
									<div style="font-size: 12px;">(Leave password fields blank to keep current password)</div>
									<center><input type="submit" name="updateCustomer" value="Update Details" class="registerBtr" style="width: auto; " /><img src="../img/loading.gif" class="loadingImage" /></center>
									<span class="error"></span><span class="success"></span>
								</div>
							</form>
						</div>
						';
				?>
			</div>
<?php require_once("../pageBottom.php")?>