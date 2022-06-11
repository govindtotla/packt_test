<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\PostImage;

use Auth;
use Storage;

class PostController extends Controller
{
    //
    
    
    
    function index()
    {
		$posts	=	Post::with('post_images')->orderBy('created_at', 'DESC')->get();
		return response()->json(['error' => false, 'data' => $posts ]);
	}
	
	
	function create(Request $request)
    {
		$user	=	Auth::user();
		$title	=	$request->title;
		$body	=	$request->body;
		$images	=	$request->images;
		
		$post	=	Post::create([
					'title' => $title,
					'body' => $body,
					'user_id' => $user->id,
				]);
				
		foreach($images as $image)
		{
			$imagepath	=	Storage::disk('uploads')->put($user->id . '/posts', $image);
			$postimage	=	PostImage::create([
					'post_image_caption' => $title,
					'post_image_path' => '/uploads/' .  $imagepath,
					'post_id' => $post->id,
				]);
			
		}
		
		return response()->json(['error' => false, 'data' => $post ]);
	}
	
	
	
	function store()
    {
		
	}
	
	
	function show()
    {
		
	}
	
	
	function edit()
    {
		
	}
	
	
	function update()
    {
		
	}
	
	function destroy()
    {
		
	}
	
	
	
	
}
