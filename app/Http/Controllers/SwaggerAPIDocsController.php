<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;


class SwaggerAPIDocsController extends Controller
{
    /**
     * 利用getJSON()產生JSON格式的Swagger定義
     *
     * @SWG\Swagger(
     *   @SWG\Info(
     *     description="這是api文件",
     *     title="API Document",
     *     version="v.1.0"
     *   )
     * )
     *
     */
    public function getJSON()
    {
        $swagger = \Swagger\scan(app_path('Http/Controllers/'));
        return response()->json($swagger, 200);
    }
}
