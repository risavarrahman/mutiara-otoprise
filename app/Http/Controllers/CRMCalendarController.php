<?php

namespace App\Http\Controllers;

use App\Models\CRMCalendar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CRMCalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $calendar = CRMCalendar::all();
        // return response()->json($calendar);
        $agenda = array();
        $calendar = CRMCalendar::all();
        foreach ($calendar as $calendar) {
            $agenda[] = [
                'id' => $calendar->id,
                'title' => $calendar->title,
                'start' => $calendar->start,
                'end' => $calendar->end,
                'extendedProps' => [
                    'notes' => $calendar->notes
                ],
                'color' => $calendar->color,
            ];
        }
        // return $agenda;
        if (Auth::user()->role == 1) {
            return view('dashboard.admin.calendar.calendar', [
                'title' => 'Calendar',
                'agenda' => $agenda
            ]);
        } else {
            return view('dashboard.user.calendar.calendar', [
                'title' => 'Calendar',
                'agenda' => $agenda
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (empty($request->calendar_id)) {
            $validator = $request->validate([
                'title' => 'required',
                'start' => 'required',
                'end' => 'required',
                'notes' => 'required',
                'color' => 'required',
            ]);
            CRMCalendar::create($validator);
            return redirect()->back();
        } else {
            CRMCalendar::where('id', $request->calendar_id)
                ->update([
                    'title' => $request->edit_title,
                    'start' => $request->edit_start,
                    'end' => $request->edit_end,
                    'notes' => $request->edit_notes,
                    'color' => $request->color,
                ]);
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CRMCalendar  $calendar
     * @return \Illuminate\Http\Response
     */
    public function show(CRMCalendar  $calendar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CRMCalendar  $calendar
     * @return \Illuminate\Http\Response
     */
    public function edit(CRMCalendar $calendar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CRMCalendar  $calendar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $calendar = CRMCalendar::find($id);
        // dd($calendar);
        $calendar->update([
            'title' => $request->title,
            'start' => $request->start,
            'end' => $request->end,
            'color' => $request->color,
            'notes' => $request->notes,
        ]);
        return response()->json('Event updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CRMCalendar  $calendar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $calendar = CRMCalendar::find($id);

        $calendar->delete();

        // dd($id);
        // return redirect()->back();
        // return response()->json('Event deleted');
        // return redirect('/admin/calendar');
        // return $id;
    }
}
