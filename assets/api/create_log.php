<?php
if(isset($_GET['name']))
{
    $var_1 = $_GET['name'];
//    $file = $var_1;

$dir = ""; // trailing slash is important
$file = $dir . $var_1;

var_dump(is_dir($dir));
echo '<br>';
var_dump(file_exists($file));

$myfile = fopen($file, "w") or die("Unable to open file!");
$txt = "John Doe\n";
fwrite($myfile, $txt);
$txt = "Jane Doe\n";
fwrite($myfile, $txt);
fclose($myfile);
// echo $file;
if (file_exists($file))
    {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($file));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
    readfile($file);
    exit;
    }
} //- the missing closing brace
?>