<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Event;
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
                       ->get(['id', 'title', 'start', 'end']);
            return response()->json($data);
    	}

		$loggedInUser = Auth::user();

		$users = User::whereKeyNot($loggedInUser->getKey())->get();

    	return view('/calendario/calendario', compact('users','loggedInUser'));
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
		// dd($request->title);

		$dados = $request->all('start', 'end', 'title');
        $dados['user_id'] = auth()->user()->id;
        
        $evento = Event::create($dados);

        return redirect()->route('full-calender');
	}

	public function update(Request $request){

		$this->objEvent->where(['id'=>$request->id])->update([
            'title' => $request->title,
            'start' => $request->start,
            'end'   => $request->end
        ]);

        return redirect('full-calender');
	}
}
