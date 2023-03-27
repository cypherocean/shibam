<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RootController extends Controller {
    public function index() {
        return view('front.index');
    }

    public function products() {
        return view('front.product');
    }

    public function productDetails() {
        return view('front.product_details');
    }
    
    public function about() {
        return view('front.about');
    }
    
    public function contact() {
        return view('front.contact');
    }
    
    public function notfound() {
        return view('front.404');
    }
}
