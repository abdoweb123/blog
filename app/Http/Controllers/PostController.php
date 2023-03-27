<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{

//    protected function validator (array $data) {
//        return Validator:: make($data,[
////            'title' => 'required',
////            'body' => 'required',
////            'filenames' => 'required|image|mimes:jpeg',
//        ]);
//    }


    public function index()
    {
        $posts = Post::paginate(20);
        return view('welcome', compact('posts'));
    }


    public function create()
    {
        return view('admin.create');
    }


    public function store(Request $request)
    {

        $validated = $request->validate([
            'title'=>'required|regex:/^[a-zA-Z]+$/u|unique:posts',
            'filenames'=>'required',
            'date'=>'required',
            'filenames.*'=>'image|mimes:png,jpg,webp|max:2048',
            'my_content'=>'min:20',
            'author'=>'required',
        ]);


        $files = store_upload_images($request);

        $post= new Post();
        $post->title = $request->title;
        $post->author = $request->author;
        $post->content = $request->my_content;
        $post->date = $request->date;
        $post->image = implode("|",$files); // for multiple
        $post->save();

        $request->session()->flash('message','تم إضافة المقالة بنجاح');
        return redirect()->route('home');
    }


    public function show($id)
    {
        $post = Post::where('id',$id)->firstOrFail();
        return view('post', compact('post'));
    }


    public function edit($id)
    {
        $post = Post::where('id',$id)->firstOrFail();
        return view('admin.edit', compact('post'));
    }



    public function update(Request $request, $id)
    {

        $validated = $request->validate([
            'title'=>'required|regex:/^[a-zA-Z]+$/u|unique:posts,title,'.$id,
            'filenames.*'=>'image|mimes:png,jpg,webp|max:2048',
            'my_content'=>'min:20',
            'author'=>'required',
        ]);


        $post = Post::where('id',$id)->firstOrFail();



        if($request->hasfile('filenames'))
        {
            $post->image = update_upload_images($request, $id);
        }

        $post->title = $request->title;
        $post->author = $request->author;
        $post->content = $request->my_content;
        $post->date = $request->date;
        $post->update();

        $request->session()->flash('message','تم تعديل المقالة بنجاح');
        return redirect()->route('home');
    }




    public function destroy($id)
    {
        $post = Post::find($id)->delete();
        return redirect()->route('admin_index');
    }

}
// end of class
