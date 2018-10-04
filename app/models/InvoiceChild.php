<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class InvoiceChild extends Model
{
    protected $table = 'invoicechildren';

    protected $fillable = [

    		  'invoice_id',
    		  'charges_id',
              'admission',
              'price',
              'title',
    		  'admission_price',
    ];


    /**
    * Get the parent record associated with the children.
    */
    public function invoice()
    {
        return $this->belongsTo('App\models\Invoice');
    }
}
