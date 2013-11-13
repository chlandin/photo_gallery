<html>
    <head>
        <title>Dates and Times: Unix</title>
    </head>
    <body>
        <h3>Building Dates and Times</h3>
        <?php
            echo time();
            echo "<br />";
            // mktime = hour, minute, sec, month, day, year
            echo mktime(2, 30, 45, 10, 1, 2009);
            echo "<br />";
            // checkdate()
            echo checkdate(12,31,2000) ? 'true' : 'false';
            echo "<br />";
            echo checkdate(2,31,2000) ? 'true' : 'false';
            echo "<br />";

            $unix_timestamp = strtotime("now");
            echo $unix_timestamp . "<br />";

            $unix_timestamp = strtotime("+1 day");
            echo $unix_timestamp . "<br />";

            $unix_timestamp = strtotime("last Monday");
            echo $unix_timestamp . "<br />";
        ?>
        <h3>Format Dates and Times</h3>
        <?php
            $timestamp = time();
            echo strftime("The date today is %d/%m/%y", $timestamp);
            echo "<br />";

            function strip_zeros_from_strftime($marked_string="") {
                // remove the marked zeros
                $no_zeros = str_replace('*0', '', $marked_string);
                // then remove any remaining marks
                $cleaned_string = str_replace('*', '', $no_zeros);
                return $cleaned_string;
            }
		
            echo strip_zeros_from_strftime(strftime("The date today is *%d/*%m/%y", $timestamp));

            echo "<br /><h3>time() -> mysql datetime</h3>";
		
            $dt = time();
            $mysql_datetime = strftime("%Y-%m-%d %H:%M:%S", $dt);
            echo $mysql_datetime;
        ?>
    </body>
</html>
