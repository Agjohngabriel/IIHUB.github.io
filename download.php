<?php
$rootPath = "files/";

$filename = "textform.pdf";
$orig_filename = $_POST[ 'filename' ];

$filename = $rootPath . $filename;
$filesize = filesize( $filename );

if ( $fd = fopen( $filename, "r" ))
{
    header( "Content-type: application/octet-stream" );
    header( "Content-Disposition: filename=\"$orig_filename\"" );
    header( "Content-length: $filesize " );
    header( "Cache-control: private" );

    while( !feof( $fd ))
    {
        $buffer = fread( $fd, 1024 );
        echo $buffer;
    }

    fclose( $fd );
}

exit;

?>