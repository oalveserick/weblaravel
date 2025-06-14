<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;

class EventController extends Controller
{
    public function index(){

    $search = request('search');
    if($search){
        $events = Event::where([
            ['title', 'like', '%'.$search.'%']
        ])->get();
    } else {
    $events = Event::all();
    }

    return view('welcome', ['events' => $events, 'search' => $search]);
    }

    public function create(){
        return view('events.create');
    }

    public function store(Request $request){
        $event = new Event;

        $event->title = $request->title;
        $event->city = $request->city;
        $event->description = $request->description;
        $event->private = $request->private;
        $event->date = $request->date;
        $event->items = $request->items;

        //upload img
        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            $requestImg = $request->img;
            $extension = $requestImg->extension();
            $imgName = md5($requestImg->getClientOriginalName().strtotime("now")). "." . $extension;

            $request->img->move(public_path('img/events'), $imgName);
            $event->img = $imgName;
        }

        $user = auth()->user();
        $event->user_id = $user->id;

        $event->save(); 

        return redirect('/')->with('msg','Evento criado com sucesso!');
    }

    public function show($id){
    
    $event = Event::findOrFail($id);
    $user = auth()->user();
    $hasUserJoined = false;

    if($user){
        $userEvents = $user->eventAsParticipant->toArray();
    }

    foreach($userEvents as $userEvent){
        if($userEvent['id'] == $id){
            $hasUserJoined = true;
        }
    }
    

    $eventOwner = User::where('id', $event->user_id)->first()->toArray();
    return view('events.show',['event'=>$event, 'eventOwner'=>$eventOwner, 'hasUserJoined' => $hasUserJoined]);
    }


    public function dashboard(){
        $user = auth()->user();
        $events = $user->events;
        $eventAsParticipant = $user->eventAsParticipant;
        return view('events.dashboard',['events'=>$events,'eventasparticipant'=>$eventAsParticipant]);
    }

    public function destroy($id){
        Event::findOrFail($id)->delete();
        return redirect('/dashboard')->with('msg', 'Evento excluído com sucesso');
    }

    public function edit($id){
        $user = auth()->user();
        $event = Event::findOrFail($id);
        if($user->id != $event->user_id){
            return redirect('/dashboard');    
        }
        return view('events.edit', ['event'=>$event]);
    }

    public function update(Request $request){

        $data = $request->all();

        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            $requestImg = $request->img;
            $extension = $requestImg->extension();
            $imgName = md5($requestImg->getClientOriginalName().strtotime("now")). "." . $extension;

            $request->img->move(public_path('img/events'), $imgName);
            $data['img'] = $imgName;
        }

        Event::findOrFail($request->id)->update($data);

        return redirect('/dashboard')->with('msg', 'Evento editado com sucesso');
    }

    public function joinEvent($id){
        $user = auth()->user();
        $user->eventAsParticipant()->attach($id);
        $event = Event::findOrFail($id);
        return redirect('/dashboard')->with('msg','Sua presença está confirmada no evento:'.$event->title);
    }

    public function leaveEvent($id){
        $user = auth()->user();
        $event = Event::findOrFail($id);
        $user->eventAsParticipant()->detach($id);
        return redirect('/dashboard')->with('msg','Você saiu com sucesso do evento:'.$event->title);
    }
}


