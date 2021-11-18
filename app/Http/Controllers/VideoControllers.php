<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Videos;
class VideoControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Videos::orderBy('id', 'desc')->get();
        return view('Videos.viewvideos')->with('Videos',$videos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Videos.postvideos');
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
        $videos = new Videos;
        $videos->title = $request->input('title');
        $videos->video = $fileNameTostore;
        $videos->content = $request->input('content');
        $videos->save();
        return redirect(route('postvideos.index'))->with('status', 'video has post successfully'); //
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
        $videos = Videos::findOrFail($id);
        return view('Videos.updatenews')->with('Videos', $videos);
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
        $videos = Videos::find($id);
        $videos->title = $request->input('title');
        if($request->hasFile('video')){
            $videos->video = $fileNameTostore;
        }
        $videos->content = $request->input('content');
        $videos->update();
        return redirect(route('postvideos.index'))->with('status', 'News has post successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Videos::find($id);
        $event->delete();
        return redirect(route('postvideos.index'))->with('status', 'Post deleted succssfully');
    }
}
