<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Client;
use App\Models\User;

class FullCalenderController extends Controller
{
	private $objEvent;

	public function __construct(){
        $this->objEvent = new Event();
    }

    public function index(Request $request)
    {
    	if($request->ajax())
    	{
    		$data = Event::whereDate('start', '>=', $request->start)
                       ->whereDate('end',   '<=', $request->end)
                       ->get(['id', 'title', 'start', 'end','client','description','color','user_id']);
            return response()->json($data);
    	}

		$loggedInUser = Auth::user();
		// $users = User::whereKeyNot($loggedInUser->getKey())->get();

		$clientes = Client::all();

    	return view('/calendario/calendario', compact('clientes','loggedInUser'));
    }
    public function action(Request $request)
    {
    	if($request->ajax())
    	{
    		if($request->type == 'add')
    		{
    			$event = Event::create([
    				'title'		=>	$request->title,
    				'start'		=>	$request->start,
    	            'end'		=>	$request->end
    			]);

    			return response()->json($event);
    		}

    		if($request->type == 'update')
    		{
    			$event = Event::find($request->id)->update([
    				'title'		=>	$request->title,
    				'start'		=>	$request->start,
    				'end'		=>	$request->end
    			]);

    			return response()->json($event);
    		}

    		if($request->type == 'delete')
    		{
    			$event = Event::find($request->id)->delete();

    			return response()->json($event);
    		}
    	}
    }

	public function create(Request $request){

		$dados = $request->all('client', 'description', 'start', 'end', 'title','color');
        $dados['user_id'] = auth()->user()->id;
		
        $evento = Event::create($dados);

        return redirect()->route('full-calender');
	}

	public function update(Request $request){

		$this->objEvent->where(['id'=>$request->id])->update([
            'title' => $request->title,
            'start' => $request->start,
            'end'   => $request->end,
            'description'   => $request->description,
            'color'   => $request->color,
            'client'   => $request->client
        ]);
		
        return redirect('full-calender');
	}
}
