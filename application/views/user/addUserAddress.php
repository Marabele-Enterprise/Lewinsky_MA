<?PHP

require_once("../include/functions.php");
require_once("../include/listValues.php"); 
if(!$fgmembersite->CheckLogin()) //This code segment checks if the user is logged in
{
    $fgmembersite->RedirectToURL("../");
    exit;
}

?>
<!DOCTYPE HTML>
<html>
<head>

<link rel="stylesheet" type="text/css" href="../css/style.css">
<link rel="stylesheet" type="text/css" href="../css/loginStyle.css">
<link href="img/truth.jpg" rel="shortcut icon" type="image/icon.jpg" />
<script src="../js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="../js/script.js"></script>

<!-- Menu included files-->
<?php echo getMenuFiles("pages"); ?>
<!-- Menu files end-->

<!-- photo Upload included files-->
<?php echo getPhotoUploadFiles(); ?>
<!-- photo Upload files end-->

<!-- slider included files-->
<?php //echo getSliderFiles("css"); ?>
<!-- slider files end-->

</head>
<body>
	<center>
		<?php echo getHeader("",$loginStat,$userType); ?>
		
		<div class="shell2" >
			<div class="container" >
				<?php echo getMenu("pages"); ?>
			</div>
			<div id="pageContentSlim" >
				<?php
					$id = $fgmembersite->UserID();
					$type = $fgmembersite->UserType();
					echo'
						<div class="randomBack title">	
							Create New Address
						</div>
						<div id="space" style="height: 9px; width: 650px; float: center">	
						</div>
						<div class="randomBack ourInfo" style="height: auto; width: 100%; float: center; ">	
							Fill in the details of your new address bellow
						</div>
						<div id="space" style="height: 9px; width: 650px; float: center">	
						</div>';

					echo '
						<form action="updateUser.php?ic='.$id.'&type='.$type.'" method="post" enctype="multipart/form-data" class="registerForm" style="width: 700px; height: auto; margin-bottom: 10px; " >
							<div class="randomBack ourInfo" style="height: auto; width: auto; float: left;">	
								<a href="'.$type.'AddressBook.php" id="inf" target="_self">
									BACK
								</a>
							</div>
							<div class="formContent" style="height: auto; width: 300px; margin: 0 auto; ">
								Address 1:<input type="text" name="Address1" id="Address1" placeholder="Address1"><br>
								Address 2:<input type="text" name="Address2" id="Address2" placeholder="Address2" ><br>
								Suburb/City:<input type="text" name="City" id="City" placeholder="City" ><br>
								Zip/Postal Code:<input type="text" name="ZipCode" id="ZipCode" placeholder="ZipCode" ><br>
								Province:<input type="text" name="Province" id="Province" placeholder="Province" ><br>
								Country:<select name="Country" id="Country" >'.getCountries().'</select></select><br>							
							</div>
							<center><input type="submit" name="addAddress" value="Create Address" class="registerBtr" style="width: auto;" ></center>
						</form>';		
				?>
			</div>
		</div>
		
		<script>
			/*    This script resizes the menu when screen size is decreased	*/
			//  The function to change the class
			var changeClass = function (r,className1,className2) {
				var regex = new RegExp("(?:^|\\s+)" + className1 + "(?:\\s+|$)");
				if( regex.test(r.className) ) {
					r.className = r.className.replace(regex,' '+className2+' ');
			    }
			    else{
					r.className = r.className.replace(new RegExp("(?:^|\\s+)" + className2 + "(?:\\s+|$)"),' '+className1+' ');
			    }
			    return r.className;
			};	

			//  Creating our button in JS for smaller screens
			var menuElements = document.getElementById('menu');
			menuElements.insertAdjacentHTML('afterBegin','<button type="button" id="menutoggle" class="navtoogle" aria-hidden="true"><i aria-hidden="true" class="icon-menu"> </i> Menu</button>');

			//  Toggle the class on click to show / hide the menu
			document.getElementById('menutoggle').onclick = function() {
				changeClass(this, 'navtoogle active', 'navtoogle');
			}

			// http://tympanus.net/codrops/2013/05/08/responsive-retina-ready-menu/comment-page-2/#comment-438918
			document.onclick = function(e) {
				var mobileButton = document.getElementById('menutoggle'),
					buttonStyle =  mobileButton.currentStyle ? mobileButton.currentStyle.display : getComputedStyle(mobileButton, null).display;

				if(buttonStyle === 'block' && e.target !== mobileButton && new RegExp(' ' + 'active' + ' ').test(' ' + mobileButton.className + ' ')) {
					changeClass(mobileButton, 'navtoogle active', 'navtoogle');
				}
			}
		</script>
		<!-- slider included files-->
			<?php //echo getSliderFiles("js"); ?>
		<!-- slider files end-->
		<footer>
			<div class="shell" >
				<?php echo getFooter(); ?>
			</div>
		</footer>
	</center>
	
</body>
</html>