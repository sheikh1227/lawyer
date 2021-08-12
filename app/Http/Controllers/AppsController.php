<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Contact;
use App\Models\ContactNotes;
use App\Models\User;
use App\Models\Role;
use App\Models\Cases;
use App\Models\CasesType;
use App\Models\CasesRecord;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;
use Session;
use Mail;
use Illuminate\Support\Facades\DB;


class AppsController extends Controller
{
  // invoice list App
  public function invoice_list()
  {
    $pageConfigs = ['pageHeader' => false];

    return view('/content/apps/invoice/invoice-list', ['pageConfigs' => $pageConfigs]);
  }
	
	
	public function casesApp()
  {
    return view('/content/apps/cases/app-cases-list');
  }

  // invoice preview App
  public function invoice_preview()
  {
    $pageConfigs = ['pageHeader' => false];

    return view('/content/apps/invoice/invoice-preview', ['pageConfigs' => $pageConfigs]);
  }

  // invoice edit App
  public function invoice_edit()
  {
    $pageConfigs = ['pageHeader' => false];

    return view('/content/apps/invoice/invoice-edit', ['pageConfigs' => $pageConfigs]);
  }

  // invoice edit App
  public function invoice_add()
  {
    $pageConfigs = ['pageHeader' => false];

    return view('/content/apps/invoice/invoice-add', ['pageConfigs' => $pageConfigs]);
  }

  // invoice print App
  public function invoice_print()
  {
    $pageConfigs = ['pageHeader' => false];

    return view('/content/apps/invoice/invoice-print', ['pageConfigs' => $pageConfigs]);
  }

  // User List Page
  public function user_list()
  {
    $roles = Role::where('IsActive', 1)->get();
    $pageConfigs = ['pageHeader' => false];
    return view('/content/apps/user/app-user-list', ['pageConfigs' => $pageConfigs,'roles'=>$roles]);
  }

  public function add_user(Request $request)
  { 

    $validation = Validator::make($request->all(), [
        'name'     => 'required',
        'email'    => 'required',
        'password' => 'required',
        'Contact'  => 'required',
        'role_id' => 'required',
        
    ]);

    if($validation->fails()){
      $error=$validation->errors();
      return response()->json(['error' => $error]);
    }

    $param = $request->all();
    unset($param['_token']);
    $is_save=User::insertGetId($param);
    if($is_save){
        $success = array('msg' =>'User added Successfully.');
        return response()->json(['success' =>$success]);
    }else{
        $error = array('msg' =>'User added Failed');
        return response()->json(['error' =>$error]);
    }

  }

   public function update_user(Request $request, $id ='')
  {   
    // echo "<pre>";
    // print_r($request->all());
    // die("Df");

    $validation = Validator::make($request->all(), [
        'name'     => 'required',
        'email'    => 'required',
        'Contact'  => 'required',
        'role_id' => 'required',
        
    ]);

    if($validation->fails()){
      $error=$validation->errors();
      return response()->json(['error' => $error]);
    }

    $param = $request->all();
    unset($param['_token']);
    unset($param['username']);
   
    $file ='';
    if($request->hasFile('file')){

        $image = $request->file('file');
        //randon name generate
        $file = time().'-'.rand(0000,9999).'.'.$image->getClientOriginalExtension();
        //img comprace thumbnail
  
        $destinationPath = public_path('images/avatars');
        $image->move($destinationPath,  $file);
    }
    $param['profile_photo_path'] =$file;
     unset($param['file']);
    $is_save=User::where('id',$id)->update($param);

    if($is_save){
        $success = array('msg' =>'User Update Successfully.');
        return response()->json(['success' =>$success]);
    }else{
        $error = array('msg' =>'User Update Failed');
        return response()->json(['error' =>$error]);
    }

  }

  /*add user in db */

  // User View Page
  public function user_view($id)
  {
    $user = User::with('role')->find($id);

    $pageConfigs = ['pageHeader' => false];
    return view('/content/apps/user/app-user-view', ['pageConfigs' => $pageConfigs, 'user'=>$user]);
  }
  public function profile_view()
  {
      $user = User::with('role')->find(Auth::user()->id);
      $pageConfigs = ['pageHeader' => false];
      return view('/content/apps/user/profile-view', ['pageConfigs' => $pageConfigs, 'user'=>$user]);
  }

  public function profile_edit()
  {
  
    $user  = User::with('role')->find(Auth::user()->id);
    $roles = Role::where('IsActive', 1)->get();
    $pageConfigs = ['pageHeader' => false];
    return view('/content/apps/user/profile-edit', ['pageConfigs' => $pageConfigs, 'user'=>$user,'roles'=>$roles]);
  }

  // User Edit Page
  public function user_edit($id ='')
  {
    $user  = User::with('role')->find($id);
    $roles = Role::where('IsActive', 1)->get();
    $pageConfigs = ['pageHeader' => false];
    return view('/content/apps/user/app-user-edit', ['pageConfigs' => $pageConfigs, 'user'=>$user,'roles'=>$roles ]);
  }

   // Contact List Page
  public function contact_list(Request $request)
  { 
    
    $pageConfigs = ['pageHeader' => false];
    return view('/content/apps/contacts/app-contact-list', ['pageConfigs' => $pageConfigs]);
    // return view('/content/apps/contacts/app-contact', ['pageConfigs' => $pageConfigs]);
  }

  public function get_contact_list(Request $request)
  {
      $list['data']  = Contact::where('IsCase', 0)->get()->toArray();
      echo json_encode($list);
      exit();
  
  }



  public function contact_view($id)
  { 
    $contact      = Contact::with('case')->find($id);
    $users        = User::where('role_id', 12)->where('Status','Active')->get();
    $type         = CasesType::where('Status','Active')->get();
    $Notes        = ContactNotes::where('ContactID', $id)->orderBy('ContactNotesID', 'DESC')->get();
    $pageConfigs  = ['pageHeader' => false];
    return view('/content/apps/contacts/app-contact', ['pageConfigs' => $pageConfigs,  "contact"=>$contact, 'Notes'=>$Notes, 'users'=>$users, 'type'=>$type]);
  } 



  public function contact_add_notes(Request $request, $id)
  { 

    $param = $request->all();
    $param['UserID'] = Auth::user()->id ?? 0; 
    unset($param['_token']);
    $check = ContactNotes::insertGetId($param);
    if($check){
      Session::flash('message', 'Notes Added Successfully!'); 
      Session::flash('alert-class', 'alert-danger'); 
       return redirect()->back();

    }else{

      Session::flash('error', 'Error: Try Again!'); 
      return redirect()->back();
    }
     
  }


  public function contact_delete($id='')
  {
    $check =  ContactNotes::where('ContactID', $id)->delete();
    $check =  Contact::find($id)->delete();
    if(1){
      echo json_encode(array(
                              'status'=> "success",
                              'msg'   => "Contact Deleted Successfully",
                            )
                      );
      exit();
    }else{
      echo json_encode(array(
                              'status'=> "error",
                              'msg'   => "Error : Try Again Please",
                            )
                      );
      exit();
    }

  }

  public function contact_conver_into_case(Request $request, $id='')
  { 
    $param = $request->all();
    $validation = Validator::make($request->all(), [
        'LaywerID'     => 'required',
    ]);

    if($validation->fails()){
      $error=$validation->errors();
      return response()->json(['error' => $error]);
    }

    $check = User::where('email', $param['email'])->first();

    if(empty($check->email)){

      $userID = User::insertGetId([
              'name'       => $param['name'],
              'email'      => $param['email'],
              'Contact'    => $param['contact'],
              'Address'    => $param['address'],
              'Postcode'   => $param['pincode'],
              'City'       => $param['city'],
              'role_id'    => 11,
              'password'   => Hash::make($param['contact'])
          ]);
    }else{

       $userID = $check->id;
    }
      if(empty($param['address'])){
        $status = 'Hold';
      }else{

        $status = 'Open';
      }


     $CaseID = Cases::insertGetId([
            'UserID'     => $userID,
            'Name'       => $param['name'],
            'LaywerID'   => $param['LaywerID'],
            'CaseTypeID' => $param['CaseTypeID'],
            'ContactID'  => $id,
            'Date'       => date("Y-m-d"),
            'Status'     => $status,
            'CreatedBy'  => 1
      ]);
      if($CaseID){

        Contact::find($id)->update(['IsCase'=>1]);
        $success = array('msg' =>'User added Successfully.');
        return response()->json(['success' =>$success, 'CaseID'=>$CaseID]);
    }else{
        $error = array('msg' =>'User added Failed');
        return response()->json(['error' =>$error]);
    }
      
    

    $pageConfigs = ['pageHeader' => false];
    return view('/content/apps/user/app-user-view', ['pageConfigs' => $pageConfigs, 'user'=>$user]);
      
  }

  public function update_case(Request $request, $id='')
  {     
    
    $param = $request->all();
    $validation = Validator::make($request->all(), [
        'LaywerID'  => 'required',
        'email'     => 'required',
        'UserID'     => 'required',
    ]);

    if($validation->fails()){
      $error=$validation->errors();
      return response()->json(['error' => $error]);
    }

    $user_update = array(
              'name'       => $param['name'],
              'email'      => $param['email'],
              'Contact'    => $param['contact'],
              'Address'    => $param['address'],
              'Postcode'   => $param['pincode'],
              'City'       => $param['city']
          );
    $check = User::where('id',$param['UserID'])->update($user_update);
  
    $CaseData = array(
            'Name'       => $param['name'],
            'LaywerID'   => $param['LaywerID'],
            'CaseTypeID' => $param['CaseTypeID'],
            'Status'     => $param['Status']
    );

    $update = Cases::find($id)->update($CaseData);

    if($update){
        $success = array('msg' =>'Case Updated Successfully.');
        return response()->json(['success' =>$success]);
    }else{
        $error = array('msg' =>'Case Update Failed');
        return response()->json(['error' =>$error]);
    }
      
    

    $pageConfigs = ['pageHeader' => false];
    return view('/content/apps/user/app-user-view', ['pageConfigs' => $pageConfigs, 'user'=>$user]);
      
  }


  public function get_user_case($id='')
  {   
    if(is_numeric($id)){

      $list= Cases::with('user','laywer', 'type')->where('UserID',$id)->get();
    }else{

      if (!empty(Auth::user()->role_id) && Auth::user()->role_id == 10){   
        $list= Cases::with('user','laywer','type')->get();
      }elseif (!empty(Auth::user()->role_id) && Auth::user()->role_id == 11){
        $list= Cases::with('user','laywer','type')->where('UserID',Auth::user()->id )->get();
      }elseif (!empty(Auth::user()->role_id) && Auth::user()->role_id == 12){
        $list= Cases::with('user','laywer','type')->where('LaywerID',Auth::user()->id)->get();
      }
      elseif (!empty(Auth::user()->role_id) && Auth::user()->role_id == 14){
        $list= Cases::with('user','laywer','type')->where('LaywerID',Auth::user()->id)->get();
      }
      

    }
    
      $data = array();
      foreach ($list as $key => $value) {


      
        $cases['responsive_id'] = null;
        $cases['case_id'] = $value->CaseID;
        $cases['UserID'] = $value->UserID;
        $cases['LaywerID'] = $value->LaywerID;
        $cases['client_name'] = $value->user->name;
        $cases['email'] = $value->user->email;
        $cases['laywer_name'] = $value->laywer->name ?? null;
        $cases['case_type'] = $value->type->CaseTypeName ?? null;
        $cases['date'] = $value->Date;
        $cases['status'] = $value->Status;
    
       
  
        $data[] =$cases;
      }
     
      echo json_encode(array(
                          'data'=>$data
                      ));
      exit();
  }

  /*status close of case*/
  public function close_case($id='')
  {
    $is_save=Cases::find($id)->update(['Status'=>'Close']);
    if($is_save){
        $success = array('msg' =>'Case Closed Successfully.');
        return response()->json(['success' =>$success]);
    }else{
        $error = array('msg' =>'Case Closed Failed');
        return response()->json(['error' =>$error]);
    }

  }

   /*status close of case*/
  public function delete_case($id='')
  {
    $delete = CasesRecord::where('CaseID', $id)->delete();
    $is_save=Cases::find($id)->delete();
    if($is_save){
        $success = array('msg' =>'Case Deleted Successfully.');
        return response()->json(['success' =>$success]);
    }else{
        $error = array('msg' =>'Case Deleted  Failed');
        return response()->json(['error' =>$error]);
    }

  }

  /*send case mail */
  public function case_send_email(Request $request ,$id='')
  {
    $param = $request->all();
   
    $slider_name ='';
    if($request->hasFile('file')){

        $image = $request->file('file');
        //randon name generate
        $slider_name = time().'-'.rand(0000,9999).'.'.$image->getClientOriginalExtension();
        //img comprace thumbnail
  
        $destinationPath = public_path('images/case_records');
        $image->move($destinationPath,  $slider_name);
    }
    $param['file'] =$slider_name;
  
    /*save data*/
    $is_save=CasesRecord::insertGetId(['CaseID'=>$id, 'ToUserID'=> $param['UserID'],'Email'=>$param['email'] ,'UserID'=> Auth::user()->id ?? 0,  'Subject'=> $param['subject'], 'Content'=> $param['content'], 'File'=> $slider_name, 'Type'=> "Email"]);
   
    /*send mail*/
      $flag = Mail::send('case-mail-send', $param, function($message) use ($param) {

            $message->to($param['email'])->subject($param['subject']);
            if($param['file'])
              $message->attach(public_path('images/case_records').'/'.$param['file']);
            
            $message->from('support@laywer.com','Laywer');

         });

    if($is_save){
        $success = array('msg' =>'Email Sent Successfully.');
        return response()->json(['success' =>$success]);
    }else{
        $error = array('msg' =>'Email Sent Failed');
        return response()->json(['error' =>$error]);
    }

  }
   /*add record for case */
  public function case_add_record(Request $request ,$id='')
  {
    $param = $request->all();
   
    $slider_name ='';
    if($request->hasFile('file')){

        $image = $request->file('file');
        //randon name generate
        $slider_name = time().'-'.rand(0000,9999).'.'.$image->getClientOriginalExtension();
        //img comprace thumbnail
  
        $destinationPath = public_path('images/case_records');
        $image->move($destinationPath,  $slider_name);
    }
    $param['file'] =$slider_name;
    
    /*save data*/
    $is_save=CasesRecord::insertGetId(['CaseID'=>$id, 'ToUserID'=> $param['UserID'], 'UserID'=> Auth::user()->id ?? 0, 'Subject'=> $param['subject'], 'Content'=> $param['content'], 'File'=> $slider_name, 'Type'=> "Record"]);
   

    if($is_save){
        $success = array('msg' =>'Record added Successfully.');
        return response()->json(['success' =>$success]);
    }else{
        $error = array('msg' =>'Record added Failed');
        return response()->json(['error' =>$error]);
    }

  }

  /*share option enable and desable */
  public function case_share($id='')
  {


    $record=CasesRecord::find($id);
    if($record->IsShare == 0){
        $record->IsShare = 1;
    }else{
        $record->IsShare = 0;
    }

    if($record->save()){
        $success = array('msg' =>'Record Update Successfully.');
        return response()->json(['success' =>$success]);
    }else{
        $error = array('msg' =>'Record Update Failed');
        return response()->json(['error' =>$error]);
    }

    
  }

  /*get user list*/
  public function get_users($id='')
  {
    
      $list= User::with('role')->get();
      $data = array();
      foreach ($list as $key => $value) {

        $cases['responsive_id'] = null;
        $cases['id'] =  $value->id;
        $cases['full_name'] = $value->name;
        $cases['role'] = $value->role->RoleName;
        $cases['username'] = $value->email;
        $cases['email'] = $value->email;
        $cases['current_plan'] = $value->Contact;
        $cases['status'] = $value->Status;
        $cases['avatar'] = "";
  
        $data[] =$cases;
      }
     
      echo json_encode(array(
                          'data'=>$data
                      ));
      exit();
  }


  /*get customer cases*/
  public function delete_cases($id='')
  {
    $check =  ContactNotes::where('ContactID', $id)->delete();
    $check =  Contact::find($id)->delete();
    if(1){
      echo json_encode(array(
                              'status'=> "success",
                              'msg'   => "Contact Deleted Successfully",
                            )
                      );
      exit();
    }else{
      echo json_encode(array(
                              'status'=> "error",
                              'msg'   => "Error : Try Again Please",
                            )
                      );
      exit();
    }

  }


  public function constant_case($id)
  {

    $case        = Cases::with('laywer', 'user' , 'contact', 'type')->find($id);
    $RecordList  = CasesRecord::where('CaseID', $id)->get();
    $users       = User::where('role_id', 12)->where('Status','Active')->get();
    $type        = CasesType::where('Status','Active')->get();
    // echo "<pre>";
    // print_r($list->toArray());
    // die("df");

    $pageConfigs  = ['pageHeader' => false];
    return view('/content/apps/contacts/app-case-ID', ['pageConfigs' => $pageConfigs, 'case'=>$case,'users'=>$users,'type'=>$type, 'RecordList'=>$RecordList]);
  }



  // Chat App
  public function chatApp()
  {
    $pageConfigs = [
      'pageHeader' => false,
      'contentLayout' => "content-left-sidebar",
      'pageClass' => 'chat-application',
    ];

    return view('/content/apps/chat/app-chat', [
      'pageConfigs' => $pageConfigs
    ]);
  }

  // Calender App
  public function calendarApp()
  {
    $pageConfigs = [
      'pageHeader' => false
    ];

    return view('/content/apps/calendar/app-calendar', [
      'pageConfigs' => $pageConfigs
    ]);
  }

  // Email App
  public function emailApp()
  {
    $pageConfigs = [
      'pageHeader' => false,
      'contentLayout' => "content-left-sidebar",
      'pageClass' => 'email-application',
    ];

    return view('/content/apps/email/app-email', ['pageConfigs' => $pageConfigs]);
  }
  // ToDo App
  public function todoApp(Todo $id)
  {
    $data = DB::table('todos')->get();
//    dd($id);
    $pageConfigs = [
      'pageHeader' => false,
      'contentLayout' => "content-left-sidebar",
      'pageClass' => 'todo-application',
    ];

    return view('/content/apps/todo/app-todo',compact('data','id'), [
      'pageConfigs' => $pageConfigs
    ]);
  }
  // File manager App
  public function file_manager()
  {
    $pageConfigs = [
      'pageHeader' => false,
      'contentLayout' => "content-left-sidebar",
      'pageClass' => 'file-manager-application',
    ];

    return view('/content/apps/fileManager/app-file-manager', ['pageConfigs' => $pageConfigs]);
  }

  // Kanban App
  public function kanbanApp()
  {
    $pageConfigs = [
      'pageHeader' => false,
      'pageClass' => 'kanban-application',
    ];

    return view('/content/apps/kanban/app-kanban', ['pageConfigs' => $pageConfigs]);
  }

  // Ecommerce Shop
  public function ecommerce_shop()
  {
    $pageConfigs = [
      'contentLayout' => "content-detached-left-sidebar",
      'pageClass' => 'ecommerce-application',
    ];

    $breadcrumbs = [
      ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "eCommerce"], ['name' => "Shop"]
    ];

    return view('/content/apps/ecommerce/app-ecommerce-shop', [
      'pageConfigs' => $pageConfigs,
      'breadcrumbs' => $breadcrumbs
    ]);
  }

  // Ecommerce Details
  public function ecommerce_details()
  {
    $pageConfigs = [
      'pageClass' => 'ecommerce-application',
    ];

    $breadcrumbs = [
      ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "eCommerce"], ['link' => "/app/ecommerce/shop", 'name' => "Shop"], ['name' => "Details"]
    ];

    return view('/content/apps/ecommerce/app-ecommerce-details', [
      'pageConfigs' => $pageConfigs,
      'breadcrumbs' => $breadcrumbs
    ]);
  }

  // Ecommerce Wish List
  public function ecommerce_wishlist()
  {
    $pageConfigs = [
      'pageClass' => 'ecommerce-application',
    ];

    $breadcrumbs = [
      ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "eCommerce"], ['name' => "Wish List"]
    ];

    return view('/content/apps/ecommerce/app-ecommerce-wishlist', [
      'pageConfigs' => $pageConfigs,
      'breadcrumbs' => $breadcrumbs
    ]);
  }

  // Ecommerce Checkout
  public function ecommerce_checkout()
  {
    $pageConfigs = [
      'pageClass' => 'ecommerce-application',
    ];

    $breadcrumbs = [
      ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "eCommerce"], ['name' => "Checkout"]
    ];

    return view('/content/apps/ecommerce/app-ecommerce-checkout', [
      'pageConfigs' => $pageConfigs,
      'breadcrumbs' => $breadcrumbs
    ]);
  }
}
