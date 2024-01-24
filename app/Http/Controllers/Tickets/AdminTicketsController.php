<?php

namespace App\Http\Controllers\Tickets;

use App\AppConstants;
use App\Models\Ticket;
use App\Http\Controllers\Controller;
use App\Models\TicketComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminTicketsController extends Controller
{
    public function tickets() {
        $tickets = Ticket::with('customer')->orderBy('created_at', 'desc')->get();

        return view('pages.admin.tickets', [
            'tickets' => $tickets
        ]);
    }

    public function tickets_preview(Request $request, $id) {
        $ticket = Ticket::where('id', $id)->with(['comments.user' => function($query) {
            $query->orderBy('created_at', 'DESC');
        }])->firstOrFail();

        return view('pages.admin.tickets_preview', [
            'ticket' => $ticket
        ]);
    }

    public function tickets_file_preview(Request $request, $id) {
        $ticket = Ticket::where('id', $id)->firstOrFail();

        if ($ticket->file != '' && Storage::exists($ticket->file)) {
            $attachment = Storage::get($ticket->file);
            $ext = pathinfo($ticket->file)['extension'];

            return response()->make($attachment)->header('Content-Type', AppConstants::MIME_TYPES[$ext]);
        } else {
            return response()->json('Archivo adjunto no encontrado.');
        }
    }

    public function tickets_status(Request $request) {
        $request->validate([
            'ticket_id'     => 'required|integer',
            'new_status'    => 'required|integer|in:' . implode(',', array_keys(AppConstants::TICKET_STATUSES))
        ]);

        $ticket = Ticket::where('id', $request->ticket_id)->firstOrFail();
        $ticket->status = $request->new_status;
        $ticket->save();

        return redirect(route('admin.tickets'))->with(['ticket_status_updated' => 'El estado del ticket se actualizo exitosamente.']);
    }

    public function tickets_comment(Request $request)
    {
        $request->validate([
            'ticket_id'     => 'required|string',
            'content'       => 'required|string|max:5000'
        ]);

        TicketComment::create([
            'created_by_customer'  => false,
            'user_id'              => auth()->user()->id,
            'ticket_id'            => $request->ticket_id,
            'content'              => $request->content
        ]);

        return redirect(route('admin.tickets.preview', [ 'id' => $request->ticket_id ]));
    }
}
