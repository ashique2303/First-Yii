<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<div>
    <div id="headings">
        <h2>Upload Files in the S3 Bucket.</h2>
        <p>Please do not try to upload any file more than 50MB.</p>
        <p>Please do not upload any executable file (.exe or .msi).</p>
        <p>The Bucket Folder: assignment-aws/Md-Ashiqur-Rahman/ </p>
    </div>

    <div >
        <form method="post" action="<?php echo Yii::app()->getBaseUrl(true).'/index.php/share/create'?>" enctype="multipart/form-data">

            <!--<form action="welcome.php" method="post" enctype="multipart/form-data">-->
            <input type="file" name="file[]" multiple="multiple" class="input">
            <br>
            <input type="submit" value="Upload" class="input-button" style="margin-top: 10px">
        </form>
    </div>
</div>
</body>

</html>