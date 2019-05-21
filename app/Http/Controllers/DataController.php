<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\data;
use DB;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = data::all()->toArray();
        //compact will create an array from variable $Data which we can access in index view file in data folder
        return view('data.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
                'name' => 'required',
                'country' => 'required',
                'budget' => 'required',
                'goal' => 'required'
            ]
        );
        $data = new data([
            'name' => $request->get('name'),
            'country' => $request->get('country'),
            'budget' => $request->get('budget'),
            'goal' => $request->get('goal'),
            'category' => $request->get('category')
        ]);
        $data->save();
        return redirect()->route('data.create')->with('success', 'Data Added Successfully');
    }

    public function groupData($pars)
    {
        $groupBy = explode(",", $pars);
        $info = DB::table('data')
            ->select('name', 'country', 'budget', 'goal', 'category')
            ->groupBy($groupBy)
            ->get();
        return $info;
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}