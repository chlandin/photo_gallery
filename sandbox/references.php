<html>
	<head>
		<title>References</title>
	</head>
	<body>
        <h3>Reference Assignment</h3>
        <?php
        
            $a = 1;
            $b = $a;
            $b = 2;
            echo "a:{$a} / b: {$b}<br />";
            // returns 1/2

            $a = 1;
            $b =& $a;
            $b = 2;
            echo "a:{$a} / b: {$b}<br />";
            // returns 2/2
            
            unset($b);
            echo "a:{$a} / b: {$b}<br />";
        
        ?>

        <h3>References as function arguments</h3>
        <?php

            function ref_test1($var) {
                $var = $var * 2;
            }

            function ref_test2(&$var) {
                $var = $var * 2;
            }

            function ref_test3() {
                global $a;
                $a = $a * 2;
            }

            $a = 10;
            ref_test1($a);
            echo $a . '<br />';

            $a = 10;
            ref_test2($a);
            echo $a . '<br />';

            $a = 10;
            ref_test3($a);
            echo $a;
        ?>

        <h3>References as function return values</h3>
        <?php
            
            function &ref_return() {
                global $a;
                $a = $a * 2;
                return $a;
            }

            $a = 10;
            $b =& ref_return();

            echo "a: {$a} / b: {$b}<br />";
            $b = 30;
            echo "a: {$a} / b: {$b}<br />";

            function &increment() {
                static $var = 0;
                $var++;
                return $var;
            }
            
            $a =& increment(); // var increments
            increment(); // var increment
            $a++; // var increment
            increment(); // var increment
            echo "a: {$a}<br />"; // 4 ($a incremented with $var)
        ?>
	</body>
</html>
