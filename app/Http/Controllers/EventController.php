<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\events;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;

class EventController extends Controller
{
    public function index()
    {
        $events = events::all();
        $event = [];
       
        foreach ($events as $row) {
             $event[]= \Calendar::event(
              $row->title,
              true,    
              // false para poner la hora
              new \DateTime($row->FechaInicio),
               new \DateTime($row->FechaFin),
              $row->id,
              [
                'color' => $row->color,
              ]
             );
         } 
         $calendar = \Calendar::addEvents($event); 
        return view('/usuario/events',compact('events','calendar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fullcalendar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this ->validate($request, [
            'title'=> 'required',
            'color'=> 'required',
            'FechaInicio'=>'required',
            'FechaFin'=>'required',
        ]);
        $events = new events;
        $events->title = $request->input('title');
        $events->color=$request->input('color');
        $events->FechaInicio=$request->input('FechaInicio');
        $events->FechaFin=$request->input('FechaFin');
        $events->save();

        return redirect('/usuario/events')->with('success','Events Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function display(){
        return view('/usuario/addEvents');

    }



    public function show()
    {
        $events = events::all();
        return view('/usuario/display')->with('events',$events);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $events = events::find($id);
         return view('/usuario/editform',compact('events','id'));
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
        $this ->validate($request, [
            'title'=> 'required',
            'color'=> 'required',
            'FechaInicio'=>'required',
            'FechaFin'=>'required',
        ]);

         $events = events::find($id);

        $events->title = $request->input('title');
        $events->color=$request->input('color');
        $events->FechaInicio=$request->input('FechaInicio');
        $events->FechaFin=$request->input('FechaFin');

         $events->save();

         return redirect('/usuario/events')->with('success','event updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $events = events::find($id);
         $events->delete();

       return redirect('/usuario/events')->with('success','event deleted');   

    }
}
