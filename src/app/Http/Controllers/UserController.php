<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Dot pertemuan 6
        $trans=DB::connection('mysql')->table('users')->get();
        return response()->json($trans);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //Dot pertemuan 6
        $timestamp = \Carbon\Carbon::now()->toDateTimeString();
        $this->validate($request, [
            'username'=> 'required',
            'password'=>'required,'
        ]);
        $request['created_at'] = $timestamp;
        $request['updated_at'] = $timestamp;

        $trans = DB::connection('mysql')->table('users')->insert($request->all());
        return response()->json(response("Berhasil Ditambahkan"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //DOT pertemuan 6
        $trans = DB::connection('mysql')->table('users')->where('id',$id)->first();
        return response()->json($trans);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //DOT pertemuan 6
        $trans = DB::connection('mysql')->table('users')->where('id',$id)->get();
        return response()->json("EDIT $trans");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //DOT pertemuan 6
        $timestamp = \Carbon\Carbon::now()->toDateTimeString();
        $request['Updated_at']=$timestamp;
        $trans=DB::connection('mysql')->table('users')->where('id', $id)->update();
        return response()->json("Berhasil Update Data");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //DOT Pertemuan 6
        $trans = DB::connection('mysql')->table('users')->where('id',$id)->delete();
        return response()->json(response("Berhasil hapus"));
    }
}
