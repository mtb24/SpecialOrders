<?php

session_start();
if ( !isset( $_SESSION["isAdminLogged"] ) )
	$_SESSION["isAdminLogged"] = false;

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Special Orders</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<meta http-equiv="Cache-control" content="no-cache">
		<meta http-equiv="Cache-control" content="no-store">
		<meta http-equiv="Cache-control" content="must-revalidate">
		<meta http-equiv="pragma" content="no-cache">
		<meta name="expires" content="0">
		<!-- stylesheets -->
		<link rel="stylesheet" type="text/css" href="resources/css/reset.css" />
		<link rel="stylesheet" type="text/css" href="resources/css/style.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="resources/css/style_full.css" />
		<link rel="stylesheet" type="text/css" href="resources/css/colors/blue.css" id="color" />
		<link rel="stylesheet" type="text/css" href="resources/css/specialOrders.css" />
		<!-- <link rel="stylesheet" type="text/css" href="resources/css/jquery.validity.css" /> -->
		<!-- scripts (jquery) -->
		<script type="text/javascript" src="resources/scripts/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="resources/scripts/jquery.tools.min.js"></script>

		<script type="text/javascript">
			$(document).ready(function () {
				style_path = "resources/css/colors";

				$("#date-picker").datepicker();

				$("#box-tabs, #box-left-tabs").tabs();

			});
		</script>
	</head>
	<body>
		<!-- header -->
		<div id="header">
			<!-- logo -->
			<div id="logo">
				<h1>Special Orders</h1>
			</div>
			<!-- end logo -->
			<!-- user -->
			<ul id="user">

			       <li class=""><a href="resources/docs/MBOS-Order-Instructions.pdf">Instructions</a></li>

<?php
if ( $_SESSION["isAdminLogged"] === true ) {
	//echo '                    <li><a href="" id="showNewOrders">New Orders (<span id="newOrdersNumber">0</span>)</a></li>';
	echo "			<li><a id=\"admin-change-password\">Change Password</a></li>\n";
}
if ( $_SESSION["isAdminLogged"] === true || $_SESSION["isWarehouseLogged"] === TRUE || $_SESSION["isStoreLogged"] === TRUE ) {
	echo "			<li><a href=\"login.php?logout\">Logout</a></li>\n";
}
else
	echo "			<li><a id=\"admin-login\">Login</a></li>\n";
?>
			</ul>

			<!-- end user -->
			<div id="header-inner">
				<!-- Tabs -->
				<ul id="quick">
					<li>
						<a id="PAOrder" href="#" title="Parts and Accessories Orders"><span class="normal">Parts & Accessories</span></a>
					</li>
					<li>
						<a class="bikeOrder" href="#" title="New Bike Orders"><span class="normal">Bikes/Frames</span></a>
					</li>
					<li>
						<a id="warranty" href="#" title="Warranty Orders"><span class="normal">Warranty</span></a>
					</li>
					<li>
						<a id="checkStatus" href="#" title="Search Orders"><span>Order Status</span></a>
					</li>
<?php
if ( $_SESSION["isAdminLogged"] === TRUE || $_SESSION["isWarehouseLogged"] === TRUE || $_SESSION["isStoreLogged"] === TRUE  ) {
	echo "					<li>\n";
	echo "						<a id=\"admin\" href=\"#\" title=\"orderAdmin\"><span class=\"icon\"><img src=\"resources/images/icons/application_double.png\" alt=\"Manage Orders\" /></span><span>Order Admin</span></a>\n";
	echo "					</li>\n";
}
if ( $_SESSION["isAdminLogged"] === true ) {
	echo "                                    <li>\n";
	echo "                                            <a id=\"adminSettings\" href=\"#\" title=\"manageSettings\"><span class=\"icon\"><img src=\"resources/images/icons/cog.png\" alt=\"Manage Settings\" /></span><span>Settings</span></a>\n";
	echo "                                            <ul style=\"visibility: hidden; display: block;\">";
	echo "                                                <li><a id=\"edit_status_codes\" class=\"adminSettings\" href=\"#\">Edit Status Codes</a></li>";
	echo "                                                <li><a id=\"edit_stores\" class=\"adminSettings\" href=\"#\">Edit Stores</a></li>";
	echo "                                                <li><a id=\"edit_email_list\" class=\"adminSettings\" href=\"#\">Edit Email Recipients</a></li>";
	//      echo "                                                <li class=\"last\"><a id=\"edit_email_template\" class=\"adminSettings\" href=\"#\">Edit Email Templates</a></li>";
	echo "                                            </ul>";
	echo "                                    </li>\n";
}
?>
				</ul>
				<!-- end quick -->
				<div class="corner tl"></div>
				<div class="corner tr"></div>
			</div>
		</div>
      <!-- end header -->
		<!-- content -->
		<div id="content">
			<!-- table -->
			<div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Orders</h5>
<?php
if ( $_SESSION["isAdminLogged"] === true ) {
	//echo "    <div class=\"sorting\"><a href=\"#\" id=\"new_bike_order\">View Bike Orders Only</a></div>";
}
?>
					<div class="search"></div>
				</div>
				<!-- end box / title -->
				<div id="status" class="messages"></div>
				<div class="table">

				</div>
				<!-- end table -->
				<div><center><img src="resources/images/mblogo_comb_rgb_424x98.gif" height="98" width="424" style="margin-top:50px;" /></center></div>
				<div style="text-align:center;font-size:1.5em;color:#003282;"><strong>For The Ride of Your Life</strong></div>
			</div>
			<!-- end box -->
		</div>
		<!-- end content -->
		<!-- footer -->
		<div id="footer">
			<p>Copyright &copy; 2010 Headlands Ventures, LLC. All Rights Reserved.</p>
		</div>
		<!-- end footer -->
      <!-- dialogs -->
		<div id="dialog-login" title="Login" style="display:none;">
			<p>Please enter your login credentials.</p>
			<form id="dialog-login-form" action="login.php" method="post">
			<div class="form">
				<div class="fields">
					<div class="field field-first">
						<div class="label">
							<label for="input">Username:</label>
						</div>
						<div class="input">
							<input type="text" id="user-name" name="dialog-username" />
						</div>
					</div>
					<div class="field">
						<div class="label">
							<label for="input">Password:</label>
						</div>
						<div class="input">
							<input type="password" id="user-password" name="dialog-password" />
						</div>
					</div>
				</div>
			</div>
			</form>
		</div>
		<div id="dialog-change-password" title="Change Password" style="display:none;">
			<p>Please enter the new password.</p>
			<form id="dialog-change-password-form" action="login.php" method="post">
			<div class="form">
				<div class="fields">
					<div class="field field-first">
						<div class="label">
							<label for="input">New Password:</label>
						</div>
						<div class="input">
							<input type="password" id="new-password" name="dialog-new_password" />
						</div>
					</div>
				</div>
			</div>
			</form>
		</div>

		<!-- Inintial popup window -->
		<div id="popUpModal">
			<div>
				<h2>MB Order System</h2>
				<p class="firstParagraph"><strong>Updates to the Order System</strong></p>
				<p class="secondParagraph">Please review the *<a href="resources/docs/MBOS-new-changes.pdf">NEW CHANGES</a>*</p>
				<p class="thirdParagraph">We hope that these new changes help to improve the ordering process for both you and your customer. We want to get all orders processed as quickly and efficiently as possible.</p>
				<p class="forthParagraph">The "Instructions" link at the top of the page has <a href="resources/docs/MBOS-Order-Instructions.pdf">instructions</a> for using the <br />Mike's Bikes Order System (MBOS)</p>
				<!-- yes/no buttons -->
				<p><button class="close"> Close </button></p>
			</div>
		</div>

		<!-- confirmation dialog for sanitize credit card number -->
		<div id="confirmModal" style="display:none;">
			<div>
				<h2>Delete Credit Card?</h2>
				<p class=""><strong>Credit Card number will be deleted if you continue...<br />Are you sure?</strong></p>
			</div>
		</div>
      <!-- end dialogs -->
	</body>
		<!--[if IE]><script language="javascript" type="text/javascript" src="resources/scripts/excanvas.min.js"></script><![endif]-->
		<script src="resources/scripts/jquery-ui-1.8.custom.min.js" type="text/javascript"></script>
		<script src="resources/scripts/jquery.ui.selectmenu.js" type="text/javascript"></script>
		<script src="resources/scripts/tiny_mce/jquery.tinymce.js" type="text/javascript"></script>
		<script src="resources/scripts/jquery.dataTables.min.js" type="text/javascript"></script>
		<script src="resources/scripts/jquery.jeditable.mini.js" type="text/javascript"></script>
		<script src="resources/scripts/jquery.jeditable.datepicker.js" type="text/javascript"></script>
		<script src="resources/scripts/jquery.formrestrict.js" type="text/javascript"></script>
		<script src="resources/scripts/jquery.alphanumeric.js" type="text/javascript"></script>
		<!-- scripts (template) -->
		<script src="resources/scripts/smooth.js" type="text/javascript"></script>
		<script src="resources/scripts/smooth.menu.js" type="text/javascript"></script>
		<script src="resources/scripts/tiny_mce/jquery.tinymce.js" type="text/javascript"></script>
		<!-- scripts (custom) -->
		<script src="resources/scripts/creditcard.js" type="text/javascript"></script>
		<script src="resources/scripts/specialorders.js" type="text/javascript"></script>
		<!-- scripts (form validation) -->
		<script src="resources/scripts/jQuery.validity.js" type="text/javascript"></script>
</html>
