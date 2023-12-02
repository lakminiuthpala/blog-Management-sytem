<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogModel;
use App\Interfaces\BlogRepositoryInterface;

class PublicBlogController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $blogRepository;

    public function __construct(BlogRepositoryInterface $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $blogs = $this->blogRepository->getAllBlogs(); 
        return view('all_blogs', compact('blogs'));
    }

    public function view($id)
    {
        $blogs = $this->blogRepository->getAllBlogs(); 
        $data = $this->blogRepository->findBlog($id);
        
        return view('view_blogs', [
            'blogs' => $blogs,
            'data' => $data,
        ]);
    }
}

