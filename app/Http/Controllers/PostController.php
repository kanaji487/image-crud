<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->get();

        return view('post.index', compact('posts'));
    }

    public function create()
    {
        return view("post.form");
    }

    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|string|min:10",
            "image" => "nullable|mimes:png,jpg,jpeg,webp|max:1024",
            "description" => "required|string|min:10"
        ]);

        $data = $request->only(["title", "description"]);

        if($request->has("image")){
            $imageName = time().".".$request -> image -> getClientoriginalExtension();
            $request->image->move(public_path("uploads/images/"),$imageName);
            $data["image"] = $imageName;
        };

        Post::create($data);
        return redirect()->route('post.index')->with("success", "Post has been created!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view("post.edit", compact("post"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            "title" => "required|string|min:10",
            "image" => "nullable|mimes:png,jpg,jpeg,webp|max:1024",
            "description" => "required|string|min:10"
        ]);

        if($request->has("image")){
            $destination = "uploads/images/".$post->image;

            if(\File::exits($destination)){
                \File::delete($destination);
            }

            $imageName = time.".".$request->image->imagegetClientoriginalExtension();
            $request->image->move(public_path("uploads/images/",$imageName));
            $data["image"] = $imageName;
        }

        $post->update($data);
        return redirect()->route('post.index')->with("success", "Post has been created!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
