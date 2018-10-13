<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Dompdf\Exception;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use Validator;
use Log;
use DB;
use App\Models\Wesite_User as Wesite_User;
use App\Library\Encryption as Encryption;

class MemberController extends Controller
{
	use Helpers;
	function __construct(){
		Log::useFiles(storage_path().'/logs/member/member.log');
	}
	
	/*|
	 *| login 會員登入
	 *|------------------------------------------------------------------------------------------------------------------
	 *|	$request : post傳入的資料
	 *|	Return : 會員資料
	 *| Create : 20180424
	 *|
	 *| * */
	public function login(Request $request)
	{
		// Variable
		$response       = array();
		$Decrypt_post = new Encryption(env('MEMBER_HASH_KEY'));

		
		// input
		$request_data = $request->all();		
		Log::info("request".json_encode($request_data));
		$validator= Validator::make($request_data,config('validation.login'));
		
		if(!empty($request_data) && $validator->fails()==false){
			
			//篩選傳入column 相對應動作
			$email = $Decrypt_post->decrypt($request_data['email']);
			$password =  $Decrypt_post->decrypt($request_data['password']);
			$result = "";
			Log::info("email".$email);
			Log::info("password".$password);
			
		
			$Logins = Wesite_User::where('email','=',$email)->take(1)->get();
			
			//預設狀態
			$responseTrue= [
					"Status"=>"fail",
					"Status_code" => "2001",
					"Login"=>"fail"				
			];
			
			if($email){
				$password = md5($password);
				

				if($Logins!="[]"){
					if(isset($Logins[0]->id)){
						$result["user_id"] = $Logins[0]->id;
					}
					if(isset($Logins[0]->User_Name)){
						$result["user_name"] = $Logins[0]->User_Name;
					}
					//ok
					$responseTrue = [
							"Status"=>"Ok",
							"Status_code" => "1000"
					];

					if($Logins[0]->password != $password){
						//wrong password
						$responseTrue= [
								"Status"=>"fail",
								"Status_code" => "2002",
								"Login"=>"fail"								
						];
					}			
				}
				
			}	
			Log::info("request".json_encode($this->response->array($responseTrue)));
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
			return $this->response->array($validator->messages())->setStatusCode(400);
		}
	}
	
	
	
	/*|
	 *| registerMember 註冊會員資料AORUS
	 *|------------------------------------------------------------------------------------------------------------------
	 *|	$request : post傳入的資料
	 *|	Return : 新會員ID
	 *| Create : 20180430
	 *|
	 *| * */
	public function registerMember(Request $request){
		// Variable
		$response       = array();
		$Decrypt_post = new Encryption(env('MEMBER_HASH_KEY'));

		$request_data = $request->all();
		Log::info("request".json_encode($request_data));

		$validator= Validator::make($request_data,config('validation.registerMember'));
		if(!empty($request_data) && $validator->fails()==false){
			
			//篩選傳入column 相對應動作
			
			$User_Name = $Decrypt_post->decrypt($request_data['name']);
			$User_Email = $Decrypt_post->decrypt($request_data['email']);
			$User_Passwd = $Decrypt_post->decrypt($request_data['password']);
			Log::info("User_Name".$User_Name);
			Log::info("User_Email".$User_Email);
			Log::info("User_Passwd".$User_Passwd);

			//預設狀態
			$responseTrue= [
					"Status"=>"fail",
					"Status_code" => "2001"
			];
			//-----------------------------
			
			
			//驗證資料格式
			if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $User_Email)){
				$responseTrue= [
						"Status"=>"fail",
						"Status_code" => "2003",
						"result" =>"Wrong format - Email"
				];
				return $this->response->array($responseTrue)->setStatusCode(200);
			}
			
			if(strlen($User_Passwd)<8 || strlen($User_Passwd)>20){
				$responseTrue= [
						"Status"=>"fail",
						"Status_code" => "2003",
						"result" =>"Wrong format - Password"
				];
				return $this->response->array($responseTrue)->setStatusCode(200);
			}
			

			
			
			//判斷重複
			$User_login = Wesite_User::select('email')->where('email','=',$User_Email)->count();
			
			if($User_login > 0){
				$responseTrue= [
						"Status"=>"fail",
						"Status_code" => "2002",
						"result" => "Is Repeated"
				];
			
			}else{//開始註冊
				
				//加密密碼
				$User_Passwd = md5($User_Passwd);
				try{

					Wesite_User::create([
	                    'name'=>$User_Name,
	                    'email'=>$User_Email,
	                    'password'=>$User_Passwd

		            ]);
					$responseTrue= [
							"Status"=>"ok",
							"Status_code" => "1000",
					];
				}catch (\Exception $e){
					Log::info("user_name".$e->getMessage());
					DB::rollBack();
					$responseTrue= [
							"Status"=>"ok",
							"Status_code" => "1200",
							"result" => $e->getMessage()
					];
					
				}
				

			}

			
			
			
			
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
			return $this->response->array($validator->messages())->setStatusCode(400);
		}
	}
	
	
}
