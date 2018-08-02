<?php
namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;

class HodaController extends Controller
{
//
    public function index()
    {
        $tickets = Ticket::where('user_id', auth()->user()->id)->get();
        return view('hodas.index', compact('tickets'));
    }
    public function create()
    {
        return view('hodas.create');
    }
    public function store(Request $request)
    {
        $hoda = new Ticket();
        $data = $this->validate($request, ['description' => 'required', 'title' => 'required']);
        $hoda->saveTickets($data);
        return redirect('/home')->with('success', 'New support ticket has been created!. Wait somotime to get resolved');

    }
    public function edit($id)
    {
        $ticket = Ticket::where('user_id', auth()->user()->id)->where('id', $id)->first();
        return view('hodas.edit', compact('ticket', 'id'));
    }
    public function update(Request $request, $id)
    {
        $ticket = new Ticket();
        $data   = $this->validate($request, [
            'description' => 'required',
            'title'       => 'required',
        ]);
        $data['id'] = $id;
        $ticket->updateTicket($data);

        return redirect('/home')->with('success', 'New support ticket has been updated!!');
    }
    public function destroy($id)
    {
        $ticket = Ticket::find($id);
        $ticket->delete();

        return redirect('/home')->with('success', 'Ticket has been deleted!!');
    }
}
