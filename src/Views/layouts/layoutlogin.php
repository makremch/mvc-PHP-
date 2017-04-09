
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin-Login </title>

    <!-- Bootstrap framework -->
    <link rel="stylesheet" href="<?php echo $request->getWebroot(); ?>bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo $request->getWebroot(); ?>bootstrap/css/bootstrap-responsive.min.css" />
    <!-- theme color-->
    <link rel="stylesheet" href="<?php echo $request->getWebroot(); ?>css/blue.css" />
    <!-- tooltip -->
    <link rel="stylesheet" href="<?php echo $request->getWebroot(); ?>lib/qtip2/jquery.qtip.min.css" />
    <!-- main styles -->
    <link rel="stylesheet" href="<?php echo $request->getWebroot(); ?>css/style.css" />

    <!-- Favicons and the like (avoid using transparent .png) -->
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="apple-touch-icon-precomposed" href="icon.png" />

    <link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>

    <!--[if lte IE 8]>
    <script src="<?php echo $request->getWebroot(); ?>js/ie/html5.js"></script>
    <script src="<?php echo $request->getWebroot(); ?>js/ie/respond.min.js"></script>
    <![endif]-->

    <!-- Shared on MafiaShare.net  --><!-- Shared on MafiaShare.net  --></head>
<body class="login_page">

<?php echo $main_content; ?>


</body>
</html>