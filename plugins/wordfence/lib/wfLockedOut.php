<?php wfUtils::doNotCache(); ?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>You are temporarily locked out</title>
</head>
<body>
<h1>You are temporarily locked out</h1>
<p style="width: 500px;">
	You have been temporarily locked out of this system. This means
	that you will not be able to sign-in or use several other features that may compromise security.
	Please try back in a short while.
	<ul>
	<li><a href="<?php echo site_url(); ?>">Return to the site home page</a></li>
	<li><a href="<?php echo admin_url(); ?>">Attempt to return to the admin login page (you may still be locked out)</a></li>
	</ul>
	<br /><br />
	<?php require('wfUnlockMsg.php'); ?>
</p>
<p style="font-style: italic;">Generated by Wordfence.</p>
</body>
</html>
<?php exit(); ?>