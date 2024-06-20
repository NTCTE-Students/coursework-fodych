<?php
// app/Http/Controllers/EventController.php
namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EventController extends Controller
{
    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date',
            'participants' => 'nullable|string',
        ]);

        $data = $request->all();

        // Преобразуйте участников в массив
        $data['participants'] = $request->participants ? explode(',', $request->participants) : [];

        Event::create($data);

        // Добавляем флеш-сообщение
        return redirect()->route('events.index')->with('success', 'Событие успешно создано!');
    }

    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }
}
