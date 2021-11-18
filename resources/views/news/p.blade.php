<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Facades\Input;
// use Illuminate\Support\Facades\File;
// use Illuminate\Support\Facades\URL;

use App\PostBook;
use App\Category;

class PostBookController extends Controller
{

    public function __construct()//used middleware for restrick the user to access without login  
    {
        // $this->middleware('auth',['except'=>['except', 'show']]);
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = PostBook::orderBy('id', 'desc')->paginate(3);
        $categories = Category::all();
        return view('admin.postbook.index',['posts'=>$posts, 'categories'=> $categories]);
        //return view('admin.postbook.index')->with('posts', $posts );
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.postbook.create',['categories'=>$categories]);
       // return view('admin.postbook.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|min:3',
            'author' => 'required|min:3',
            'isbn_no' => 'required',
           'cover_image'=> 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id'=> 'required',
        ]);


        // Handle file upload/ image of the post
        if($request->hasFile('cover_image')){
            // Get fileName with extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just file extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameTostore = $filename.'_'.time().'.'.$extension;

            //Uplaode image
            $path = $request->file('cover_image')->storeAs('public/cover_image', $fileNameTostore);//
        }else {
            $fileNameToStore = 'noimage';
        }

        $post = new PostBook;
        $post->title = $request->input('title');
        $post->author = $request->input('author');
        $post->isbn_no = $request->input('isbn_no');

        // if(Input::hasFile('cover_image')){
        //     $file = Input::file('cover_image');
        //     $file->move(public_path() . '/coverimage/',
        // $file->getClientOriginalName());
        // $url = URL::to("/") . '/coverimage/' . $file->getClientOriginalName();
        // }
        $post->cover_image = $fileNameTostore;
        $post->category_id = $request->input('category_id');
        $post->save();
        return redirect(route('postbook.index'))->with('status', 'Post has successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = PostBook::findOrFail($id);
        return view('admin.postbook.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = PostBook::find($id);
        $categories = Category::all();
        return view('admin.postbook.edit',['post'=>$post, 'categories' =>$categories]);
       // return view('admin.postbook.edit',['post'=>$post]);
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
        $this->validate($request,[
            'title'=>'required|min:3',
            'author' => 'required|min:3',
            'isbn_no' => 'required',
           'cover_image'=> 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id'=> 'required',
        ]);

        // // Handle file upload/ image of the post
        if($request->hasFile('cover_image')){
            // Get fileName with extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just file extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameTostore = $filename.'_'.time().'.'.$extension;

            //Uplaode image
            $path = $request->file('cover_image')->storeAs('public/cover_image', $fileNameTostore);//
        }


        $post = PostBook::find($id);
        $post->title = $request->input('title');
        $post->author = $request->input('author');
        $post->isbn_no = $request->input('isbn_no');
        if($request->hasFile('cover_image')){
            $post->cover_image = $fileNameTostore;
        }
        $post->category_id = $request->input('category_id');
        $post->update();
        return redirect(route('postbook.index'))->with('status', 'Post has successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = PostBook::find($id);
        if($post->cover_image != 'noimage.jpg'){
            // Delete Image 
           Storage::delete('public/cover_image/'.$post->cover_image);
           //Storage::disk('s3')->delete('public/cover_image/'.$post->cover_image);
        }
        $post->delete();
        return redirect(route('postbook.index'))->with('status', 'Post deleted succssfully');
    }
}
