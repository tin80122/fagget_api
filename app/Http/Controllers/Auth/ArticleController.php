<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Aorus_Care_Shopping;
use Dompdf\Exception;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use App\Library\Encryption as Encryption;
use Validator;
use Log;


use App\Models\Article as Article;

class ArticleController extends Controller
{

    use Helpers;

    public function createArticle(Request $request){

        
        // Variable
        $response       = array();
        $Decrypt_post = new Encryption(env('MEMBER_HASH_KEY'));

        // input
        $request_data = $request->all();
        $validator= Validator::make($request_data,config('validation.createArticle'));
        if(!empty($request_data)){
            
            Article::create([
                    'title'=>$Decrypt_post->decrypt($request_data['title']),
                    'article'=>$Decrypt_post->decrypt($request_data['article']),
                    'user_id'=>$Decrypt_post->decrypt($request_data['user_id']),
                    'category_id'=>$Decrypt_post->decrypt($request_data['category_id'])

            ]);
            
            //ok
            $responseTrue= [
                    "Status"=>"Ok",
                    "Status_code" => "1000",
                    "Message"=>"Success"
            ];
            return $this->response->array($responseTrue)->setStatusCode(200);
        }
        // error
        //  傳入資料為空
        if(empty($request_data))
        {
            return $this->response->array(config('validation.EmptyError'))->setStatusCode(400);
        }
        // 資料驗證失敗
        if ($validator->fails())
        {
            return $this->response->array(config('validation.ValidateError'))->setStatusCode(400);
        }
    }

    public function getArticle(Request $request)
    {
        // Variable
        $response       = array();
        $Decrypt_post = new Encryption(env('MEMBER_HASH_KEY'));
        
        // input
        $request_data = $request->all();

        $validator= Validator::make($request_data,config('validation.getArticle'));
        
        if(!empty($request_data) && $validator->fails()==false){
            if($request_data['column']=="user_id"){
                $Message = Article::where([
                        [$request_data['column'],'=',$request_data['text']]
                ])->take(100)->get();
            }else{
                $Message = Article::where([
                        [$request_data['column'],'like','%'.$request_data['text'].'%']
                ])->take(100)->get();
            }
            Log::info(json_encode($Message));        
            $Message = $Decrypt_post->encrypt(json_encode($Message));    
            //ok
            $responseTrue= [
                    "Status"=>"Ok",
                    "Status_code" => "1000",
                    "Message"=>$Message

            ];
            return $this->response->array($responseTrue)->setStatusCode(200);
            
        }

        // error
        //  傳入資料為空
        if(empty($request_data))
        {
            return $this->response->array(config('validation.EmptyError'))->setStatusCode(400);
        }
        
        // 資料驗證失敗
        if ($validator->fails())
        {
            return $this->response->array(config('validation.ValidateError'))->setStatusCode(400);
        }
    }
}
