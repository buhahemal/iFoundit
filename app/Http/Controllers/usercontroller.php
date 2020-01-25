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
use App\Mail\Registrationmail;


class usercontroller extends Controller
{

    public function searchproduct(Request $request){
        $query = $request->get('term','');
        if($request->session()->has('UserId'))
        {
            $Product=Items::where('Status',1)->whereNotIn('UserId',[Session::get('UserId')])->where('Name','LIKE','%'.$query.'%')->limit(5)->select("Id","Name")->get();
        }
        else
        {
            $Product=Items::where('Status',1)->where('Name','LIKE','%'.$query.'%')->limit(5)->select("Id","Name")->get();
        }
        
        $data=array();
        foreach ($Product as $p) {
                $data[]=array('Id'=>$p->Id,'Name'=>$p->Name);
        }
        if(count($data))
             return $data;
        else
            return ['Id'=>'','Name'=>''];
    }
    public function Searchuser(Request $request)
    {
        $post=$request->all();
        $query=$post['productname'];
        $Product=DB::table('iitems')->where('Status',1)->where('Name','LIKE','%'.$query.'%')->orderby("Id","desc")->limit(20)->get();
        return view('Client.Lostitemlist')->with('Product',$Product);   
    }

    public function AllItemLost(Request $request)
    {
        if($request->session()->has('UserId'))
        {
            $Product=DB::table('iitems')->where('Status',1)->whereNotIn('UserId',[Session::get('UserId')])->orderby("Id","desc")->limit(20)->get();
        }
        else
        {
            $Product=DB::table('iitems')->where('Status',1)->orderby("Id","desc")->limit(20)->get();
        }
        return view('Client.Lostitemlist')->with('Product',$Product);
    }
    public function SpecifcItem($id)
    {
        $Product=DB::table('iitems')->where('Id',$id)->get();
        return view('Client.LostitemlistClaim')->with('Product',$Product);
    }
    public function UserLogin(Request $request)
    {
        
        $post=$request->all();
        $User=DB::table("users")->where("Username",$post["UserName"])->where("Password",$post["password"])->get();
         
        if(isset($User[0]))
            {
              
                $request->session()->put('UserId',$User[0]->Id);
                $request->session()->put('UserName',$User[0]->Username);
                return redirect('/');
            }
            else {   
                \Session::flash('Login',"Invalid Login");
                return redirect()->back();
            } 
    }
    
    public function login() 
    {
        return view('Client.Login');
    }
    public function UpUserRegister(Request $request)
    {
        $post=$request->all();
        if($request->hasFile('UpprofileupImage')){ 
            $image = $request->file('UpprofileupImage');
            $input['itemname'] = $post['UserName'].time().'.'.$image->extension();
     
            $destinationPath = public_path('/Imagesall');
            $img = Image::make($image->path());
            $img->save($destinationPath.'/'.$input['itemname']);
            $UserUpdate=DB::table('users')->where('Id',$post['Pid'])->update([
                'Image'=>$input['itemname']
                ]);
        }
        $UserUpdate=DB::table('users')->where('Id',$post['Pid'])->update([
            'UserName'=>$post['UserName'],
            'URNNO'=>$post['URNNO'],
         ]);
         \Session::flash('Sucess',"Profile Update Sucess");
         return redirect('UserProfile');
    }

    public function verification(Request $request)
    {
        $post=$request->all();

        $c=strrev(Session::get('Verycode'));
        if($post['v_code']==$c) 
        {
            $userdata=Session::get('UsedData');
            $ReggisterUser=DB::table('users')->insertGetId(["Email"=>$userdata->Email,"Username"=>$userdata->receiver,"Password"=>$userdata->Password,"verifed"=>1,"Status"=>1,"Image"=>"defaultuser.png","URNNO"=>0000-0-0000000]);
            if($ReggisterUser>0)
            {
                $User=DB::table("users")->where("Username",$userdata->receiver)->where("Password",$userdata->Password)->get();
             
                if(isset($User[0]))
                    {
                        Session::flush();
                      
                        $request->session()->put('UserId',$User[0]->Id);
                        $request->session()->put('UserName',$User[0]->Username);
                        return redirect('/');
                    }
                    else {
                        \Session::flash('Login',"Invalid Login");
                        return redirect()->back();
                    } 
            }
            else
            {
                \Session::flash('FailedRegister',"Invalid Login");
                return redirect()->back();
            }            
        }
        else
        {
            \Session::flash('IncorrectCode',"Invalid Code");
            return redirect()->back();
        }
    }
    public function UserRegisterD(Request $request)
    {

        $post=$request->all();
        $c=mt_rand(100000,999999);
        $D_email = new \stdClass();
        $D_email->code = $c ;
        $D_email->sender = 'iFoundit';
        $D_email->receiver = $post['UserName'];
        $D_email->Email = $post['Email'];
        $D_email->Password =$post["password"];
            try{ 
                Mail::to($post['Email'])->send(new Registrationmail($D_email));
                
                $request->session()->put('Verycode',strrev($c));
                $request->session()->put('UsedData',$D_email);
                return view('Client.VerificationEmail')->with('UserD',$D_email);
            }
            catch(Exception $e){
                print_r($e);
            }
        
    }
    public function UserRegister()
    {
        return view('Client.Register');
    }
    public function Userlogout()
    {
        //
        Session::flush();
        return redirect('/');
    }
    public function UserProfile(Request $request)
    {
        $ProfileId=Session::get('UserId');
        $itemsposted=DB::table('iitems')->where('UserId',$ProfileId)->orderby("Id","desc")->get();
        $itemclaim=DB::select(DB::raw("SELECT `itc`.*,`itc`.Status as 'St',`itc`.PostUserId as 'Getuserid', `it`.*
        FROM `iitemcliam` AS `itc`
            , `iitems` AS `it` WHERE itc.ClaimUserId=".$ProfileId." and it.Id=itc.ItemId order by itc.Id DESC"));
        $Userdetail=DB::table('users')->where('Id',$ProfileId)->get();

        return view("Client.profile")->with('Items',$itemsposted)->with('Itemclaim',$itemclaim)->with('User',$Userdetail);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
