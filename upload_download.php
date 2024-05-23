<?php
// Handle file upload
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploads_dir = 'uploads/';
    $file = $_FILES['file'];

    if ($file['error'] === UPLOAD_ERR_OK) {
        $tmp_name = $file['tmp_name'];
        $file_name = basename($file['name']);
        $file_path = $uploads_dir . $file_name;

        if (move_uploaded_file($tmp_name, $file_path)) {
            header("Location: index.php");
           
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "No file selected.";
    }
}

// Handle file download
if (isset($_GET['download'])) {
    $file_path = base64_decode($_GET['download']);
    if (file_exists($file_path)) {
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($file_path) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file_path));
    
        ob_clean();
        flush();
        readfile($file_path);
        header("Location: $file_path");
 
        exit;
    } else {
        echo "File not found.";
    }
}