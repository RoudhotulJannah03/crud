<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    public function store(Request $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();
        return redirect('/read')->with('status', 'Blog Post Form Data Has Been inserted');
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->update();
        return redirect('/read')->with('status', 'Blog Post Form Data Has Been updated');
    }

    public function read() 
    {  
        $model_post= new Post;
        $data=$model_post->all();
        return view('read',['data' =>$data]); 
    }

    public function edit($id)
    {   
        $data = Post::findOrFail($id);
        return view('edit', ['data' =>$data]);
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/read')->with('status', 'Blog Post Form Data Has Been deleted');
    }
}
