<?php

namespace App\Http\Controllers;

use App\models\Charge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ChargeController extends Controller
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
                return $charges = DB::table('charges')->where('title', 'like', $_REQUEST['filter'].'%')
                               ->paginate(($per_page) ? $_REQUEST['per_page'] : 20);
            }else{
                return $charges = DB::table('charges')->paginate(($per_page) ? $_REQUEST['per_page'] : 20);
            }

        }else{
            return $charges = DB::table('charges')->paginate(($per_page) ? $_REQUEST['per_page'] : 20); 
        }

    }

    public function fetchall(){


        $charges = Charge::where('applicable', 1)->get();

        return $charges;

    }

    public function checkUnique($value=null)
    {
        $unique = Charge::where('title', $value)->first();

        if ($unique) {
            echo 1;
        }else{
            echo 0;
        }
    }

    public function checkUniqueSame($id=null, $value=null)
    {
        $unique = Charge::find($id);

        if ($unique->title == $value) {
            echo 0;
        }elseif(Charge::where('title', $value)->first()){
            echo 1;
        }else{
            echo 0;  
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $credentials = $request->input('params');
        $rules = [
            'title' => 'required|unique:charges|min:3',
            'price' => 'required|integer',
            'category' => 'required|integer',
            'admission' => 'sometimes',
        ];

        $validator = Validator::make($credentials, $rules);

        if(!$validator->fails()) {

            $admissionCn = ($credentials['admission']) ? $credentials['admission'] . ' PKR' : '';

            $saved = Charge::create([

                    'title' => $credentials['title'],
                    'price' => $credentials['price'] . ' PKR',
                    'category' => $credentials['category'],
                    'admission' => $admissionCn,
                    'applicable' => 0,
            ]);

                if ($saved) {
                    echo 1;
                }else{
                    echo 0;
                }


        }else{
            
            return response()->json(['success' => false, 'error' => $validator->messages()], 200);
            // return response()->json(['data' =>['success'=> false, 'error'=> ]]);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\models\Company  $charge
     * @return \Illuminate\Http\Response
     */
    public function show(Charge $charge)
    {
        return $charge;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\models\Company  $charge
     * @return \Illuminate\Http\Response
     */
    public function editcharges(Request $request, Charge $charge)
    {

        $credentials['title'] = $request['title'];
        $credentials['price'] = $request['price'];
        $rules = [
            'title' => 'required|min:3|unique:charges,title,'.$request['id'],
            'price' => 'required|integer',
        ];

        $validator = Validator::make($credentials, $rules);

            if ($validator->fails()) {
               return response()->json(['success' => false, 'error' => $validator->messages()], 200);
            }else{

                $charge = Charge::find($request['id']);

                $charge->title = $credentials['title'];
                $charge->price = $credentials['price'] . ' PKR';
                $charge->save();

                return response()->json(['success' => true], 200);
            }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\Company  $charge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Charge $charge)
    {


        $credentials = $request->input('params');

        if ($credentials['purpose']) {

            // For Edit record

            $rules = [
                'title' => 'required|min:3|unique:charges,title,' . $charge->id,
                'price' => 'required|integer',
                'category' => 'required|integer',
                'admission' => 'sometimes',
            ];

            $validator = Validator::make($credentials, $rules);

            if ($validator->fails()) {
               return response()->json(['success' => false, 'error' => $validator->messages()], 200);
            }else{

                $charge->title = $credentials['title'];
                $charge->price = $credentials['price'] . ' PKR';
                $charge->category = $credentials['category'];
                $charge->admission = ($credentials['admission']) ? $credentials['admission'] . ' PKR' : '';
                $charge->save();

                return response()->json(['success' => true], 200);
            }


        }else{

            // For Update Status

        $status = $charge->applicable;

        if ($status == 1) {
            $charge->applicable = 0;
        }else{
            $charge->applicable = 1;
        }

        $charge->save();

        }






    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\Company  $charge
     * @return \Illuminate\Http\Response
     */
    public function destroy(Charge $charge)
    {
        $charge->delete();
    }
}
