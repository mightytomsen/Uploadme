<?php

include('Connection.php');

class Upload
{


    public function getUpload($filename, $filesize, $tmp)
    {

        // special keywords replace with ""
        $filename = preg_replace("/[^a-zA-Z0-9.]/", "", $filename);

        // possible max rand number
        $maxuid = getrandmax();
        $uid = rand(0, $maxuid);
		

        // check all types of files that are allowed
        $allowed_extensions = array(
            'mp3', 'mp4', 'doc', 'zip', 'rar',
            'docx', 'ppt', 'pps', 'pptx', 'txt',
            'png', 'jpg', 'jpeg', 'gif', 'pdf', 'exe',
            'php', 'htm', 'html', 'dll', 'aup', 'js',
            'css'
        );

        // special keywords that need a transformation
        $extra_extensions = array(
            'php'
        );

        $error_report = array(
            'notallowed' => "You can't upload this file type!",
            'filesize' => "Your file is to big to upload. You can only upload max 1GB!"
        );

        // check if filetype is not in array
        if (!in_array(pathinfo($filename, PATHINFO_EXTENSION), $allowed_extensions)) {
            echo '<div class="errormessage"><h4>' . $error_report['notallowed'] . '</h4></div>';
            return false;
        } elseif ($filesize > 5000000) {
            echo '<div class="errormessage"><h4>' . $error_report['filesize'] . '</h4></div>';
            return false;
        } else {
            // Asking if filename have .php
            if (in_array(pathinfo($filename, PATHINFO_EXTENSION), $extra_extensions)) {

                // change the file ending from .php to .txt - new value to $filename
                $info = pathinfo($filename);
                $filename = $info['filename'] . '.txt';

                // create automaticly a folder with a random uid
				$createfolder = mkdir('./files/' . $uid);
				// movedir get the new full target with the created uid from createfolder
				$movedir = './files/'. $uid . '/';
				
                // give new filename a new basename to upload correctly
                $phptargetdir = $movedir . basename($filename);

                // move tmp path to targetdir var
                move_uploaded_file($tmp, $phptargetdir);
                Connection::DB()->query("INSERT INTO files (filename, uid) VALUES ('$filename', '$uid')");
                header('Location: download.php?id='. $uid . '&file=' . $filename);
            } else {
				
				$createfolder = mkdir('./files/' . $uid);
				$movedir = './files/'. $uid . '/';

				$targetdir = $movedir . basename($filename);

                // move tmp path to targetdir var
                move_uploaded_file($tmp, $targetdir);
                Connection::DB()->query("INSERT INTO files (filename, uid) VALUES ('$filename', '$uid')");
                header('Location: download.php?id='. $uid . '&file=' . $filename);

            }
        }
    }
}
