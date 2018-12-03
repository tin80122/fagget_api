<?php

	namespace App\Http\Controllers\Auth;

	use App\Http\Requests;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use Dingo\Api\Routing\Helpers;
	use Hash;
	use JWTAuth;
	use Log;
	use App\Models\User;
	use Tymon\JWTAuth\Exceptions\JWTException;

	class AuthenticateController extends Controller
	{
		function __construct(){
			Log::useFiles(storage_path().'/logs/token/token.log');
		}
		public function register(Request $request)
	    {
	    	
	        $input = $request->all();
	        Log::info("request".json_encode($input));
	        $user = new User();
	        $user->email = $input['email'];
	        $user->password = Hash::make($input['password']);
	        $user->save();
	        return response()->json(['result'=>true]);
	    }

	    public function authenticate(Request $request)
	    {	
	    	Log::info("request".json_encode($request));
	         // grab credentials from the request
		    $credentials = $request->only('email','password');
		    try {
		        // attempt to verify the credentials and create a token for the user
		        if (! $token = JWTAuth::attempt($credentials)) {
		            return response()->json(['error' => 'invalid_credentials'], 401);
		        }
		    } catch (JWTException $e) {
		        // something went wrong whilst attempting to encode the token
		        return response()->json(['error' => 'could_not_create_token'], 500);
		    }
		    // all good so return the token
		    return response()->json(compact('token'));
	    }

	   
	}

?>