<?php

namespace App\Http\Controllers\Api;

use App\Data\Model\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $categories = Category::all();

        return CategoryResource::collection($categories);
    }
}
