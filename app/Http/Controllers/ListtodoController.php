<?php

namespace App\Http\Controllers;

use App\Listtodo;
use Illuminate\Http\Request;

class ListtodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $listtodos = Listtodo::all();

        return response()->json(['data' => $listtodos], 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $rules = [
            'message' => 'required'
        ];

        $this->validate($request, $rules);

        $data = $request->all();

        $newlisttodo = Listtodo::create($data);
        
        return response()->json(['data'=> $newlisttodo], 201);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      
        $listtodo = Listtodo::findOrFail($id);

        $listtodo->delete();

        return response()->json(['data' => $listtodo],202);
    }
}
