<?php
require_once '../../inc/initialize.php';

/* if (!$session->is_logged_in()) { redirect_to("login.php"); } */
?>

<?php include_layout_template('admin_header.php'); ?>

<?php
    // create
	/* $user = new User(); */
	/* $user->username = "johnsmith"; */
	/* $user->password = "abcd12345"; */
	/* $user->first_name = "John"; */
	/* $user->last_name = "Smith"; */
	/* $user->create(); */

    // update
    /* $user = User::find_by_id(2); */
    /* $user->password = "newpassword"; */
    /* /1* $user->update(); *1/ */
    /* $user->save(); */

    // delete
    /* $user = User::find_by_id(2); */
    /* $user->delete(); */
?>

<?php include_layout_template('admin_footer.php'); ?>
       