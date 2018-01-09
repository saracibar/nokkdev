<?php
// mio


///////
use Hazzard\Filepicker\Handler;
use Hazzard\Filepicker\Uploader;
use Intervention\Image\ImageManager;
use Hazzard\Config\Repository as Config;


// Include composer autoload
require __DIR__.'/../vendor/autoload.php';

$uploader = new Uploader($config = new Config, new ImageManager(array('driver' => 'gd')));
$handler = new Handler($uploader);

// Configuration

$config['debug'] = true;
//$config['upload_dir'] = __DIR__.'/../files';
$config['upload_dir'] = '/var/www/j/nokk.development.mx/files';
// $config['upload_url'] = 'files';
$config['accept_file_types'] = 'jpg|jpeg|png|gif';
//$config['keep_original_image'] = true;
$config['image_versions.thumb'] = array(
    'width' => 450,
    'height' => 300
);

// Events

$handler->on('init', function () {
$mierda = "rrr";
});

/**
 * Fired before the file upload starts.
 *
 * @param \Symfony\Component\HttpFoundation\File\UploadedFile $file
 */

$handler->on('upload.before', function ($file) {

	 
//require_once '/app/init.php';
	// DB::insert('insert into users (user_id, name) values (?, ?)', array(1, 'foo@example.com'));

	$orden = $_POST['orden'];
	$imagename = $_POST['imagename'];
	//$ = $_POST[''];

     $file->save = $imagename.$orden;
    // throw new \Hazzard\Filepicker\Exception\AbortException('Error message!');
});

$handler->on('file.delete', function ($file) {
	require_once '../../dbapi.php';
	Database::initialize();
	$extrapath = "/var/www/j/onmrkt/files/"; // MIO: This is the path that comes along with the $file variable
	$imagename = str_replace($extrapath,"",$file);
	$deleteimage = deleteImage($imagename);
	$close = Database::$conn->close();
});

// Fetch user files
$handler->on('files.fetch', function (&$files) {
	
	require_once '../../dbapi.php';
	
	$userid = $_GET['userid'];
	$propid = $_GET['propid'];
	
	Database::initialize();
	$files = selecciona($userid,$propid);
	$close = Database::$conn->close();
     //$files = array('0-7-1508370026-117.jpg', '0-7-1508370026-110.jpg', '0-7-1508370026-107.jpg');
});


/**
 * Fired on upload success.
 *
 * @param \Symfony\Component\HttpFoundation\File\File $file
 */
$handler->on('upload.success', function ($file) {
	
	require_once '../../dbapi.php';
	
	$orden = $_POST['orden'];
	$imagename = $_POST['imagename'];
	$userid = $_POST['userid'];
	$propid = $_POST['propid'];
	$finalname = $imagename.$orden.".".$file->getExtension();
	Database::initialize();
	inserta($userid,$propid,$finalname);
	$close = Database::$conn->close();
	//$file->data = array('id' => '1', 'description' => 'My File');
	/* 	 */
});

/**
 * Fired on upload error.
 *
 * @param \Symfony\Component\HttpFoundation\File\UploadedFile $file
 */
$handler->on('upload.error', function ($file) {

});

/**
 * Fired when fetching files.
 *
 * @param array &$files
 */
$handler->on('files.fetch', function (&$files) {
    // Set the array of files to be returned.
    // $files = array('file1', 'file2', 'file3');
});

/**
 * Fired on file filtering.
 *
 * @param array &$files
 * @param int   &$total
 */
$handler->on('files.filter', function (&$files, &$total) {

});

/**
 * Fired on file download.
 *
 * @param \Symfony\Component\HttpFoundation\File\File $file
 * @param string $version
 */
$handler->on('file.download', function ($file, $version) {

});

/**
 * Fired on file deletion.
 *
 * @param \Symfony\Component\HttpFoundation\File\File $file
 */
$handler->on('file.delete', function ($file) {

});

/**
 * Fired before cropping.
 *
 * @param \Symfony\Component\HttpFoundation\File\File $file
 * @param \Intervention\Image\Image $image
 */
$handler->on('crop.before', function ($file, $image) {

});

/**
 * Fired after cropping.
 *
 * @param \Symfony\Component\HttpFoundation\File\File $file
 * @param \Intervention\Image\Image $image
 */
$handler->on('crop.after', function ($file, $image) {

});

// Handle the request.
$handler->handle()->send();
