<?php
require_once '../../inc/functions.php';
require_once '../../inc/session.php';
if (!$session->is_logged_in()) { redirect_to("login.php"); }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset=utf-8">
        <title>Photo Gallery</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="../css/styles.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <!--<script src=".js"></script>-->
    </head>
    <body>
        <div id="header">
            <h1>Photo Gallery</h1>
        </div>
        <div id="main">
            <h2>Menu</h2>
        </div>
        <div id="footer">
            Copyright <?php echo date("Y", time()) ?>
        </div>
    </body>
</html>
