<?php 
require_once("../../inc/initialize.php");
if (!$session->is_logged_in()) { redirect_to("login.php"); }

if (empty($_GET['id'])) {
    $session->message("No comment ID was provided.");
    redirect_to('list_photos.php');
}

$comment = Comment::find_by_id($_GET['id']);
if ($comment && $comment->delete()) {
    $session->message("The comment was deleted.");
    redirect_to("comments.php?id={$comment->photograph_id}&page={$_GET['page']}");
} else {
    $session->message("The comment could not be deleted.");
    redirect_to('list_photos.php');
}

if (isset($db)) {
    $db->close_connection();
}

?>

