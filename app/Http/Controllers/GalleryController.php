<?php
/**
 * Created by PhpStorm.
 * User: Rafal
 * Date: 01/03/15
 * Time: 17:20
 */

namespace App\Http\Controllers;


use App\Photo;
use Illuminate\Support\Facades\View;

class GalleryController extends Controller {

    public function index()
    {
        return view('gallery');
    }

    public function addPicturesGet(){
        $mover="Please upload a file";
        return View("gallery-add")->with('mover',$mover);
    }

    public function addPictures()
    {
            //THUMBNAILSAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
            //connection
            /*include('connection.php');
            if(isset($_POST['submit']))
            {
                if(($_POST['titel'])!="")
                {


                    $image = $_FILES['image']['tmp_name'];
                    $titel = $_REQUEST['titel'];

                    if (!isset($image))
                        echo "Please upload an image" ;
                    else
                    {
                        $image_size = getimagesize($_FILES['image']['tmp_name']);

                        if($image_size==FALSE)
                            echo "This is not an image, Nice Try!";
                        else
                        {

                            $image = addslashes (file_get_contents ($_FILES['image']['tmp_name']));
                            $image_name = addslashes ($_FILES ['image']['name']);
                            $thumb = imagecreatetruecolor(100,100);
                            $afb = $_FILES['image'];
                            $temp = $afb['tmp_name'];
                            $info = getimagesize($temp);
                            $br = $info['0'];
                            $hg = $info['1'];
                            $ext = $info['2'];
                            $source = imagecreatefromjpeg($temp);
                            imagecopyresampled($thumb, $source, 0, 0, 0, 0, 100, 100, $br, $hg);
                            $thumbname = "database/thumb/tn".$image_name;
                            $thumbnailname = "tn".$image_name;
                            imagejpeg ($thumb, $thumbname);
                            move_uploaded_file ($_FILES['image']['tmp_name'], "database/".$image_name);
                            move_uploaded_file ($_FILES['image']['tmp_name'], "database/thumb/".$thumbname);


                            if (!$insert = mysql_query("INSERT INTO images VALUES('','$titel','$image_name','$thumbnailname')"))

                                echo "Upload is not working.";
                            else
                            {

                                $dir = 'database/';
                                $base_url = 'http://www.yourdomainname.com/foto/database';
                                $newest_mtime = 0;
                                $show_file = 'BROKEN';
                                if ($handle = opendir($dir)) {
                                    while (false !== ($file = readdir($handle))) {
                                        if (($file != '.') && ($file != '..')) {
                                            $mtime = filemtime("$dir/$file");
                                            if ($mtime > $newest_mtime) {
                                                $newest_mtime = $mtime;
                                                $show_file = "$base_url/$file";
                                            }
                                        }
                                    }
                                }
                                print '<img src="' .$show_file. '" alt="$titel">';
                                //thumbnail
                                $dirthumb = 'database/thumb/';
                                $base_urlthumb = 'http://www.yourdomainname.com/foto/database/thumb';
                                $newest_mtime = 0;
                                $show_file = 'BROKEN';
                                if ($handle = opendir($dirthumb)) {
                                    while (false !== ($file = readdir($handle))) {
                                        if (($file != '.') && ($file != '..')) {
                                            $mtime = filemtime("$dirthumb/$file");
                                            if ($mtime > $newest_mtime) {
                                                $newest_mtime = $mtime;
                                                $show_file = "$base_urlthumb/$file";
                                            }
                                        }
                                    }
                                }
                                print '<img src="' .$show_file. '" alt="$titel">';
                            }
                        }
                    }

                }else { echo "Oops! Looks like you forgot to upload the image<br>"; }
            }*/
            //ThumbnailsaaaaaaaaaaaaaaaaaaaAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
        //------------------------------------------------------------------------------------------
            //GDPLUGIN
        //------------------------------------------------------------------------------------------
        $fileName=$_FILES["uploaded_file"]["name"];
        $fileTmpLoc=$_FILES["uploaded_file"]["tmp_name"];
        $fileType=$_FILES["uploaded_file"]["type"];
        $fileSize=$_FILES["uploaded_file"]["size"];
        $fileErrorMsg=$_FILES["uploaded_file"]["error"];

        $mover = "herro im mover";
        $error=0;

        if($error!=1 && !$fileTmpLoc){
            $mover="Please select a file first";
            $error=1;
        } else if($error!=1 && $fileSize>41943040){//in bytes
            $mover="File too large 10Mb max";
            unlink($fileTmpLoc);
            $error=1;
        } else if($error!=1 && !preg_match("/\.(gif|jpg|png)$/i",$fileName)){
            $mover="Image was not a gif,png,jpg.";
            unlink($fileTmpLoc);
            $error=1;
        } else if($error!=1 && $fileErrorMsg==1){
            $mover="An error occured.";
            $error=1;
        }
        if($error!=1){
            $moveResult=move_uploaded_file($fileTmpLoc,"img/".$fileName);
            if($moveResult!=true) {
                $mover="Error failed to upload.";
                unlink($fileTmpLoc);
                exit();
            } else {
                //unlink($fileTmpLoc);
                $error=0;
                $mover = "The file " . $fileName . " has been uploaded successfully.";
        }}


        //------------------------------------------------------------------------------------------

        return View("gallery-add")->with(['mover'=>$mover,'error'=>$error]);
    }

    //------------------------------------------------------------------------------------------
    //Show pictures
    //------------------------------------------------------------------------------------------
    //
    public function showPicture(){
        function showMe()
        {
            header('Content-Type: image/jpeg');
            readfile("https://s3-eu-west-1.amazonaws.com/www.kacprzyk.co.uk/gallery/20140705--76.jpg");
        }
        return showMe();

    }

    //------------------------------------------------------------------------------------------
    //Show Gallery
    //------------------------------------------------------------------------------------------

    public function showGallery(){

        $uzer = Photo::where('galleries_id','=',1)->count();


        return view('gallery')->with('uzer',$uzer);
    }
} 