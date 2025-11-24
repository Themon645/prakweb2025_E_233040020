<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return ('Ini adalah CategoryController!');
    }
}
