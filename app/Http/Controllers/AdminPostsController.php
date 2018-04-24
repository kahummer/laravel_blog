<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Post;
use App\Category;
use App\Http\Requests\PostsCreateRequest;
use Illuminate\Support\Facades\Auth;
use App\Photo;
use App\Role;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::all();
        return View('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::pluck('name','id')->all();
        
        return view('admin.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsCreateRequest $request)
    {
        //requests all input fields data
        $input = $request->all();
        // return $request->all();

        //check for authenticated user
        $user = Auth::user();

        //check for photo_id 
        if($file = $request->file('photo_id')){
            //get original name of the photo
            $name = time() . $file->getClientOriginalName();
            //move file to images folder 
            $file->move('images', $name);
            //insert name of the photo into photo table
            $photo = Photo::create(['file'=> $name]);
            //assign photo_id input field with $photo->id
            $input['photo_id'] = $photo->id;

        }
        
        $user->posts()->create($input);
        return redirect('/admin/posts');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
         return View('admin.post.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
