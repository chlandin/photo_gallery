<?php
require_once '../inc/functions.php';
require_once '../inc/database.php';
require_once '../inc/user.php';

$user = User::find_by_id(1);
echo $user->username;
echo "<br />";
echo $user->full_name();
echo '<pre>'; var_dump($user); echo '</pre>';

echo "<hr />";


$users = User::find_all();
foreach ($users as $user) {
    echo "User: " . $user->username . "<br />";
    echo "Name: " . $user->full_name() . "<br />";
}

?>
