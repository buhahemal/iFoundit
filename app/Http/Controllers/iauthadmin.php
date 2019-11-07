<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\admin_info;
use DB;
use Session;

class iauthadmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('Auth.Dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function Getlogin(Request $request)
    { 
        
        $post=$request->all();
        $User=DB::table("iadmin")->where("Username",$post["Username"])->where("Password",$post["password"])->get();
         
        if(isset($User[0]))
            {
                
                $request->session()->put('Admin_Id',$User[0]->id);
                $request->session()->put('AdminName',$User[0]->Username);
                return redirect('/Dashboard');
            }
            else {
                \Session::flash('Login',"Invalid Login");
                return redirect()->back();
            } 
    }
    
    public function create()
    {
        //
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
