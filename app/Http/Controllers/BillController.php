<?php namespace Bdgt\Http\Controllers;

use Bdgt\Resources\Bill;

class BillController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index()
    {
        $bills = Bill::all();

        $bills->sortBy(function($bill) {
            return $bill->nextDue();
        });

        $c['bills'] = $bills;

        return view('bill/index', $c);
    }
}
