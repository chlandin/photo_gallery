<?php
require_once '../../inc/initialize.php';
if (!$session->is_logged_in()) { redirect_to("login.php"); }

// current page number
$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;

// records per page
$per_page = 2;

// total record count
$total_count = Photograph::count_all();

// Find all photos
// $photos = Photograph::find_all();

$pagination = new Pagination($page, $per_page, $total_count);

$sql = "SELECT * FROM photographs ";
$sql .= "LIMIT {$per_page} ";
$sql .= "OFFSET {$pagination->offset()}";
$photos = Photograph::find_by_sql($sql);

?>

<?php include_layout_template('admin_header.php'); ?>

<a href="index.php">&laquo; Back</a><br />
<br />

    <h2>Photographs</h2>
    
    <?php echo output_message($message); ?>
    <table class="bordered">
        <tr>
            <th>Image</th>
            <th>Filename</th>
            <th>Caption</th>
            <th>Size</th>
            <th>Type</th>
            <th>Comments</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($photos as $photo): ?>
            <tr>
            <td><img src="../<?php echo $photo->image_path(); ?>" width="100"</td>
                <td><?php echo $photo->filename; ?></td>
                <td><?php echo $photo->caption; ?></td>
                <td><?php echo $photo->size_as_text(); ?></td>
                <td><?php echo $photo->type; ?></td>
                <td>
                    <a href="comments.php?id=<?php echo $photo->id; ?>&page=<?php echo $page; ?>">
                        <?php echo count($photo->comments()); ?></td>
                    </a>
                <td><a href="delete_photo.php?id=<?php echo $photo->id; ?>">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br />
    <div id="pagination" style="clear:both;">
        <?php
            if ($pagination->total_pages() > 1) {
                if ($pagination->has_previous_page()) {
                    echo "<a href=\"list_photos.php?page=";
                    echo $pagination->previous_page();
                    echo "\">&laquo; Previous</a> ";
                }
                for ($i = 1; $i <= $pagination->total_pages(); $i++) {
                    if ($i == $page) {
                        echo " <span class=\"selected\">{$i}</span> ";
                    } else {
                        echo " <a href=\"list_photos.php?page={$i}\">{$i}</a> ";
                    }
                }
                if ($pagination->has_next_page()) {
                    echo " <a href=\"list_photos.php?page=";
                    echo $pagination->next_page();
                    echo "\">Next &raquo;</a> ";
                }
            }
        ?>
    </div>
    <a href="photo_upload.php">Upload a new photograph</a>
    

<?php include_layout_template('admin_footer.php'); ?>
       
