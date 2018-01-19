<?php

include_once('DownloadClass.php');

$download = new DownloadClass();
if (isset($_POST['dwsubmit'])) {
    $download->Download($_GET['id'], $_GET['file'], $_POST['dwsubmit']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>UploadMe.ws - fast and safe upload!</title>

    <link rel="shortcut icon" type="image/x-icon" href="images/favi.png">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Demo for the tutorial: Styling and Customizing File Inputs the Smart Way"/>
    <meta name="keywords" content="cutom file input, styling, label, cross-browser, accessible, input type file"/>
    <meta name="author" content="Osvaldas Valutis for Codrops"/>

</head>

<body>
<div class="navigation">
    <div class="container">
        <a href="./"><img src="images/logo.png" alt="Uploadme.ws - fast and safe upload!"
                          style="height:95px; float:left;"/></a>

        <div class="navigationpoints">
            <li><a>Home</a></li>
            <li><a>Update</a></li>
        </div>
    </div>
</div>
<div class="container">
    <div class="mainbox" style="width:660px; margin:0 auto;">
        <div class="title"><h1>Download your file</h1></div>
        <div class="subtitle"><h1>and share it with the world</h1></div>
        <form method="POST">
            <input type="submit" name="dwsubmit" class="download" value="Download now"/>
            <input type="text" name="dwurl" class="dwurl" value="http://<?php echo $_SERVER['HTTP_HOST'];
            echo $_SERVER['REQUEST_URI']; ?>" readonly/>
        </form>
    </div>
</div>

<footer class="footerBottom">
    <div class="container">
        <div class="footerText">
            <div class="footerTitle"><h5><b>Footertitle</b></h5></div>
            <div class="footerSubText"><p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                    eirmod tempor invidunt ut</p></div>
        </div>

        <div class="footerText">
            <div class="footerTitle"><h5><b>Footertitle</b></h5></div>
            <div class="footerSubText"><p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                    eirmod tempor invidunt ut </p></div>
        </div>

        <div class="footerText">
            <div class="footerTitle"><h5><b>Footertitle</b></h5></div>
            <div class="footerSubText"><p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                    eirmod tempor invidunt ut </p></div>
        </div>
    </div>
</footer>

</body>