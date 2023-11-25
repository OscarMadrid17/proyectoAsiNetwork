<?php

namespace App\Http\Controllers\Tickets;

use App\AppConstants;
use App\Models\Ticket;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
}
