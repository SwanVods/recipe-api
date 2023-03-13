<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search($code, $keyword) {
        $codeq = str_replace(' ', '_', strtolower($code));
        $code = str_replace(' ', '', ucwords($code, ' '));
        $keyword = strtolower($keyword);
        $model = "App\Models\\" . $code;
        $results = $model::where($codeq . '_name', 'like', '%' . $keyword . '%')->get();
        return response()->json($results);
    }
}
