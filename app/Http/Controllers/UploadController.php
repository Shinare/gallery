<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class UploadController extends Controller {


	public function index()
	{
        url('upload/server/php/index.php');
        return 'echo';
	}

}
