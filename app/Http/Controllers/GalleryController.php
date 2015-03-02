<?php
/**
 * Created by PhpStorm.
 * User: Rafal
 * Date: 01/03/15
 * Time: 17:20
 */

namespace App\Http\Controllers;


class GalleryController extends Controller {

    public function index()
    {
        return view('gallery');
    }

} 