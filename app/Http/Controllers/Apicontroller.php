<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;

class Apicontroller extends Controller
{
    public function supplier_form_list(Request $req){
        $list = DB::table('supplier_form')->orderBy('id','DESC')->get();
        return $list;
    }
    public function supplier_form_store(Request $req){
        // $uploadedFile = $req->file('photo');
        // $fileName = rand(1111111,9999999) . '_' . time() . '.' . $uploadedFile->getClientOriginalExtension();
        // $imagePath = $uploadedFile->storeAs('images', $fileName, 'public');
        // $fullImagePath = Storage::url($imagePath);

        $data = array();
        $data['name'] = $req->name;
        $data['aadhar_no'] = $req->aadhar_no;
        $data['phone_number'] = $req->phone_number;
        $data['address'] = $req->address;
        $data['remark'] = $req->remark;
        $data['date'] = date('d-m-Y');
        // $data['photo'] = $imagePath;
        $insert_id = DB::table('supplier_form')->insertGetId($data);
        $accountDetails = json_decode($req->accountdetails);
        // Iterate through the account details and store them
        foreach($accountDetails as $key => $account){
            if($key > 0){
            $data = array();
            $data['supplier_form_id'] = $insert_id;
            $data['account_no'] = $account->accountNumber;
            $data['ifsc'] = $account->ifscCode;
            $insert_id = DB::table('party_accounts')->insert($data);
            }
        }
        return $insert_id;
    }
    public function supplier_form_get($id){
        $data = array();
        $data['form_data'] = DB::table('supplier_form')->where('id',$id)->first();
        $data['form_accounts'] = DB::table('party_accounts')->where('supplier_form_id',$id)->get();
        return $data;
    }
    public function get_aadhar_list(){
        return DB::table('supplier_form')->select('id as value', 'aadhar_no as label')->get();
    }
    public function slip_list(){
        return DB::table('slip')->orderBy('id','DESC')->get();
    }
    public function deleteformsupply($id){
        DB::table('supplier_form')->where('id',$id)->delete();
        DB::table('party_accounts')->where('supplier_form_id',$id)->delete();
        return 1;
    }
    public function slip_store(Request $req){
        $data = array();
        if($req->supply_id){
            $supply_q = DB::table('supplier_form')->where('id',$req->supply_id)->first();
            if($supply_q){
                $data['name'] = $supply_q->name;
                $data['aadhar_no'] = $supply_q->aadhar_no;
                $data['phone_number'] = $supply_q->phone_number;
                $data['address'] = $supply_q->address;
                $data['remark'] = $supply_q->remark;
            }
        }
        $data['created_data'] = date('d-m-Y');
        $data['supply_id'] = $req->supply_id;
        $data['trno'] = $req->trno;
        $data['vehicleno'] = $req->vehicleno;
        $data['typeofmaterial'] = $req->typeofmaterial;
        $data['datein'] = $req->datein;
        $data['timein'] = $req->timein;
        $data['dateout'] = $req->dateout;
        $data['timeout'] = $req->timeout;
        $data['grossweight'] = $req->grossweight;
        $data['tareweight'] = $req->tareweight;
        $data['netweight'] = $req->netweight;
        $insert_id = DB::table('slip')->insertGetId($data);
        return $insert_id;
    }
}
