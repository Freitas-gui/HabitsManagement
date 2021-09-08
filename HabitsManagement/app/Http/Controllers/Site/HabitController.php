<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Habit;

class HabitController extends Controller
{
    protected $habit;

    public function __construct()
    {
        $this->habit = new Habit();
    }

    public function index(Request $request)
    {
        $user = auth()->user();
        $habits = Habit::where('user_id', $user->getAuthIdentifier())->get();

        return view('system.habit.index', ['habits' => $habits]);
    }

    public function create()
    {
        return view('system.habit.create');
    }
//
//    public function store(Request $request)
//    {
//        $habit = new Habit($request);
//
//        if (!($habit instanceof Habit)) {
//            return redirect()->route('create');
//        }
//        else{
//            $request->session()->flash("message_success", "New Habits Movement Created with Success");
//            ManageCookies::createCookieLastMovement($habit);
//            return redirect()->route('index');
//        }
//    }
//
//    public function show($id)
//    {
//        //
//    }
//
//    public function edit(Request $request, Habit $habit, CreateOfHabits $updateOfHabits)
//    {
//        $habit = $updateOfHabits->updateHabits($request, $habit);
//
//        if(!($habit instanceof Habit))
//            $request->session()->flash("message", $habit);
//        else
//            $habit->save();
//
//        return redirect()->route('index');
//    }
//
//    public function update(Request $request, Habit $habit)
//    {
//        return view('habits.create',compact('habit'));
//    }
//
//    public function destroy(Habit $habit)
//    {
//        $habit->delete();
//        return redirect()->route('index');
//    }
}
