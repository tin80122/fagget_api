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


use App\Models\User as User;

class MemberController extends Controller
{
	use Helpers;

	
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
		
		
		// input
		$request_data = $request->all();		
		
		$validator= Validator::make($request_data,config('validation.login'));
		
		if(!empty($request_data) && $validator->fails()==false){
			
			//篩選傳入column 相對應動作
			$email = $request_data['email'];
			$password =  $request_data['password'];
			$result = "";
			
		
			$Logins = User::where('email','=',$email)->take(1)->get();
			
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
		
		$request_data = $request->all();
		$validator= Validator::make($request_data,config('validation.registerMember'));
		
		if(!empty($request_data) && $validator->fails()==false){
			
			//篩選傳入column 相對應動作
			
			$User_Name = $request_data['name'];
			$User_Email = $request_data['email'];
			$User_Passwd = $request_data['password'];
			
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
			$User_login = User::select('email')->where('email','=',$User_Email)->count();
			
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
					User::create([
	                    'name'=>$User_Name,
	                    'email'=>$User_Email,
	                    'password'=>$User_Passwd

		            ]);
					
					$responseTrue= [
							"Status"=>"ok",
							"Status_code" => "1000",
					];
				}catch (\Exception $e){
					DB::rollBack();
					$responseTrue= [
							"Status"=>"ok",
							"Status_code" => "1000",
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
			return $this->response->array(config('validation.ValidateError'))->setStatusCode(400);
		}
	}
	
	
}
