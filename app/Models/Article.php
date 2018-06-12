<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	protected $table = 'articles';
    protected $fillable = [
			'title',
			'article',
			'user_id',
			'categoray_id'
			
	];
}
