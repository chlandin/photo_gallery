<?php
require_once '../../inc/initialize.php';
if (!$session->is_logged_in()) { redirect_to("login.php"); }

$message = "";
if (isset($_POST['submit'])) {
    $photo = new Photograph();
    $photo->caption = $_POST['caption'];
    $photo->attach_file($_FILES['file_upload']);
    if ($photo->save()) {
        $message = "Photograph uploaded successfully.";
    } else {
        $message = join("<br />", $photo->errors);
    }
}

?>

<?php include_layout_template('admin_header.php'); ?>

    <h2>Photo Upload</h2>

    <?php echo output_message($message); ?>
    <form action="photo_upload.php" method="POST" enctype="multipart/form-data">
        <p><input type="file" name="file_upload"></p>
        <p>Caption: <input type="text" name="caption" value="" /></p>
        <input type="submit" name="submit" value="Upload" /> 
    </form>

<?php include_layout_template('admin_footer.php'); ?>
       