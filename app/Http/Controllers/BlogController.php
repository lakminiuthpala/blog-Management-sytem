<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogModel;
use App\Interfaces\BlogRepositoryInterface;
//use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{

    private $blogRepository;

    public function __construct(BlogRepositoryInterface $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }


    public function index(){
        $user = Auth::user()->id;
        $blogs = $this->blogRepository->getAllBlogsForLoggedUser($user); 
        return view('blog_list', compact('blogs'));
    }

    public function create(){
        return view('create_blog');
    }

    public function store(Request $request){
    try{
        $todayDate = date('Y-m-d');
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:255',
            'publish_date' => 'required|date_format:Y-m-d',
          
        ]);
        $this->blogRepository->storeBlog($data);
        return redirect()->route('blogs.index')->with('message', 'Blog Created Successfully');
        
    } catch (\Exception $e) {
        toastr()->error('Error! Try again');
        return response()->json([
            'error' => 'Error! Try again',
            'exception' => $e->getMessage()
        ], 500);
        return redirect()->back();
    }
    }

    public function edit($id)
    { $blog = $this->blogRepository->findBlog($id);
        return view('edit_blog',compact('blog'));
    }

    public function update(Request $request, $id){
        try{
            $todayDate = date('Y-m-d');
            $user = Auth::user()->id;
            $data = $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
                'publish_date' => 'required|date_format:Y-m-d',
          
            ]);
            $this->blogRepository->updateBlog($data, $user);
            return redirect()->route('blogs.index')->with('message', 'Blog Updated Successfully');
        }catch (\Exception $e) {
            toastr()->error('Error! Try again');
            return response()->json([
                'error' => 'Error! Try again',
                'exception' => $e->getMessage()
            ], 500);
            return redirect()->back();
        }

    
    }

    public function destroy($id)
    {
        try {
            $this->blogRepository->deleteBlog($id);
            toastr()->success('Device has been deleted successfully!');
            return redirect()->route('blogs.index');
        } catch (\Exception $e) {
            toastr()->error('Error! Try again');
            return redirect()->back();
        }
    }
}