<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoices';

    protected $fillable = [

    		  'invoice_id',
    		  'issued_on',
    		  'invoice_for',
    		  'invoice_messer',
    		  'applied_admission',
              'total',
              'cf1name',
              'cf1value',
              'cf1name2',
              'cf1value2',
              'cf1name3',
              'cf1value3',
              'cf1name4',
              'cf1value4',
              'cf1name5',
              'cf1value5',
    		  'instruction',
    		  'total_in_words',
    		  'payment_mode',
    		  'transaction_id',
    		  'branch_name',
    		  'invoice_status',
    		  'issued_on',
    ];


    /**
    * Get the children record associated with the invoice.
    */
    public function childs()
    {
        return $this->hasMany('App\models\InvoiceChild');
    }
}
