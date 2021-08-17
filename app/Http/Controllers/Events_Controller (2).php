<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Events_Model;

class Events_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events=Events_Model::latest()->paginate(5);

        return view('backend.events.allevents',compact('events'))->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('backend.events.addevent'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'eve_name'=>'required',
            'eve_details'=>'required',
            'eve_location'=>'required',
            'eve_time'=>'required',
            'eve_image'=>'required|mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:5048',
            
        ]);
        
        $event_id=DB::table('events')->latest()->first();
        //$id=$product_id+1;
        $file=$request->file('eve_image');
        if($file->isValid())
        {
            $destinationPath='eventimages/';
            $eveimage=date('YmdHis').'.'.$file->getClientOriginalExtension();
            //$image=$id.'_'.$request->get('product_name').'.'.$file->getClientOriginalExtension();
            $file->move($destinationPath,$eveimage);
        }

        $data = $request->all();
        $Event = new Events_Model;
        
        $Event->eve_name = $request->get('eve_name');
        $Event->eve_details = $request->get('eve_details');
        $Event->eve_location = $request->get('eve_location');
        $Event->eve_time = $request->get('eve_time');
        $Event->eve_image = $eveimage;
        $Event->save();

        return redirect()->route('adminevents.index')->with('success','Event Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( Events_Controller $event)
    {
       return view('admin.events.viewevent',compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event=Events_Model::find($id);
        return view('backend.events.editevent',compact('event'));
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
        $request->validate([
            'eve_name'=>'required',
            'eve_details'=>'required',
            'eve_location'=>'required',
            'eve_time'=>'required',
            //'eve_image'=>'required',
        ]);
        
        $event=Events_Model::find($id);
        $file=$request->eve_image;
        if($request->hasFile('eve_image') && $file->isValid())
        {
            $destinationPath='eventimages/';
            //$image=date('YmdHis').'.'.$file->getClientOriginalExtension();
            $eveimage=$id.'_'.$request->get('eve_image').'.'.$file->getClientOriginalExtension();
            $file->move($destinationPath,$eveimage);
            $eventUpdate['eve_image'] = $eveimage;
        }

        $eventUpdate = [
            'eve_name' => $request->eve_name,
            'eve_details' => $request->eve_details,
            'eve_location' => $request->eve_location,
            'eve_time' => $request->eve_time,
        ];
        
        
        Events_Model::where('id',$id)->update($eventUpdate);


        return redirect()->route('adminevents.index')->with('success','Event Details Updated Successfully');
        
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteData=Events_Model::FindorFail($id);
        $deleteData->delete();
        return redirect()->route ('adminevents.index')->with ('success','Event has Been Deleted Successfully');
    }
}
