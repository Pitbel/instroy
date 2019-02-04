<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Land;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $categories = Category::subCategory(false)->get();

        return view('admin/dashboard', compact('categories'));
    }
}
