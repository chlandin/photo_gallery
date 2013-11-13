<?php

/**
 * 
 */
class Person {

    var $first_name;
    var $last_name;
    var $arm_count = 2;
    var $leg_count = 2;

    function say_hello() {
        echo "Hello from inside the class " . get_class($this) . ".<br />";
    }
    
    function hello() {
        $this->say_hello();
    }

    function full_name() {
        return $this->first_name . " " . $this->last_name;
    }
    
}

$person1 = new Person();
$person1->say_hello();
$person1->hello();

echo $person1->arm_count . '<br />';

$person1->first_name = 'First';
$person1->last_name = 'Last';
echo $person1->full_name() . '<br />';

/* $customer = $person1; */
/* $customer->say_hello(); */

/* $classes = get_declared_classes(); */

/* foreach ($classes as $class) { */
/*     echo $class . "<br />"; */
/* } */

if (class_exists("Person")) {
    echo "That class has been defined.<br />";
} else {
    echo "Class not defined!<br />";
}

$methods = get_class_methods('Person');

foreach ($methods as $method) {
    echo $method . '<br />';
}

echo (method_exists('Person', 'say_hello') ? 'Yes!' : 'No!');

echo '<br />';

echo get_class($person1) . '<br />';

echo (is_a($person1, 'Person') ? 'Yes!' : 'No!') . '<br />';

$vars = get_class_vars('Person');
foreach ($vars as $var => $value) {
    echo "{$var} : {$value}<br />";
}

echo property_exists('Person', 'first_name') ? 'true' : 'false';

?>
