<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    /**
     *   
     * @SWG\post(path="/api/v1.0/User/createUser/",
     *   tags={"User"},
     *   summary="建立使用者",
     *   description="測試用",
     *   operationId="getMyData",
     *   produces={"application/json"},
     *     @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          required=true,
     *          @SWG\Schema(
     *              @SWG\Property(
     *                  property="name",
     *                  type="string",
     *                  maximum=64
     *              ),
     *              @SWG\Property(
     *                  property="age",
     *                  type="string"
     *              )
     *          )
     *     ),
     *   @SWG\Response(response="201", description="資源成功建立"),
     *   @SWG\Response(response="400", description="請求格式錯誤"),
     *   @SWG\Response(response="404", description="資源不存在 (Not Found)"),
     *   @SWG\Response(response="401", description="拒絕存取 (Unauthenticated)")
     * )
     *
     */

    public function createUser(Request $request)
    {
        return response()->json(['name' => $request->name, 'age' => $request->age ]);
    }


}