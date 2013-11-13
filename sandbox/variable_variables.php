<html>
    <head>
        <title>Variable Variables</title>
    </head>
    <body>
        <h3>Variable Variables</h3>
        <?php
            $a = 'hello';
            $hello = 'Hello everyone.';
            echo $a . '<br />';
            echo $hello . '<br />';

            echo $$a . '<br />';
        ?>
        <h3>Seats example</h3>
        <?php
            $a = 'Kevin';
            $b = 'Mary';
            $c = 'Joe';
            $d = 'Larry';
            $e = 'Audrey';

            $students = array('a', 'b', 'c', 'd', 'e');

            foreach ($students as $seat) {
                echo $$seat . '<br />';
            }
        ?>
        <h3>Order of evaluation</h3>
        <?php
            $a = 'Kevin';
            $b = 'Mary';
            $c = 'Joe';
            $d = array('x', 'y', 'z');
            $var = array('a', 'b', 'c', 'd');
            $var_d = 'd';

            echo ${$var[0]} . '<br />';
            echo ${$var_d}[0];
        ?>
    </body>
</html>
