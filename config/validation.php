<?php

	return [
		'createArticle' => [
			'title'=>'required',
			'user_id'=>'required',
			'category_id'=>'required'
		],
		'getArticle' =>[
			'column'=>'required',
			'text'=>'required'
		],
		'createCategory' =>[
			'column'=>'required',
			'text'=>'required'
		],
		'getCategory' =>[
			'column'=>'required',
			'text'=>'required'
		],
		'registerMember'=>[
			'name'=>'required',
			'email'=>'required',
			'password'=>'required'
		],
		'login'=>[
			'email'=>'required',
			'password'=>'required'
		]

	];
?>