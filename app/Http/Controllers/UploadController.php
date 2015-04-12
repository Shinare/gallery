<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class UploadController extends Controller {


	public function index()
	{
        error_reporting(E_ALL | E_STRICT);
        include('UploadHandler.php');
        $upload_handler = new UploadHandler();
	}

}
