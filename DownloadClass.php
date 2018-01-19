<?php


include('Connection.php');

class DownloadClass
{

    public function __construct()
    {

        if (isset($_GET['id'], $_GET['file'])) {
            $query = Connection::DB()->query("SELECT filename, uid FROM files WHERE uid = '" . Connection::DB()->real_escape_string($_GET['id']) . "' AND filename = '" . Connection::DB()->real_escape_string($_GET['file']) . "'");
            $fquery = $query->fetch_object();

            if ($_GET['id'] == $fquery->uid AND $_GET['file'] == $fquery->filename) {
                return true;
            } else {
                Header('Location: index.php');
                exit;
            }
        } else {
            Header('Location: index.php');
            exit;
        }
    }

    public function Download($fileid, $file, $submit)
    {

            $filedir = './files/' . $fileid . '/' . $file;
            $basename = basename($filedir);


            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . $basename . '"');
            header('Content-Transfer-Encoding: binary');
            header('Connection: Keep-Alive');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');

            set_time_limit(0);
            readfile($filedir);
            exit;

    }
}