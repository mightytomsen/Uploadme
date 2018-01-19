<?php
include('Upload.php');

$connection = new Connection();
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
    <meta name="description" content="Uploadme.ws - Upload your files safe and fast. 24/7 Uptime and no deletes!"/>
    <meta name="keywords" content="uploadme, upload, fileuploader, fast upload, safe upload, free upload"/>
    <meta name="author" content="Holyfuture"/>

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
        <div class="title"><h1>Upload your file</h1></div>
        <div class="subtitle"><h1>and share it with the world</h1></div>

        <form method="POST" enctype="multipart/form-data">
            <?php
            if (isset($_POST['submit'])) {
                $upload = new Upload();
                $upload->getUpload($_FILES['file']['name'], $_FILES['file']['size'], $_FILES['file']['tmp_name']);
            }
            ?>

            <input type="file" name="file" id="file" class="inputfile"
                   data-multiple-caption="{count} files selected" multiple/>
            <label for="file"><h3>Pick a file...</h3></label>
            <input type="submit" value="Upload" name="submit" class="upload">
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


<script language="JavaScript">
    var inputs = document.querySelectorAll('.inputfile');
    Array.prototype.forEach.call(inputs, function (input) {
        var label = input.nextElementSibling,
            labelVal = label.innerHTML;

        input.addEventListener('change', function (e) {
            var fileName = '';
            if (this.files && this.files.length > 1)
                fileName = ( this.getAttribute('data-multiple-caption') || '' ).replace('{count}', this.files.length);
            else
                fileName = e.target.value.split('\\').pop();

            if (fileName)
                label.querySelector('h3').innerHTML = fileName;
            else
                label.innerHTML = labelVal;
        });
    });
</script>

</body>
</html>