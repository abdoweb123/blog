<?php


use App\Models\Post;
use Illuminate\Http\Request;

if(!function_exists('store_upload_images')){

    function store_upload_images($request){
        $files = [];
        if($request->hasfile('filenames'))
        {
            foreach($request->file('filenames') as $file)
            {
                $name = time().rand(1,100).'.'.$file->extension();
                $file->move(public_path('files'), $name);
                $files[] = $name;
            }
        }
        return $files;
    }

}



if(!function_exists('update_upload_images')){
    function update_upload_images($request,$id){
        $post = Post::where('id',$id)->firstOrFail();
        $files = [];
        if($request->hasfile('filenames'))
        {
            foreach($request->file('filenames') as $file)
            {
                $name = time().rand(1,100).'.'.$file->extension();
                $file->move(public_path('files'), $name);
                $files[] = $name;
            }
        }
        return $post->image = implode("|",$files); // for multiple images
    }
}

