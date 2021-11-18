<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy('id', 'desc')->get();
        return view('news.viewnews')->with('news',$news);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.postnews');
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
            'video'=> 'nullable|mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts|max:100040',
            'content'=>'required|min:5',
        ]);


        // Handle file upload/ image of the post
        if($request->hasFile('video')){
            // Get fileName with extension
            $filenameWithExt = $request->file('video')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just file extension
            $extension = $request->file('video')->getClientOriginalExtension();
            //Filename to store
            $fileNameTostore = $filename.'_'.time().'.'.$extension;

            //Uplaode video
            $path = $request->file('video')->storeAs('public/videos', $fileNameTostore);//
        }else {
            $fileNameToStore = 'novideo';
        }
        $news = new News;
        $news->title = $request->input('title');
        $news->video = $fileNameTostore;
        $news->content = $request->input('content');
        $news->save();
        return redirect(route('postnews.index'))->with('status', 'video has post successfully');
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
        $news = News::findOrFail($id);
        return view('news.updatenews')->with('news', $news);
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
            'video'=> 'nullable|mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts|max:100040',
            // 'video' => 'mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi',
            'content'=>'required|min:5',
        ]);


        // Handle file upload/ image of the post
        if($request->hasFile('video')){
            // Get fileName with extension
            $filenameWithExt = $request->file('video')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just file extension
            $extension = $request->file('video')->getClientOriginalExtension();
            //Filename to store
            $fileNameTostore = $filename.'_'.time().'.'.$extension;

            //Uplaode video
            $path = $request->file('video')->storeAs('public/videos', $fileNameTostore);//
        }else {
            $fileNameToStore = 'novideo';
        }
        $news = News::find($id);
        $news->title = $request->input('title');
        if($request->hasFile('video')){
            $news->video = $fileNameTostore;
        }
        $news->content = $request->input('content');
        $news->update();
        return redirect(route('postnews.index'))->with('status', 'video has post successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = News::find($id);
        $event->delete();
        return redirect(route('postnews.index'))->with('status', 'Post deleted succssfully');
    }
}
