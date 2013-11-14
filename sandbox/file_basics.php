<?php

echo __FILE__ . "<br />";
echo __LINE__ . "<br />";
echo dirname(__FILE__) . "<br />";
echo __DIR__ . "<br />";

echo file_exists(__DIR__ . "/cloning.php") ? "Yes" : "No";
echo "<br />";

echo is_file(__DIR__ . "/cloning.php") ? "Yes" : "No";
echo "<br />";

echo is_dir(__DIR__ . "/cloning.php") ? "Yes" : "No";
echo "<br />";

echo getcwd();
echo "<br />";


//write to files
// file access modes:
// r    read from start, file must exist
// w    overwrite from start, creates file if missing
// a    append, write from end
// x    write from start, error if file exists

$file = 'file_test.txt';
if ($handle = fopen($file, 'w')) {
    echo 'File opened' . '<br />';
    $content = "Title\n\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.";
    fwrite($handle, $content);
    fclose($handle);
} else {
    echo 'Could not open file for writing.';
}

// file_put_contents(): short for fopen/fwrite/fclose
// overwrites by default 'w'
$file2 = 'file_test2.txt';
$text = "111\n222\n333";
if ($size = file_put_contents($file2, $text)) {
    echo "A file of {$size} bytes was created.<br />";
}

// delete file (must be closed)
// unlink($file2);

// read files
$file = 'file_test.txt';
if ($handle = fopen($file, 'r')) {
    echo "File {$file} opened" . "<br />";
    $content = fread($handle, 50); // each char is 1 byte
    fclose($handle);
}

echo $content . '<br />';
echo nl2br($content) . '<br />';

// use filesize() to read whole file
$file = 'file_test.txt';
if ($handle = fopen($file, 'r')) {
    echo "File {$file} opened" . "<br />";
    $content = fread($handle, filesize($file));
    fclose($handle);
}

echo $content . '<br />';
echo nl2br($content) . '<br />';


// file_get_contents(): short for fopen/fread/fclose
$file_content = file_get_contents($file2);
echo $file_content . '<br />';


// read directories
// opendir()
// readdir()
// closedir()

$dir = ".";

if (is_dir($dir)) {
    if ($dir_handle = opendir($dir)) {
        while ($filename = readdir($dir_handle)) {
            echo "filename: {$filename}<br />";
        }
        closedir($dir_handle);
    }
}

// scandir() reads all filenames into an array
if (is_dir($dir)) {
    $dir_array = scandir($dir);
    echo '<pre>'; var_dump($dir_array); echo '</pre>';
    foreach ($dir_array as $file) {
        if (stripos($file, '.') > 0) { // exclude dotfiles
            echo "filename: {$file}<br />";
        }
    }
}

?>
