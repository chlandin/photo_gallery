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
	/* $user->save(); */

    // update
    /* $user = User::find_by_id(4); */
    /* $user->password = "dfdfdfdfdf"; */
    /* /1* $user->update(); *1/ */
    /* $user->save(); */

    // delete
    /* $user = User::find_by_id(3); */
    /* $user->delete(); */

    /* $user = new Photograph(); */
	/* $user->filename = "johnsmith"; */
	/* $user->type = "abcd12345"; */
	/* $user->size = 23; */
	/* $user->caption = "Smith"; */
	/* $user->save(); */
?>

<?php include_layout_template('admin_footer.php'); ?>
       
