<?php
	include('./class/COMMON/class.Images.php');
	include $_SERVER["DOCUMENT_ROOT"]."/class/CONTROL/shaman.php";

	$shaman = new Shaman();
	$SHId = "maengyoung711";

	$shamanData = array(":SHId" => $SHId);
	$rData = $shaman->shamanHomeInfo($shamanData);

    $profileImage = new Image(".".$rData["viewProfile"]);
    $newWidth = 60;
    $newHeight = 60;
    $profileImage->resize($newWidth, $newHeight, 'crop', 'l', 't');
    $profileImage->save('./tempImg/tempProfileImg_'.$SHId);
    $profileImage->displayHTML();

/*for ($i = 1; $i <= 8; $i++) {
    $Image = new Image('./img/image'.$i.'.jpg');
    $newWidth = 200;
    $newHeight = 200;
    $Image->resize($newWidth, $newHeight, 'crop', 'l', 't');
    $Image->save('testimage_square_'.$i);
    $Image->displayHTML();
}

for ($i = 1; $i <= 8; $i++) {
    $Image = new Image('./img/image'.$i.'.jpg');
    $newWidth = 600;
    $newHeight = 200;
    $Image->resize($newWidth, $newHeight, 'crop', 'l', 't');
    $Image->save('testimage_landscape_'.$i);
    $Image->displayHTML();
}

for ($i = 1; $i <= 8; $i++) {
    $Image = new Image('./img/image'.$i.'.jpg');
    $newWidth = 200;
    $newHeight = 600;
    $Image->resize($newWidth, $newHeight, 'crop', 'l', 't');
    $Image->save('testimage_portrait_'.$i);
    $Image->displayHTML();
}*/

