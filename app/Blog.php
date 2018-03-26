<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
     protected $fillable=[

'title',
'content'
//'file'
    ];

public function user(){

	return $this->belongsTo('App\User');		
	}

public function hasArticle()
	{

	return $this->belongsToMany('App\Article', 'has_articles', 'blog_id', 'article_id');
	}

public function blogArticle()
	{
	return $this->hasMany('App\Has_article', 'blog_id');
	}

public function hasFile()
	{
	return $this->hasMany('App\Has_file', 'blog_id');
	}

	

}


