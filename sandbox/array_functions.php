<html>
    <head>
        <title>Array Functions</title>
    </head>
    <body>
        <h3>Array Shift</h3>
        <?php
            $numbers = array(1, 2, 3, 4, 5, 6);
            print_r($numbers);
            echo '<br /><br />';

            // shifts first element out of an array
            // and returns it.
            $a = array_shift($numbers);
            echo 'a:' . $a . '<br />';
            print_r($numbers);
            echo '<br /><br />';

            // prepends an element to an array, 
            // returns the element count.
            $b = array_unshift($numbers, 'first');
            echo 'b:' . $b . '<br />';
            print_r($numbers);
            echo '<br /><br />';
        ?>
        <h3>Array pop/push</h3>
        <?php
            print_r($numbers);
            echo '<br /><br />';

            // pops last element out of an array
            // and returns it.
            $a = array_pop($numbers);
            echo 'a:' . $a . '<br />';
            print_r($numbers);
            echo '<br /><br />';

            // pushes an element toth end of an array, 
            // returns the element count.
            $b = array_push($numbers, 'last');
            echo 'b:' . $b . '<br />';
            print_r($numbers);
            echo '<br /><br />';
        ?>
    </body>
</html>
