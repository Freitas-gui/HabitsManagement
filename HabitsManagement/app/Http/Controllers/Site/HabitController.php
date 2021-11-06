<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Habit;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class HabitController extends Controller
{
    protected $habit;

    public function __construct()
    {
        $this->habit = new Habit();
    }

    public function index(Request $request): View
    {
        $user = auth()->user();
        $habits = Habit::where('user_id', $user->getAuthIdentifier())->get();

        return view('system.habit.index', ['habits' => $habits]);
    }

    public function create()
    {
        return view('system.habit.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->all();
        if (auth()->check()) {
            $data['user_id'] = auth()->user()->getAuthIdentifier();
        }
        $habit = new Habit($data);
        $habit->save();

        $request->session()->flash("message_success", "New Habit Created with Success");
        return redirect()->route('habit.index');
    }

    public function show($id)
    {
        return redirect()->route('habit.index');
    }

    public function edit($id)
    {
        $habit = Habit::find($id);

        return view('system.habit.edit', ['habit' => $habit]);
    }

    public function update(Request $request, $id)
    {
        $habit = Habit::find($id);
        if ($habit->update($request->all()) == false) {
            return back()->withInput($request->all())->withErrors('Some field is wrong');
        }

        $request->session()->flash("message_success", "Habit Updated with Success");
        return redirect()->route('habit.index');
    }

    public function destroy($id)
    {
        $habit = Habit::find($id);
        if ($habit->delete() == false) {
            Session::flash("message_error", "Something wrong! No was possible delete this habit");
            return redirect()->route('habit.index');
        }

        Session::flash("message_success", "New Habit Deleted with Success");
        return redirect()->route('habit.index');
    }
}
