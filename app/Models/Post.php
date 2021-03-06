<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'body',
        'user_id',
    ];

    public function author()
    {
		return $this->belongsTo('App\Models\User');
	}
	
	
    public function post_images()
    {
		return $this->hasMany('App\Models\PostImage');
	}
	
}
