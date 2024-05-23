<!DOCTYPE html>
<html>
<head>
    <title>File Upload and Download</title>
</head>
<body>
    <h1>File Upload and Download</h1>

    <!-- File Upload Form -->
    <h2>Upload a File</h2>
    <form action="upload_download.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file" required>
        <input type="submit" value="Upload">
    </form>

    <!-- File Download Section -->
    <h2>Download Files</h2>
    <?php
        // Retrieve the list of uploaded files
        $uploads_dir = 'uploads/';
        $files = array_diff(scandir($uploads_dir), array('.', '..'));
        if (count($files) > 0) {
            echo "<ul>";
            foreach ($files as $file) {
                $file_path = $uploads_dir . $file;

                // $prefix="https://uaqejari.gov.ae/PublicPages/PublicTenancyContractPrint.aspx?";
                $download_link = "upload_download.php?download=" . base64_encode($file_path);
                 <a download= "<?php echo $files[$file]?>" href="$download_link"></a>;

                echo "<li><a href='$download_link' download='$file'>$prefix $file</a></li>";

                 echo"<P></p>";

            }
            echo "</ul>";
        } else {
            echo "No files available for download.";
        }
    ?>
</body>
</html>