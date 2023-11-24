<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showCustomersTicket()
    {
        $data['ticketData']=Ticket::paginate(10);
        return view('pages.employees.tickets', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.customers.tickets');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ticketData = request()->except('_token');

        //If image exist
        if($request->hasFile('image')){
            $ticketData['image']=$request->file('image')->store('img','public');
        }

        Ticket::insert($ticketData);
        return response()->json($ticketData);
    }

    /**
     * Display the specified resource.
     */
    public function showMyTicket(Ticket $ticket)
    {
        $data['ticketData']=Ticket::paginate(10);
        return view('pages.customers.ownTickets', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
