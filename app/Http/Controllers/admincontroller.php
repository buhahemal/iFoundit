<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Items; 
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductExport;
use Session;
use DataTables;
use APP\iitems;
use Illuminate\Support\Facades\Input;

class admincontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::select("SELECT `it`.*, `us`.`Username` As `PostUsername`,`cl`.`Username` AS `ClaimUsername`,`ct`.`Category_Name`
            FROM `iitems` AS `it`
            	LEFT JOIN `users` AS `cl` ON `it`.`ClaimUserId` = `cl`.`Id`
                LEFT JOIN `users` AS `us` ON `it`.`UserId` = `us`.`Id` 
                LEFT JOIN `icategory` AS `ct` ON `it`.`Cat_id` = `ct`.`id` order by it.Id desc");
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->make(true);
        }
      
        return view('auth.products.products');
    }
    public function ProductExportExcel()
    {
        return Excel::download(new ProductExport,' -- Product.xlsx');
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
