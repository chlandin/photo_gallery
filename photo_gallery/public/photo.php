<?php 
require_once("../inc/initialize.php"); 

if (empty($_GET['id'])) {
    $session->message("No photpgraph ID was provided.");
    redirect_to('index.php');
}

$photo = Photograph::find_by_id($_GET['id']);
if (!$photo) {
    $session->message("The photo could not be located.");
    redirect_to('index.php');
}

?>

<?php include_layout_template('header.php'); ?>

    <h2>Photo</h2>

    <a href="index.php">&laquo; Back</a>
    <br /><br />
    <img src="<?php echo $photo->image_path(); ?>" />
    <p><?php echo $photo->caption; ?></p>
    

<?php include_layout_template('footer.php'); ?>

