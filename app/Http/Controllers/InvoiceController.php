<?php

namespace App\Http\Controllers;

use App\models\Invoice;
use App\models\InvoiceChild;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $filter=null, $per_page=null)
    {
        $filter = isset($_REQUEST['filter']);
        $per_page = isset($_REQUEST['per_page']);

        if ($filter) {

            if ($_REQUEST['filter'] != '') {
                return $invoices = DB::table('invoices')
                ->where('invoice_id', 'like', $_REQUEST['filter'].'%')
                ->orWhere('invoice_for', 'like', $_REQUEST['filter'].'%')
                ->orWhere('invoice_messer', 'like', $_REQUEST['filter'].'%')
                ->orWhere('total', 'like', $_REQUEST['filter'].'%')
                ->orWhere('payment_mode', 'like', $_REQUEST['filter'].'%')
                ->orWhere('branch_name', 'like', $_REQUEST['filter'].'%')
                ->orWhere('invoice_status', 'like', $_REQUEST['filter'].'%')
                ->paginate(($per_page) ? $_REQUEST['per_page'] : 20);
            }else{
                return $invoices = DB::table('invoices')->paginate(($per_page) ? $_REQUEST['per_page'] : 20);
            }

        }else{
            return $invoices = DB::table('invoices')->paginate(($per_page) ? $_REQUEST['per_page'] : 20); 
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

    private function generateInvoice($value=null)
    {
        $prevID = '';
        $newYear = '';

        if (isset($value->invoice_id)) {
            $prevID = explode('-', $value->invoice_id);

            $oldyear = $prevID[0];

            if ($oldyear == date('Y')) {
                $newYear = $oldyear;
            }else{
                $newYear = date('Y');
            }

            $number = $prevID[1];
            $newnumber = $number + 1;
            return $newYear.'-'.str_pad($newnumber, 6, '0', STR_PAD_LEFT);

        }else{
            return date('Y').'-000001';
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        $invoice_id = DB::table('invoices')->orderBy('id', 'desc')->first();

        $newinvoice = $this->generateInvoice($invoice_id);

        $inserted = '';
        $invoiceChild = '';
        $applied_admission = ($request['params']['Values'][0]) ? 1 : 0;
        $transaction_id = ($request['params']['Check']) ? $request['params']['Check'] : '';
        $branch_name = ($request['params']['Branch']) ? $request['params']['Branch'] : '';
        $cf1name = ($request['params']['CF1NAME']) ? $request['params']['CF1NAME'] : null;
        $cf1value = ($request['params']['CF1VALUE']) ? $request['params']['CF1VALUE'] : null;
        $cf1name2 = ($request['params']['CF1NAME2']) ? $request['params']['CF1NAME2'] : null;
        $cf1value2 = ($request['params']['CF1VALUE2']) ? $request['params']['CF1VALUE2'] : null;
        $cf1name3 = ($request['params']['CF1NAME3']) ? $request['params']['CF1NAME3'] : null;
        $cf1value3 = ($request['params']['CF1VALUE3']) ? $request['params']['CF1VALUE3'] : null;
        $cf1name4 = ($request['params']['CF1NAME4']) ? $request['params']['CF1NAME4'] : null;
        $cf1value4 = ($request['params']['CF1VALUE4']) ? $request['params']['CF1VALUE4'] : null;
        $cf1name5 = ($request['params']['CF1NAME5']) ? $request['params']['CF1NAME5'] : null;
        $cf1value5 = ($request['params']['CF1VALUE5']) ? $request['params']['CF1VALUE5'] : null;


        $inserted = Invoice::create([
            'invoice_id' => $newinvoice,
            'issued_on' => $request['issued_on'],
            'instruction' => $request['params']['Instructions'],
            'invoice_for' => $request['params']['Member'],
            'cf1name' => $cf1name,
            'cf1value' => $cf1value . ' PKR',
            'cf1name2' => $cf1name2,
            'cf1value2' => $cf1value2 . ' PKR',
            'cf1name3' => $cf1name3,
            'cf1value3' => $cf1value3 . ' PKR',
            'cf1name4' => $cf1name4,
            'cf1value4' => $cf1value4 . ' PKR',
            'cf1name5' => $cf1name5,
            'cf1value5' => $cf1value5 . ' PKR',
            'applied_admission' => $applied_admission,
            'invoice_messer' => $request['params']['Messer'],
            'total' => $request['params']['Total'],
            'total_in_words' => $request['total_in_words'],
            'payment_mode' => $request['params']['Mode'],
            'transaction_id' => $transaction_id,
            'branch_name' => $branch_name,
            'invoice_status' => 0,
        ]);


        if ($inserted) {


                
                foreach ($request['params']['Values'] as $k) {

                $valid = (in_array($k['title'],$request['params']['Admission'])) ? 1 : 0;


                            $child = InvoiceChild::create([
                                'invoice_id' => $inserted->id,
                                'title' => $k['title'],
                                'admission' => $valid,
                                'price' => $k['price'],
                                'admission_price' => $k['admission'],
                            ]);

            }

        }else{

            return 'Something went wrong';

        }

         return $newinvoice;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Invoice $invoice)
    {

            $newdata = [];

            array_push($newdata, $invoice);
            array_push($newdata, $invoice->childs);
            return $newdata;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
            // For Update Status

        $status = $invoice->invoice_status;

        if ($status == 1) {
            $invoice->invoice_status = 0;
        }else{
            $invoice->invoice_status = 1;
        }

        $invoice->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        $k = InvoiceChild::where('invoice_id', $invoice->id)->get();

        foreach ($k as $e) {
            $e->delete();
        }

        $invoice->delete();
    }
}
