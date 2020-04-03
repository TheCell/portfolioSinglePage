<?php
//var_dump(getImagepathsForThumbnails($directory));
createThumbnails('./portfoliodata/', './thumbnails/');
//createThumbnail('./portfoliodata/Enhanced Tshirt/main.png', 'testsave', './thumbnails/');

function getImagepathsForThumbnails($dir)
{
    $a = []; // key value pairs. key = name, value = path to thumbnail
    if($handler = opendir($dir))
    {
        while (($content = readdir($handler)) !== FALSE)
        {
            if ($content != "." && $content != ".." && $content != "thumbnails")
            {
                if(is_file($dir . "/" . $content))
                {
                    if (strpos($content, 'main.') !== false)
                    {
                        $completePath = dirname($dir . '/' . $content);
                        $follderpathNames = explode('/', $completePath);
                        $a[$follderpathNames[count($follderpathNames) - 1]] = $dir . '/' . $content;
                    }
                }
                else if(is_dir($dir . "/" . $content))
                {
                    $temparr = getImagepathsForThumbnails($dir . "/" . $content);
                    $a = array_merge($a, $temparr);
                }
            } 
        }    
        closedir($handler); 
    }
    return $a;
}

function createThumbnails($dir, $writepath)
{
    $listOfImagePaths = getImagepathsForThumbnails($dir);
    foreach ($listOfImagePaths as $name => $path)
    {
        createThumbnail($path, $name, $writepath);
    }
}

// thanks to https://www.webmasterpro.de/coding/article/thumbnails-erstellen-mit-php.html
function createThumbnail($imgpath, $savename, $writepath)
{
    $imagesize = getimagesize($imgpath);
    $imagewidth = $imagesize[0];
    $imageheight = $imagesize[1];
    $imagetype = $imagesize[2];

    switch ($imagetype)
    {
        // meaning of $imagetype:
        // 1 = GIF, 2 = JPG, 3 = PNG, 4 = SWF, 5 = PSD, 6 = BMP, 7 = TIFF(intel byte order), 8 = TIFF(motorola byte order), 9 = JPC, 10 = JP2, 11 = JPX, 12 = JB2, 13 = SWC, 14 = IFF, 15 = WBMP, 16 = XBM
        case 1: // GIF
            $image = imagecreatefromgif($imgpath);
            break;
        case 2: // JPEG
            $image = imagecreatefromjpeg($imgpath);
            break;
        case 3: // PNG
            $image = imagecreatefrompng($imgpath);
            break;
        default:
            die('Unsupported imageformat');
    }

    // Thumbnail Size
    $maxthumbwidth = 150;
    $maxthumbheight = 150;

    // we assume size is already the maxsize
    $thumbwidth = $imagewidth;
    $thumbheight = $imageheight;

    // scale width
    if ($thumbwidth > $maxthumbwidth)
    {
        $factor = $maxthumbwidth / $thumbwidth;
        $thumbwidth *= $factor;
        $thumbheight *= $factor;
    }
    // scale height
    if ($thumbheight > $maxthumbheight)
    {
        $factor = $maxthumbheight / $thumbheight;
        $thumbwidth *= $factor;
        $thumbheight *= $factor;
    }

    // Thumbnail erstellen
    $thumbimg = imagecreatetruecolor($thumbwidth, $thumbheight);
    imagecopyresampled(
        $thumbimg,
        $image,
        0, 0, 0, 0,
        $thumbwidth, $thumbheight,
        $imagewidth, $imageheight
    );

    imagewebp($thumbimg, $writepath . $savename . '.webp');
    //imagejpeg($thumbimg, $writepath . $savename . '.jpeg');
    //imagepng($thumbimg, $writepath . $savename . '.png');
    imagedestroy($thumbimg);
}
?>