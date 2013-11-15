    </div>
    <div id="footer">
        <p>Copyright <?php echo date("Y", time()); ?></p>
        <p><a href="admin/">admin</a></p>
    </div>
  </body>
</html>
<?php if(isset($database)) { $database->close_connection(); } ?>
