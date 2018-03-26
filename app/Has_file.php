<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Has_file extends Model
{
    protected $table = 'has_files';
    
    protected $fillable=[

'blog_id',
'file'
    ];

    public function blog()
    {
	return $this->belongsTo('App\Blog', 'blog_id');
	}
}
