<?php

namespace App\Http\Controllers\Tickets;

use App\AppConstants;
use App\Models\Ticket;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CustomersTicketsController extends Controller
{
    public function tickets(Request $request) {
        $customer = Customer::where('access_token', $request->cookie('access_token'))->firstOrFail();
        $tickets = $customer->tickets;

        return view('pages.customers.tickets', [
            'tickets' => $tickets
        ]);
    }

    public function tickets_create(Request $request) {
        $contacts = $this->sendHttpRequest(
            AppConstants::CUSTOMERS_API_USER_DETAILS,
            $request->cookie('access_token'),
            AppConstants::HTTP_GET,
            []
        );

        if (!empty($contacts['error'])) {
            return back()->withErrors([ 'login_error' => var_dump($contacts['error']) ])->onlyInput('email');
        }

        if (!empty($contacts) && !empty($contacts['contactos'])) {
            $customer_details = $contacts['contactos'][0];
        }

        $customer_services = $this->sendHttpRequest(
            AppConstants::CUSTOMERS_API_USER_SERVICES,
            $request->cookie('access_token'),
            AppConstants::HTTP_GET,
            []
        );

        if (!empty($customer_services['error'])) {
            return back()->withErrors([ 'login_error' => var_dump($customer_services['error']) ])->onlyInput('email');
        }

        if (!empty($customer_services) && !empty($customer_services['planes'])) {
            $customer_services = $customer_services['planes'];
        }

        return view('pages.customers.tickets_create', [
            'customer_details'  => $customer_details,
            'customer_services' => $customer_services,
            'report_types'      => AppConstants::REPORT_TYPES
        ]);
    }

    public function tickets_preview(Request $request, $id) {
        $customer = Customer::where('access_token', $request->cookie('access_token'))->firstOrFail();
        $ticket = $customer->tickets->where('id', $id)->firstOrFail();

        return view('pages.customers.tickets_preview', [
            'ticket' => $ticket
        ]);
    }

    public function tickets_file_preview(Request $request, $id) {
        $customer = Customer::where('access_token', $request->cookie('access_token'))->firstOrFail();
        $ticket = $customer->tickets->where('id', $id)->firstOrFail();

        if (Storage::exists($ticket->file)) {
            $attachment = Storage::get($ticket->file);
            $ext = pathinfo($ticket->file)['extension'];

            return response()->make($attachment)->header('Content-Type', AppConstants::MIME_TYPES[$ext]);
        } else {
            return response()->json('Archivo adjunto no encontrado.');
        }
    }

    public function tickets_store(Request $request)
    {
        $request->validate([
            'name'                      => 'required|string|max:255',
            'email'                     => 'required|string|email|max:255',
            'phone_number'              => 'required|string|max:255',

            'contact_name'              => 'nullable|string|max:255',
            'first_contact_email'       => 'nullable|string|email|max:255',
            'second_contact_email'      => 'nullable|string|email|max:255',

            'affected_service'          => 'required|string|max:510',
            'report_type'               => 'required|integer|in:' . implode(',', array_keys(AppConstants::REPORT_TYPES)),
            'detection_date'            => 'required',
            'detection_time'            => 'required',
            'visit_schedule_datetime'   => 'nullable',

            'internal_customer_ticket'  => 'nullable|string|max:255',
            'description'               => 'nullable|string|max:10000',
            'visit_requirement'         => 'nullable|string|max:10000',
            'file'                      => 'nullable|file|mimes:jpeg,jpg,png',
        ]);

        // Get ticket data
        $ticketData = $request->except('_token');
        $ticketData['file'] = '';
        $customer = Customer::where('access_token', $request->cookie('access_token'))->firstOrFail();
        $ticketData['affected_service_id'] = explode("||", $ticketData['affected_service'])[0];
        $ticketData['affected_service_name'] = explode("||", $ticketData['affected_service'])[1];

        if ($request->hasFile('file')) {
            $new_filename = date('Y-m-d-H-i-s-') . $request->file('file')->getClientOriginalName();
            $ticketData['file'] = '/ticket_attachments/' . $new_filename;

            $request->file('file')->storeAs(
                '/ticket_attachments',
                $new_filename
            );
        }

        // Format date before inject the data to Database
        $ticketData['detection_date']               = Carbon::createFromFormat('d/m/Y', $request->input('detection_date'))->format('Y-m-d');

        if ($request->visit_schedule_datetime) {
            $ticketData['visit_schedule_datetime']      = Carbon::createFromFormat('d/m/Y', $request->input('visit_schedule_datetime'))->format('Y-m-d');
        }

        $ticketData = Ticket::create([
            'name'                      => $ticketData['name'],
            'email'                     => $ticketData['email'],
            'phone_number'              => $ticketData['phone_number'],

            'contact_name'              => $ticketData['contact_name'],
            'first_contact_email'       => $ticketData['first_contact_email'],
            'second_contact_email'      => $ticketData['second_contact_email'],

            'affected_service_id'       => $ticketData['affected_service_id'],
            'affected_service_name'     => $ticketData['affected_service_name'],

            'report_type'               => $ticketData['report_type'],
            'detection_date'            => $ticketData['detection_date'],
            'detection_time'            => $ticketData['detection_time'],
            'visit_schedule_datetime'   => $ticketData['visit_schedule_datetime'] ?? null,
            'internal_customer_ticket'  => $ticketData['internal_customer_ticket'],
            'description'               => $ticketData['description'],
            'visit_requirement'         => $ticketData['visit_requirement'],
            'file'                      => $ticketData['file'] != '' ? $ticketData['file'] : '',
            'customer_id'               => $customer->id,
        ]);

        return redirect(route('customers.tickets'))->with(['ticket_stored' => 'Ticket creado exitosamente!']);
    }
}
