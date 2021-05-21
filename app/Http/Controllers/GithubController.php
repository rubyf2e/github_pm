<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;

class GithubController extends Controller
{
    /**
     *   
     * @SWG\post(
     *   path="/api/v1.0/Github/UserAccessTokenGetBlob/{file_sha}",
     *   tags={"Github"},
     *   summary="GithubController/UserAccessTokenGetBlob",
     *   description="產生github sha",
     *   produces={"application/json"},
     *     @SWG\Parameter(
     *       parameter="path",
     *       name="file_sha",
     *       type="string",
     *       in="path",
     *       description=""
     *     ),
     *     @SWG\Parameter(
     *       parameter="HeaderSign",
     *       name="Authorization",
     *       type="string",
     *       in="header",
     *       description="github token"
     *     ),
     *     @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          required=true,
     *          @SWG\Schema(
     *              @SWG\Property(
     *                  property="content",
     *                  type="string"
     *              ),
     *          )
     *     ),

     *

     *   @SWG\Response(response="201", description="資源成功建立"),
     *   @SWG\Response(response="400", description="請求格式錯誤"),
     *   @SWG\Response(response="404", description="資源不存在 ( Not Found)"),
     *   @SWG\Response(response="401", description="拒絕存取 ( Unauthenticated)")
     * )
     *
     */

    public function UserAccessTokenGetBlob(Request $request, $file_sha, $user = 'rubyf2e', $repo = 'github_pm')
    {
        $response = Http::withHeaders([
            'Accept'        => 'application/vnd.github.v3+json',
            'Authorization' => 'token '.env('GITHUB_PERSONAL_ACCESS_TOKEN', $request->github_personal_access_token),
        ])->post('https://api.github.com/repos/' .$user. '/' .$repo. '/git/blobs/' .$file_sha ,  [
            'content' =>  $request->content
        ]);
        return response()->json($response->json());
    } 




    /**
     *   
     * @SWG\post(
     *   path="/api/v1.0/Github/UserAccessTokenCreateBlob",
     *   tags={"Github"},
     *   summary="GithubController/UserAccessTokenCreateBlob",
     *   description="產生github sha",
     *   produces={"application/json"},
     *     @SWG\Parameter(
     *       parameter="HeaderSign",
     *       name="Authorization",
     *       type="string",
     *       in="header",
     *       description="github token"
     *     ),
     *     @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          required=true,
     *          @SWG\Schema(
     *              @SWG\Property(
     *                  property="content",
     *                  type="string"
     *              ),
     *          )
     *     ),
     *   @SWG\Response(response="201", description="資源成功建立"),
     *   @SWG\Response(response="400", description="請求格式錯誤"),
     *   @SWG\Response(response="404", description="資源不存在 ( Not Found)"),
     *   @SWG\Response(response="401", description="拒絕存取 ( Unauthenticated)")
     * )
     *
     */

    public function UserAccessTokenCreateBlob(Request $request, $user = 'rubyf2e', $repo = 'github_pm')
    {
        $response = Http::withHeaders([
            'Accept'        => 'application/vnd.github.v3+json',
            'Authorization' => 'token '.env('GITHUB_PERSONAL_ACCESS_TOKEN', $request->github_personal_access_token),
        ])->post('https://api.github.com/repos/' .$user. '/' .$repo. '/git/blobs',  [
            'content' =>  $request->content
        ]);
        return response()->json($response->json());
    } 




    /**
     *   
     * @SWG\post(
     *   path="/api/v1.0/Github/UserAccessTokenCreateCommit",
     *   tags={"Github"},
     *   summary="GithubController/UserAccessTokenCreateCommit",
     *   description="",
     *   produces={"application/json"},
     *     @SWG\Parameter(
     *       parameter="HeaderSign",
     *       name="Authorization",
     *       type="string",
     *       in="header",
     *       description="github token"
     *     ),
     *     @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          required=true,
     *          @SWG\Schema(
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="tree",
     *                  description="The tree parameter must be exactly 40 characters and contain only [0-9a-f].",
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

    public function UserAccessTokenCreateCommit(Request $request, $user = 'rubyf2e', $repo = 'github_pm')
    {
        $response = Http::withHeaders([
            'Accept'        => 'application/vnd.github.v3+json',
            'Authorization' => 'token '.env('GITHUB_PERSONAL_ACCESS_TOKEN', $request->github_personal_access_token),
        ])->post('https://api.github.com/repos/' .$user. '/' .$repo. '/git/commits',  [
            'message' =>  $request->message,
            'tree'    => $request->tree,
        ]);
        return response()->json($response->json());
    } 


    /**
     *   
     * @SWG\get(
     *   path="/api/v1.0/Github/UserData",
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
     * @SWG\get(
     *   path="/api/v1.0/Github/UserRepos",
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
     * @SWG\get(
     *   path="/api/v1.0/Github/UserAccessTokenRepos",
     *   tags={"Github"},
     *   summary="GithubController/UserAccessTokenRepos",
     *   description="",
     *   produces={"application/json"},
     *     @SWG\Parameter(
     *       parameter="HeaderSign",
     *       name="Authorization",
     *       type="string",
     *       in="header",
     *       description="github token"
     *     ),
     *   @SWG\Response(response="201", description="資源成功建立"),
     *   @SWG\Response(response="400", description="請求格式錯誤"),
     *   @SWG\Response(response="404", description="資源不存在 ( Not Found)"),
     *   @SWG\Response(response="401", description="拒絕存取 ( Unauthenticated)")
     * )
     *
     */

     public function UserAccessTokenRepos($github_personal_access_token = '')
    {
        $response = Http::withHeaders([
            'Authorization' => 'token '.env('GITHUB_PERSONAL_ACCESS_TOKEN', $request->github_personal_access_token),
        ])->get('https://api.github.com/user/repos');
        return response()->json($response->json());
    } 



     /**
     *   
     * @SWG\post(
     *   path="/api/v1.0/Github/UserAccessTokenCreateRepos",
     *   tags={"Github"},
     *   summary="GithubController/UserAccessTokenCreateRepos",
     *   description="",
     *   produces={"application/json"},
     *     @SWG\Parameter(
     *       parameter="HeaderSign",
     *       name="Authorization",
     *       type="string",
     *       in="header",
     *       description="github token"
     *     ),
     *     @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          required=true,
     *          @SWG\Schema(
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

        $response = Http::withHeaders([
            'Accept'        => 'application/vnd.github.v3+json',
            'Authorization' => 'token '.env('GITHUB_PERSONAL_ACCESS_TOKEN', $request->github_personal_access_token),
        ])->post('https://api.github.com/user/repos',  [
            'name'               =>  $request->name,
            'auto_init'          => 'true',
            'private'            => 'true',
            'gitignore_template' => 'nanoc',
        ]);
        return response()->json($response->json());
    } 


}