<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Items;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use DataTables;
use APP\iitems;
use Illuminate\Support\Facades\Input; 
use Image;
use Illuminate\Support\Facades\Mail;
use App\Mail\Claimsentmail;
use App\Mail\AcceptclaimMail;
use App\Mail\cancelclaimMail;
class Itemcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
   
    
    
    public function getemailid(Request $request)
    {
        $post=$request->all();
        $User=DB::table("users")->where('Id',$post['Id'])->select('Email')->get();
        
        return response()->json($User);
    }
    public function aditem()
    {
        return view('auth.products.products');
    }
    
    public function checknotification(Request $request)
    {
        $post=$request->all();
        $data=[];
        $data[0]=DB::table('iitemcliam')->where('PostUserId',$post['Id'])->where('Status',1)->limit(1)->first();
        $data[1]=DB::table('iitems')->where('Id',$data[0]->ItemId)->first();
        return response()->json($data);
    }
    public function claimaccept(Request $request)
    {
        $post=$request->all();
        $result=DB::select(DB::raw("SELECT `ic`.*, `us`.*
        FROM `iitemcliam` AS `ic`, `users` AS `us` WHERE ic.ClaimUserId='".$post['Id']."' AND us.Id=ic.PostUserId AND ic.Status=3"));
       
        return response()->json($request);
    }
    public function notificationupdate(Request $request)
    {
        $post=$request->all();
         $claimupdate=DB::table('iitemcliam')->where('Id',$post['Id'])->update([
            'Status' => $post['Status']
         ]);
          $claiim=DB::table('iitemcliam')->where('Id',$post['Id'])->first();
         $claimuser=DB::table('users')->where('Id',$claiim->ClaimUserId)->get();
         $postuser=DB::table('users')->where('Id',$claiim->PostUserId)->get();
         $item=DB::table('iitems')->where('Id',$claiim->ItemId)->get();
         if($post['Status']==2)
         {
            $D_email = new \stdClass();
            $D_email->sender = 'iFoundit';
            $D_email->receiver = $claimuser[0]->Email;
            $D_email->claimusername = $claimuser[0]->Username;
            $D_email->itemName = $item[0]->Name;
            $D_email->itempostdate = $item[0]->created_at;
            $D_email->cliamdescription = $claiim->CliamDescription;
            
                try{ 
                    Mail::to($claimuser[0]->Email)->send(new cancelclaimMail($D_email));
                }
                catch(Exception $e){
                    print_r($e);
                }
         }
         if($post['Status']==3)
         {

             //sucess accept
             
            $claimupdate=DB::table('iitems')->where('Id',$claiim->ItemId)->update([
                'Status' => 2,"ClaimUserId"=>$claiim->ClaimUserId
             ]);
 

             $D_email = new \stdClass();
             $D_email->sender = 'iFoundit';
             $D_email->receiver = $claimuser[0]->Email;
             $D_email->claimusername = $claimuser[0]->Username;
             $D_email->itemName = $item[0]->Name;
             $D_email->itempostdate = $item[0]->created_at;
             $D_email->postuseremail = $postuser[0]->Email;
             $D_email->cliamdescription = $claiim->CliamDescription;
             
                 try{ 
                     Mail::to($claimuser[0]->Email)->send(new AcceptclaimMail($D_email));
                 }
                 catch(Exception $e){
                     print_r($e);
                 }
      
         }

        return response()->json($claimupdate);
    }
    public function claimuser(Request $request) 
    {
        if($request->session()->has('UserId'))
        {
            $post=$request->all();
            $claim=DB::table('iitemcliam')->InsertGetId(["ItemId"=>$post['itemid'],"PostUserId"=>$post['postUserId'],"ClaimUserId"=>Session::get('UserId'),"CliamDescription"=>$post['ClaimDesription'],"Status"=>1]);
            if($claim>0)
            {
                $postuser=DB::table('users')->where('Id',$post['postUserId'])->get();
                $cliamuser=DB::table('users')->where('Id',Session::get('UserId'))->get();
                $item=DB::table('iitems')->where('Id',$post['itemid'])->get();
                $D_email = new \stdClass();
                $D_email->sender = 'iFoundit';
                $D_email->receiver = $postuser[0]->Email;
                $D_email->Postusername = $postuser[0]->Username;
                $D_email->itemName = $item[0]->Name;
                $D_email->itempostdate = $item[0]->created_at;
                $D_email->cliamdescription = $post['ClaimDesription'];

                
                    try{ 
                        Mail::to($postuser[0]->Email)->send(new Claimsentmail($D_email));
                    }
                    catch(Exception $e){
                        print_r($e);
                    }
                        \Session::flash('ClaimDone',"valid");
                        return redirect()->back();
                    }
            else
            {
                \Session::flash('ClaimNotDone',"Invalid");
                 return redirect()->back();
            }
        }
        else
        {
            \Session::flash('Notlogin',"Invalid Login");
            return redirect('/login');
        }

    }
    public function UserItemFound(Request $request)
    {
        $post=$request->all();
        
         $image = $request->file('ItemImage');
        $input['itemname'] = $post['itemName'].time().'.'.$image->extension();
 
        $destinationPath = public_path('/ItemsImg');
        $img = Image::make($image->path());
        $img->save($destinationPath.'/'.$input['itemname']);
        $data=array(
            'UserId' => Session::get('UserId'),
            'Cat_id'=>$post['categoryId'],
            'Name'=>$post['itemName'],
            'Image'=>$input['itemname'],
            'Description'=>$post['Description'],
            'Status'=>1
        );
      
       $chkitem=DB::table('iitems')->InsertGetId($data);
       
        if($chkitem>0)
        {
            \Session::flash('DoneFully',"Invalid Login");
            return redirect()->back();
        }
        else
        {
            \Session::flash('FailedRegister',"Invalid Login");
                    return redirect()->back();
        }
         
    }
    public function AdminPostLoseitem(Request $request)
    {
        $post=$request->all();
        
         $image = $request->file('ItemImage');
        $input['itemname'] = $post['itemName'].time().'.'.$image->extension();
 
        $destinationPath = public_path('/ItemsImg');
        $img = Image::make($image->path());
        $img->save($destinationPath.'/'.$input['itemname']);
        $data=array(
            'UserId' => 1,
            'Cat_id'=>$post['categoryId'],
            'Name'=>$post['itemName'],
            'Image'=>$input['itemname'],
            'Description'=>$post['Description'],
            'Status'=>1
        );
      
       $chkitem=DB::table('iitems')->InsertGetId($data);
       
        if($chkitem>0)
        {
            \Session::flash('DoneFully',"Invalid Login");
            return redirect()->back();
        }
        else
        {
            \Session::flash('FailedRegister',"Invalid Login");
                    return redirect()->back();
        }
        
    }
    public function FoundItem(Request $request)
    {
        if($request->session()->has('UserId'))
        {
            $data=DB::table('icategory')->select('Category_Name','Id')->get();
            return view('Client.Founditem')->with("category",$data);;
         }
         else
         {
            \Session::flash('Notlogin',"Invalid Login");
            return redirect('/login');
         }
        
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
