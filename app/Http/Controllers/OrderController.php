<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use Illuminate\Http\Request;

class OrderController extends Controller
{

	public function finish()
    {
        dd("finishing order!");
    }

}
