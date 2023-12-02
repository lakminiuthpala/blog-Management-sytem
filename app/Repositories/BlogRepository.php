<?php

namespace App\Repositories;

use App\Interfaces\BlogRepositoryInterface;
use App\Models\BlogModel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BlogRepository implements BlogRepositoryInterface
{
    public function getAllBlogsForLoggedUser($user)
    {
        return BlogModel::where('user_id', $user)->latest()->paginate(10);
    }

    public function storeBlog($request)
    {  
        $data = array(
            'title' => $request['title'],
            'content' => $request['content'],
            'publish_date' => $request['publish_date'],
            'user_id' => Auth::user()->id,
            'created_at' => date('yyyy-mm-dd'),
            'updated_at' => null
        );
        
       return BlogModel::create($data);
    }

    public function findBlog($id)
    {
        return BlogModel::find($id);
    }

    public function updateBlog($data, $user)
    {
        $blog = BlogModel::where('id', $user)->first();
        $blog->title = $data['title'];
        $blog->content = $data['content'];
        $blog->publish_date = $data['publish_date'];
        $blog->user_id = $user;
        $blog->save();
    }

    public function deleteBlog($id)
    {
        $blog = BlogModel::find($id);
        $blog->delete();
    }

    public function getAllBlogs(){
        return BlogModel::with('BlogsAuthor')->paginate(20);
        
    }
    
}
