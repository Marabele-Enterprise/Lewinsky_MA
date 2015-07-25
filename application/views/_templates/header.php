<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Med</title>

<!-- Google fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>

<!-- font awesome -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<!-- bootstrap -->
<link rel="stylesheet" href="<?php echo URL; ?>public/assets/bootstrap/css/bootstrap.min.css" />

<!-- animate.css -->
<link rel="stylesheet" href="<?php echo URL; ?>public/assets/animate/animate.css" />
<link rel="stylesheet" href="<?php echo URL; ?>public/assets/animate/set.css" />

<!-- gallery -->
<link rel="stylesheet" href="<?php echo URL; ?>public/assets/gallery/blueimp-gallery.min.css">

<!-- favicon -->
<link rel="shortcut icon" href="<?php echo URL; ?>public/assets/images/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php echo URL; ?>public/assets/images/favicon.ico" type="image/x-icon">


<link rel="stylesheet" href="<?php echo URL; ?>public/assets/style.css">
<script type="text/javascript" src="<?php echo URL; ?>public/js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>public/js/jquery.form.js"></script>
<!-- jquery -->
<script src="<?php echo URL; ?>public/assets/bootstrap/js/bootstrap.js" type="text/javascript" ></script>
</head>

<body>
<div class="topbar animated fadeInLeftBig"></div>
<!-- /#The following hidden inputs will be used by the js files to get access to the php variable -->
<input type="hidden" id="URLholder" value="<?php echo URL; ?>" />
<input type="hidden" id="LoginStatus" value="<?php echo (Session::get('user_logged_in') == true ? "true" : "false"); ?>" />
<input type="hidden" id="UserType" value="<?php echo Session::get('user_account_type'); ?>" />
<input type="hidden" id="target" value="<?php echo (isset($this->target) ? $this->target : "none"); ?>" />
<!-- Header Starts -->
<div class="navbar-wrapper">
      <div class="container">

        <div class="navbar navbar-default navbar-fixed-top" role="navigation" id="top-nav">
          <div class="container">
            <div class="navbar-header">
              <!-- Logo Starts -->
              <a class="navbar-brand" href="#home">
              	<h2><b style="color: rgb(33, 171, 202);">Medi</b>Suite</h2>
              	<!--img src="<?php echo URL; ?>public/assets/images/logo.png" alt="logo" -->
              </a>
              <!-- #Logo Ends -->


              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

            </div>


            <!-- Nav Starts -->
            <div class="navbar-collapse  collapse">
              <ul class="nav navbar-nav navbar-right scroll">
				<?php echo getAccountMenu(Session::get('user_logged_in'), Session::get('user_account_type'), (isset($this->isHome) ? $this->isHome : false)); ?>
              </ul>
            </div>
            <!-- #Nav Ends -->

          </div>
        </div>

      </div>
    </div>
<!-- #Header Starts -->
<?php 

function getAccountMenu($loginStat,$userType, $isHome)
{
	if($loginStat == true)
	{
		if($userType == "Developer")
		{
			return '<li>
					<a href="'.URL.'user/'.'profile" >
						Update Profile
					</a>	
				</li>
				<li>
					<a href=""  class="signOut">
						SIGN OUT
					</a>
				</li>';
		}
		else if($userType == "User")
		{
			return '
					<li>
						<a href="'.URL.'index/'.'index" >
							Home
						</a>	
					</li>
					<li>
						<a href="'.URL.'index/'.'welcome" >
							Dashboard
						</a>	
					</li>
					<li><a href="'.URL.'index/doctors" class="">Doctors</a></li>
					<li><a href="'.URL.'index/medical_aids" class="">Medical Aids</a></li>
					<li id="patients"><a href="'.URL.'index/patients" class="" title="Patient Accounts">Patients</a></li>
					<li><a href="'.URL.'index/aid_holder" class="" title="Medical Aid Holder">Customers</a></li>
					
					<li id="reports" class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Services<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="'.URL.'index/diagnosis" class="">Diagnosis</a></li>
							<li><a href="'.URL.'index/tariff_codes" class="">Tariff Codes</a></li>					
							<li id="icd_10"><a href="'.URL.'help/icd_10" class="" title="ICD 10 Codes">ICD 10 Codes</a></li>
							<li><a href="'.URL.'report/age_analysis" class="">Age Analysis</a></li>
							<li><a href="'.URL.'report/transaction_summary" class="">Transaction Summary</a></li>
							<li><a href="'.URL.'report/audit_trail" class="">Audit Trail</a></li>
							<li class="divider"></li>
							<li><a href="'.URL.'report/daily_listing" class="">Daily Listing</a></li>
							<li class="divider"></li>
							<li><a href="'.URL.'report/payment_profile" class="">Payment Profile</a></li>
							<li><a href="'.URL.'report/vat_report" class="">VAT report</a></li>
							<li><a href="'.URL.'report/statements" class="">Statements</a></li>
						</ul>
					</li>					
					<li>
						<a href="'.URL.'login/logout" >
							SIGN OUT
						</a>
					</li>';
		}
		else if($userType == "Customer" OR $userType == "Patient")
		{
			return '
					<li>
						<a href="'.URL.'index/'.'index" >
							Home
						</a>	
					</li>
					<li>
						<a href="'.URL.'index/'.'welcome" >
							Settings
						</a>	
					</li>
					<li>
						<a href="'.URL.'login/logout" >
							SIGN OUT
						</a>
					</li>';
		}	
		else if($userType == "Admin"){
			return '
					<li>
						<a href="'.URL.'login/logout" >
							SIGN OUT
						</a>
					</li>';
		}
		else
		{}
	}
	else
	{
		$link = ($isHome == true ? "" : URL."index/index/");
		return '				
		<li class="active"><a href="'.$link.'#intro">Home</a></li>
		<li ><a href="'.$link.'#about">About</a></li>
		<li ><a href="'.$link.'#partners">Partners</a></li>
		<li ><a href="'.$link.'#contact">Contact</a></li>		
		<li ><a href="'.URL.'register/index">Register</a></li>
		<li ><a href="'.URL.'login/index">Login</a></li>';
	}
}

?>
