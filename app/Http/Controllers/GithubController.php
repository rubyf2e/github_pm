<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;

class GithubController extends Controller
{

    /**
     *   
     * @SWG\get(path="/api/v1.0/Github/UserData",
     *   tags={"Github"},
     *   summary="GithubController/UserData",
     *   description="",
     *   produces={"application/json"},
     *   @SWG\Response(response="201", description="資源成功建立"),
     *   @SWG\Response(response="400", description="請求格式錯誤"),
     *   @SWG\Response(response="404", description="資源不存在 ( Not Found)"),
     *   @SWG\Response(response="401", description="拒絕存取 ( Unauthenticated)")
     * )
     *
     */
    
    public function UserData($user = 'rubyf2e')
    {
        $response = Http::get('https://api.github.com/users/' .$user);
        return response()->json($response->json());
    }



     /**
     *   
     * @SWG\get(path="/api/v1.0/Github/UserRepos",
     *   tags={"Github"},
     *   summary="GithubController/UserRepos",
     *   description="",
     *   produces={"application/json"},
     *   @SWG\Response(response="201", description="資源成功建立"),
     *   @SWG\Response(response="400", description="請求格式錯誤"),
     *   @SWG\Response(response="404", description="資源不存在 ( Not Found)"),
     *   @SWG\Response(response="401", description="拒絕存取 ( Unauthenticated)")
     * )
     *
     */

    public function UserRepos($user = 'rubyf2e')
    {
        $response = Http::get('https://api.github.com/users/' .$user. '/repos');
        return response()->json($response->json());
    } 




     /**
     *   
     * @SWG\get(path="/api/v1.0/Github/UserAccessTokenRepos",
     *   tags={"Github"},
     *   summary="GithubController/UserAccessTokenRepos",
     *   description="",
     *   produces={"application/json"},
     *   @SWG\Response(response="201", description="資源成功建立"),
     *   @SWG\Response(response="400", description="請求格式錯誤"),
     *   @SWG\Response(response="404", description="資源不存在 ( Not Found)"),
     *   @SWG\Response(response="401", description="拒絕存取 ( Unauthenticated)")
     * )
     *
     */

     public function UserAccessTokenRepos($github_personal_access_token = '')
    {
        $response = Http::withToken(env('GITHUB_PERSONAL_ACCESS_TOKEN', $github_personal_access_token))->get('https://api.github.com/user/repos');
        return response()->json($response->json());
    } 



     /**
     *   
     * @SWG\post(path="/api/v1.0/Github/UserAccessTokenCreateRepos",
     *   tags={"Github"},
     *   summary="GithubController/UserAccessTokenCreateRepos",
     *   description="",
     *   produces={"application/json"},
     *     @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          required=true,
     *          @SWG\Schema(
     *              @SWG\Property(
     *                  property="github_personal_access_token",
     *                  type="string",
     *                  maximum=64
     *              ),
     *              @SWG\Property(
     *                  property="name",
     *                  type="string"
     *              )
     *          )
     *     ),
     *   @SWG\Response(response="201", description="資源成功建立"),
     *   @SWG\Response(response="400", description="請求格式錯誤"),
     *   @SWG\Response(response="404", description="資源不存在 ( Not Found)"),
     *   @SWG\Response(response="401", description="拒絕存取 ( Unauthenticated)")
     * )
     *
     */

    public function UserAccessTokenCreateRepos(Request $request)
    {

        $response = Http::withToken(env('GITHUB_PERSONAL_ACCESS_TOKEN', $request->github_personal_access_token))->post('https://api.github.com/user/repos',  [
            'name'               =>  $request->name,
            'auto_init'          => 'true',
            'private'            => 'true',
            'gitignore_template' => 'nanoc',
        ]);
        return response()->json($response->json());
    } 


}