<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use DataTables;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CategoryExcel;
use Session; 

class CategoryController extends Controller
{
    public function category(Request $request)
    {
        $Category = category::where('Admin_Id',session()->get('Admin_Id'))->where('Category_Name', 'LIKE', '%'.$request->input('term', '').'%')->get(['Id as id', 'Category_Name as text']);
        return ['results' => $Category];
    }
    public function Returnview()
    {
        return view('auth.Category.index');
    }
    public function CheckCategory(request $r)
    {
        $category = category::where('Category_Name', $r['Cname'])->get();
        return response()->json($category);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = category::where('Admin_Id',session()->get('Admin_Id'))->latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<button type="button" id="'.$row->Id.'" class="btn updatecategory bg-teal-400 btn-labeled btn-labeled-left rounded-round legitRipple"><b><i class="icon-pen"></i></b> Edit</button>';
   
                           $btn = $btn.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" id="'.$row->Id.'" class="btn btn-danger btn-labeled deltecategory btn-labeled-left rounded-round legitRipple"><b><i class="icon-cross3"></i></b> Delete</button>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('auth.Category.index')->with('products');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function updatecategory(Request $r)
     {
        category::where('Id',$r['Id'])->update(['Category_Name' => $r->upName]);        

         return response()->json(['success'=>'Product saved successfully.']);
         
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
        try {
            $Category = new category();
            $Category->Category_Name = $request['Cname'];
            $Category->Status = 1;
            $Category->Admin_Id=session()->get('Admin_Id');        
            return response()->json($Category->save());
        }
        catch (exception $e) {
            return response()->json($e);
        }
        finally {
            
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $r)
    {
        //
        $Category = category::find($r['Id']);
        return response()->json($Category);
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
    public function destroy(Request $request)
    {
        //
        try {
        
            category::where('Id',$request['Id'])->delete();        

            return response()->json(['success'=>'Category Delete Sucessfully.']);
         }
        catch (exception $e) {
            return response()->json($e);
        }
        finally {
            
        }
    }

    public function export()
    {
        return Excel::download(new CategoryExcel,' -- Category.xlsx');
    }
}
