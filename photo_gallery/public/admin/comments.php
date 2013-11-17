<?php 
require_once("../../inc/initialize.php"); 

if (empty($_GET['id'])) {
    $session->message("No photpgraph ID was provided.");
    redirect_to('list_photos.php');
}

$photo = Photograph::find_by_id($_GET['id']);
if (!$photo) {
    $session->message("The photo could not be located.");
    redirect_to('list_photos.php');
}

$comments = $photo->comments();

?>

<?php include_layout_template('admin_header.php'); ?>

<a href="list_photos.php?page=<?php echo $_GET['page']; ?>">&laquo; Back</a>
<br /><br />

<div style="margin-left: 20px">

    <h2>Comments on <?php echo $photo->filename; ?></h2>
    <?php echo output_message($message); ?>
    
    <img src="../<?php echo $photo->image_path(); ?>" width="200" />
    <p><?php echo $photo->caption; ?></p>
</div>

<div id="comments">
    <?php foreach($comments as $comment): ?>
        <div class="comment" style="margin-bottom: 2em;">
            <div class="author">
                <?php echo htmlentities($comment->author); ?> wrote:
            </div>
            <div class="body">
                <?php echo strip_tags($comment->body, '<strong><em><p>'); ?>
            </div>
            <div class="meta-info" style="font-size: 0.8em;">
                <?php echo datetime_to_text($comment->created); ?>
            </div>
            <div class="actions" style="font-size: 0.8em">
                <a href="delete_comment.php?id=<?php echo $comment->id; ?>&page=<?php echo $_GET['page']; ?>">Delete Comment</a>
            </div>
        </div>
    <?php endforeach; ?>
    <?php if(empty($comments)) { echo "No Comments."; } ?>
</div>

<?php include_layout_template('admin_footer.php'); ?>

