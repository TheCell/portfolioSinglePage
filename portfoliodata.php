<?php
$directory = './portfoliodata';
$jsonOptions = JSON_PRETTY_PRINT;
// JSON_OPTIONS is a bitmask consisting of:
//   JSON_HEX_QUOT, JSON_HEX_TAG, JSON_HEX_AMP, JSON_HEX_APOS, JSON_NUMERIC_CHECK, 
//   JSON_PRETTY_PRINT, JSON_UNESCAPED_SLASHES, JSON_FORCE_OBJECT, JSON_PRESERVE_ZERO_FRACTION, 
//   JSON_UNESCAPED_UNICODE, JSON_PARTIAL_OUTPUT_ON_ERROR
$arr = dir2json($directory);

$json = json_encode($arr, $jsonOptions);
echo $json;

// ------------------------------------------------------
// dir2json - v0.1.1b
//
// by Ryan, 2015
// http://www.ryadel.com/
// ------------------------------------------------------
function dir2json($dir)
{
    $a = [];
    if($handler = opendir($dir))
    {
        while (($content = readdir($handler)) !== FALSE)
        {
            if ($content != "." && $content != ".." && $content != "thumbnails")
            {
                if(is_file($dir . "/" . $content))
                {
                    $a[] = $dir . "/" . $content;
                }
                else if(is_dir($dir . "/" . $content))
                {
                    $a[$content] = dir2json($dir . "/" . $content);
                }
            } 
        }    
        closedir($handler); 
    } 
    return $a;    
}
?>
