<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Has_article extends Model
{
    protected $table = 'has_articles';
    
    protected $fillable=[

'blog_id',
'article_id'
    ];

    public function blog()
    {
	return $this->belongsTo('App\Blog', 'blog_id');
	}

 	public function article()
 	{
	return $this->belongsTo('App\Article', 'article_id');
	}
}
