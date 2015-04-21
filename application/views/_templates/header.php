<!DOCTYPE html>
<html lang="en">
	<head>
	<title><?php echo SITENAME; ?> | Home</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link rel="icon" href="http://dzyngiri.com/favicon.png" type="image/x-icon">
	<link rel="shortcut icon" href="http://dzyngiri.com/favicon.png" type="image/x-icon" />
	<meta name="description" content="Marabele enterprise, software and design firm.">
	<meta name="keywords" content="software, responsive, bootstrap, responsive">
	<meta name="author" content="Inbetwin Networks">  

	<!-- Main Style -->
	<link href="<?php echo URL; ?>public/css/main.css" rel="stylesheet">

	<!-- Responsive --><!-- Bootstrap -->
	<link href="<?php echo URL; ?>public/plugins/bootstrap-3.3.2/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo URL; ?>public/plugins/bootstrap-3.3.2/css/bootstrap-theme.min.css" rel="stylesheet">
	
	<script type="text/javascript" src="<?php echo URL; ?>public/js/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="<?php echo URL; ?>public/js/jquery.form.js"></script>
</head>

<body>
<!-- header start -->
<header>
<div class="container-fluid">
	<div class="row">
		<nav class="navbar navbar-default" role="navigation" scoped style="margin-bottom: 0px;" >
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#"><?php echo SITENAME; ?><!--img alt="" src="<?php echo URL; ?>public/img/logo.jpg" style="max-width: 120px; margin-top: -27px;" --></a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<!--li class="active"><a href="<?php echo URL; ?>index/index" >Home <span class="sr-only">(current)</span></a></li>
						<li><a href="<?php echo URL; ?>index/patients" class="" title="Patient Accounts" >Patients</a></li>
						<li><a href="<?php echo URL; ?>index/aid_holder" class="" title="Medical Aid Holder" >Aid Holder</a></li>
						<li><a href="<?php echo URL; ?>index/doctors" class="" >Doctors</a></li>
						<li><a href="<?php echo URL; ?>index/medical_aids" class="" >Medical Aids</a></li>
						<li><a href="<?php echo URL; ?>index/tariff_codes" class="" >Tariff Codes</a></li>
						<li><a href="<?php echo URL; ?>index/diagnosis" class="" >Diagnosis</a></li>
						<!--li><a href="<?php echo URL; ?>index/messages" class="" >Messages</a></li-->
						<li id="services" class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Services<span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="<?php echo URL; ?>index/doctors" class="">Doctors</a></li>
								<li><a href="<?php echo URL; ?>index/medical_aids" class="">Medical Aids</a></li>
								<li><a href="<?php echo URL; ?>index/aid_holder" class="" title="Medical Aid Holder">Medical Aid Holder</a></li>
								<li class="divider"></li>
								<li><a href="<?php echo URL; ?>index/diagnosis" class="">Diagnosis</a></li>
								<li><a href="<?php echo URL; ?>index/tariff_codes" class="">Tariff Codes</a></li>
								<li class="divider"></li>
								<li><a href="<?php echo URL; ?>index/messages">Text Messages</a></li>
								<li><a href="<?php echo URL; ?>index/statement_messages">Statement Messages</a></li>
							</ul>
						</li>
						<li id="patients"><a href="<?php echo URL; ?>index/patients" class="" title="Patient Accounts">Patients</a></li>
						<li id="reports" class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Reports<span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="<?php echo URL; ?>report/age_analysis" class="">Age Analysis</a></li>
								<li><a href="<?php echo URL; ?>report/transaction_summary" class="">Transaction Summary</a></li>
								<li><a href="<?php echo URL; ?>report/audit_trail" class="">Audit Trail</a></li>
								<li class="divider"></li>
								<li><a href="<?php echo URL; ?>report/daily_listing" class="">Daily Listing</a></li>
								<li class="divider"></li>
								<li><a href="<?php echo URL; ?>report/payment_profile" class="">Payment Profile</a></li>
								<li><a href="<?php echo URL; ?>report/vat_report" class="">VAT report</a></li>
								<li><a href="<?php echo URL; ?>report/statements" class="">Statements</a></li>
							</ul>
						</li>
						<li id="icd_10"><a href="<?php echo URL; ?>help/icd_10" class="" title="ICD 10 Codes">ICD 10 Codes</a></li>
					</ul>
					
					<ul class="nav navbar-nav navbar-right">
						<!--li><a href="#">Link</a></li -->
						<li><a href="#"><?php echo (Session::get("user_logged_in") == "true" ? Session::get("username") : "Not Authorized"); ?></a></li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
	</div>
	
</div>
</header>
<!-- /#The following hidden inputs will be used by the js files to get access to the php variable -->
<input type="hidden" id="URLholder" value="<?php echo URL; ?>" />
<input type="hidden" id="LoginStatus" value="<?php echo (Session::get('user_logged_in') == true ? "true" : "false"); ?>" />
<input type="hidden" id="UserType" value="<?php echo Session::get('user_account_type'); ?>" />
<input type="hidden" id="target" value="<?php echo (isset($this->target) ? $this->target : "none"); ?>" />
<?php 

function getAccountMenu($loginStat,$userType)
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
		else if($userType == "Customer")
		{
			return '
					<li>
						<a href="'.URL.'artzone/'.'artists" >
							Get Custom Art
						</a>	
					</li>
					<li>
						<a href="'.URL.'artzone/'.'viewOrders" >
							Order Status
						</a>	
					</li>
					<li>
						<a href="'.URL.'artzone/'.'manageGallery" >
							Manage Your Gallery
						</a>	
					</li>
					<li>
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
		else if($userType == "Business")
		{
			return '
					<li  title="Upload and Update artworks you have created for auction.">
						<a href="'.URL.'artzone/'.'manageGallery" >
							Manage Your Gallery
						</a>	
					</li>
					<li  title="See the custom art that people want you to create for them." >
						<a href="'.URL.'artzone/'.'viewArtworkRequests" >
							View Commission Art Requests
						</a>	
					</li>
					<li  title="View the custom art request that you have to complete" >
						<a href="'.URL.'artzone/'.'dueOrders" >
							View Due Commission Art
						</a>		
					</li>
					<li>
						<a href="'.URL.'user/'.'profile" >
							Update Profile
						</a>	
					</li>
					<li  title="View the orders you have successfully completed." >
						<a href="'.URL.'artzone/'.'artistCompletedOrders" >
							Completed Orders
						</a>	
					</li>
					<li>
						<a href="#"  class="signOut">
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
		return '
		<li><a href="#login" class="signIn" data-toggle="modal" data-target="#mdlLogin" >Login</a></li>
		<li><a href="#signup" class="signUp" data-toggle="modal" data-target="#mdlRegister" >Register</a></li>';
	}
}

?>
