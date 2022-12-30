<?php
//check if form is submitted
if (isset($_POST['submit']))
{
    // ftp settings
    echo 'Status of upload:';
    $ftp_hostname = '10.50.202.242'; // change this
    $ftp_username = 'user09'; // change this
    $ftp_password = 'user09'; // change this
    $remote_dir = '../KnownImagesLibrary'; // change this
    $src_file = $_FILES['newImage']['name'];
    //upload file
    if ($src_file!='')
    {
        // remote file path
        $dst_file = $remote_dir . $src_file;
        
        // connect ftp
        $ftpcon = ftp_connect($ftp_hostname) or die('Error connecting to ftp server...');
        
        // ftp login
        $ftplogin = ftp_login($ftpcon, $ftp_username, $ftp_password);

        // ftp upload
        if (ftp_put($ftpcon, $dst_file, $src_file, FTP_ASCII))
            echo 'File uploaded successfully to FTP server!';
        else
            echo 'Error uploading file! Please try again later.';
        
        // close ftp stream
        ftp_close($ftpcon);
        header('Location: face_recognition_dashboard.html');
    }
    else
        header('Location: face_recognition_dashboard.html');
}
?>