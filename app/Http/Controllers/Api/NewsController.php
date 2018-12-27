<?php

namespace App\Http\Controllers\Api;

use App\Data\Model\News;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Resources\NewsResource;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $type        = trim($request['type']);
        $category_id = trim($request['category_id']);

        $query = News::query();
        if ($type != '') {
            $query->where('type', '=', $type);
        }
        if ($category_id != '') {
            $query->where('category_id', '=', $category_id);
        }
        $query->where('published', '=', '1');
        $query->orderBy('published_at');

        return NewsResource::collection($query->get());
    }
}
