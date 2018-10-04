<?php

namespace App\Http\Controllers;

use App\models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
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
                return $companies = DB::table('companies')->where('name', 'like', $_REQUEST['filter'].'%')
                               ->paginate(($per_page) ? $_REQUEST['per_page'] : 10);
            }else{
                return $companies = DB::table('companies')->paginate(($per_page) ? $_REQUEST['per_page'] : 10);
            }

        }else{
            return $companies = DB::table('companies')->paginate(($per_page) ? $_REQUEST['per_page'] : 10); 
        }

    }

    public function checkUnique($value=null)
    {
        $unique = Company::where('name', $value)->first();

        if ($unique) {
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
            'name' => 'required|unique:companies|min:4',
            'domain' => 'required|min:5',
            'address' => 'required|min:10',
            'phone' => 'required|max:11',
            'description' => 'required|min:40|max:800',
        ];

        $validator = Validator::make($credentials, $rules);

        if(!$validator->fails()) {

            $saved = Company::create([

                    'name' => $credentials['name'],
                    'domain' => $credentials['domain'],
                    'address' => $credentials['address'],
                    'phone' => $credentials['phone'],
                    'description' => $credentials['description'],
                    'status' => 0,
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
     * @param  \App\models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return $company;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
