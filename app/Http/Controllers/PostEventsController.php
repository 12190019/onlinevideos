<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class PostEventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderBy('id', 'desc')->get();
        return view('admin.viewevent')->with('events',$events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.postevent');
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
            // 'image'=> 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'video'=>'nullable|mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts|max:100040',
            'content'=>'required|min:5',
        ]);


        // Handle file upload/ image of the post
        if($request->hasFile('image')){
            // Get fileName with extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just file extension
            $extension = $request->file('image')->getClientOriginalExtension();
            //Filename to store
            $fileNameTostore = $filename.'_'.time().'.'.$extension;

            //Uplaode image
            $path = $request->file('image')->storeAs('public/images', $fileNameTostore);//
        }else {
            $fileNameToStore = 'noimage';
        }
        $events = new Event;
        $events->title = $request->input('title');
        $events->image = $fileNameTostore;
        $events->content = $request->input('content');
        $events->save();
        return redirect(route('postevent.index'))->with('status', 'video has post successfully');
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
        $event = Event::findOrfail($id);
        return view('admin.update')->with('event',$event);
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
            'image'=> 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content'=>'required|min:5',
        ]);


        // Handle file upload/ image of the post
        if($request->hasFile('image')){
            // Get fileName with extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just file extension
            $extension = $request->file('image')->getClientOriginalExtension();
            //Filename to store
            $fileNameTostore = $filename.'_'.time().'.'.$extension;

            //Uplaode image
            $path = $request->file('image')->storeAs('public/images', $fileNameTostore);//
        }else {
            $fileNameToStore = 'noimage';
        }
        $events = Event::find($id);
        $events->title = $request->input('title');
        if($request->hasFile('image')){
            $events->image = $fileNameTostore;
        }
        $events->content = $request->input('content');
        $events->save();
        return redirect(route('postevent.index'))->with('status', 'Events has post successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();
        return redirect(route('postevent.index'))->with('status', 'Post deleted succssfully');
    }
}
