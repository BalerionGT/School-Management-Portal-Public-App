<?php

namespace App\Http\Controllers;

use App\Models\Chef;

use App\Models\User;
use App\Models\Seance;
use App\Models\students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SeanceAddedNotification;

class CalendarController extends Controller
{
    public function index(Request $request)
    {
    	if($request->ajax())
    	{
    		$data = Seance::whereDate('start_date', '>=', $request->start_date)
                       ->whereDate('end_date',   '<=', $request->end_date)
                       ->get(['id', 'title', 'start_date', 'end_date']);
            return response()->json($data);
    	}
    	return view('calendar/index');
    }

    public function action(Request $request)
    {
    	if($request->ajax())
    	{
    		if($request->type == 'add')
    		{
				
    			$seance = Seance::create([
    				'title'	=> $request->title,
    				'start_date'=> $request->start_date,
    				'end_date'=> $request->end_date
    			]);

				$student = User::all();
				
				$notificationMessage = 'A new seance has been added: ' . $request->title;

				Notification::send($student, new SeanceAddedNotification($notificationMessage));

    			return response()->json($seance);
    		}
			

    		if($request->type == 'update')
    		{
    			$seance = Seance::find($request->id)->update([
    				'title'		=>	$request->title,
    				'start_date'		=>	$request->start_date,
    				'end_date'		=>	$request->end_date
    			]);

    			return response()->json($seance);
    		}

    		if($request->type == 'delete')
    		{
    			$seance = Seance::find($request->id)->delete();

    			return response()->json($seance);
    		}
    	}
    }
        public function fetchseances(Request $request)
    {
        // Retrieve seances data from the database
        $seances = Seance::all();

        // Transform the seances data into the required format for FullCalendar
        $events = [];
        foreach ($seances as $seance) {
            $events[] = [
                'id' => $seance->id,
                'title' => $seance->title,
                'start' => $seance->start_date,
                'end' => $seance->end_date,
            ];
        }

        // Return the events data as JSON response
        return response()->json($events);
    }
    
	public function indexChef(Request $request)
    {
    	if($request->ajax())
    	{
    		$data = Seance::whereDate('start_date', '>=', $request->start_date)
                       ->whereDate('end_date',   '<=', $request->end_date)
                       ->get(['id', 'title', 'start_date', 'end_date']);
            return response()->json($data);
    	}

		$chef = Chef::find(Auth::id());
        $modules = DB::table('modules')
        ->join('fillières_modules', 'modules.id', '=', 'fillières_modules.module_id')
        ->where('fillières_modules.fillière_id', $chef->fillière)
        ->select('*')
        ->get();

    	return view('calendar/indexChef', compact('modules'));
    }
	public function indexEleve(Request $request)
    {
		$notifications = DB::table('notifications')
			->where('notifiable_id',Auth::id())
			->select('*')
			->get();
    	if($request->ajax())
    	{
    		$data = Seance::whereDate('start_date', '>=', $request->start_date)
                       ->whereDate('end_date',   '<=', $request->end_date)
                       ->get(['id', 'title', 'start_date', 'end_date']);
            return response()->json($data);
    	}
    	return view('calendar/indexEleve',compact('notifications'));
    }

	public function indexProf(Request $request)
    {
    	if($request->ajax())
    	{
    		$data = Seance::whereDate('start_date', '>=', $request->start_date)
                       ->whereDate('end_date',   '<=', $request->end_date)
                       ->get(['id', 'title', 'start_date', 'end_date']);
            return response()->json($data);
    	}
    	return view('calendar/indexProf');
	}
}
    
?>