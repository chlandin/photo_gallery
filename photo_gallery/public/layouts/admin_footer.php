    </div>
    <div id="footer">
        <p>Copyright <?php echo date("Y", time()); ?></p>
    </div>
  </body>
</html>
<?php if(isset($database)) { $database->close_connection(); } ?>
