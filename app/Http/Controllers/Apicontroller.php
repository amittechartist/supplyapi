<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;

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
    public function supplier_form_get_payment($id){
        $data = array();
        $data['form_data'] = DB::table('supplier_form')->where('id',$id)->first();
        $data['form_accounts'] = DB::table('party_accounts')->select('id as value', 'account_no as label')->where('supplier_form_id',$id)->get();
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
    public function payment_handel(Request $req){

    }    
    public function rez(Request $req){
        
        if(!$req->con){
        $apiKey = 'rzp_test_SIGjuGKyuuGdO9';
        $apiSecret = 'V9QURyJJ88Tme08nu3e3lwZf';
        $url = 'https://api.razorpay.com/v1/contacts';

        $client = new Client();

        $data = [
            'name' => 'Gaurav Kumar',
            'email' => 'gaurav.kumar@example.com',
            'contact' => '9123456789',
            'type' => 'employee',
            'reference_id' => 'Acme Contact ID 12345',
            'notes' => [
                'notes_key_1' => 'Tea, Earl Grey, Hot',
                'notes_key_2' => 'Tea, Earl Grey… decaf.',
            ],
        ];

        $headers = [
            'Authorization' => 'Basic ' . base64_encode("$apiKey:$apiSecret"),
            'Content-Type' => 'application/json',
        ];

        $response = $client->post($url, [
            'headers' => $headers,
            'json' => $data,
        ]);

        $statusCode = $response->getStatusCode();
        $body = $response->getBody()->getContents();

        // You can handle the response here according to your application's logic
        // return response()->json(['status_code' => $statusCode, 'response' => ]);
        $res_contact_data = json_decode($body);
        if($res_contact_data){
            if($res_contact_data->id){
                // return response()->json(['id' => $res_contact_data->id]);
                return $this->insertbank($res_contact_data->id);
            }
        }
    }else{
        
        return $this->insertbank($req->con);
    }
    } 
    public function insertbank($id=''){
        if($id){
            $apiKey = 'rzp_test_SIGjuGKyuuGdO9';
            $apiSecret = 'V9QURyJJ88Tme08nu3e3lwZf';
            $url = 'https://api.razorpay.com/v1/fund_accounts';
    
            $client = new Client();
    
            $data = [
                'contact_id' => $id,
                'account_type' => 'bank_account',
                'bank_account' => [
                    'name' => 'Pintu dev',
                    'ifsc' => 'HDFC0000055',
                    'account_number' => '765432123456778',
                ],
            ];
    
            $headers = [
                'Authorization' => 'Basic ' . base64_encode("$apiKey:$apiSecret"),
                'Content-Type' => 'application/json',
            ];
    
            try {
                $response = $client->post($url, [
                    'headers' => $headers,
                    'json' => $data,
                ]);
    
                $statusCode = $response->getStatusCode();
                $body = $response->getBody()->getContents();
    
                // Check for successful response
                
                return response()->json(['status_code' => $statusCode, 'response' => json_decode($body), 'id' => $id]);
                
            } catch (\Exception $e) {
                // Handle exceptions (e.g., network issues or API errors) here
                return response()->json(['status_code' => 500, 'error' => $e->getMessage()]);
            }
        }
    }
    public function createPayout(Request $request)
    {
        $apiKey = '<YOUR_KEY>';
        $apiSecret = '<YOUR_SECRET>';
        $url = 'https://api.razorpay.com/v1/payouts';

        $client = new Client();

        $data = [
            'account_number' => '7878780080316316',
            'fund_account_id' => 'fa_00000000000001',
            'amount' => 1000000,
            'currency' => 'INR',
            'mode' => 'IMPS',
            'purpose' => 'refund',
            'queue_if_low_balance' => true,
            'reference_id' => 'Acme Transaction ID 12345',
            'narration' => 'Acme Corp Fund Transfer',
            'notes' => [
                'notes_key_1' => 'Tea, Earl Grey, Hot',
                'notes_key_2' => 'Tea, Earl Grey… decaf.',
            ],
        ];

        $headers = [
            'Authorization' => 'Basic ' . base64_encode("$apiKey:$apiSecret"),
            'Content-Type' => 'application/json',
        ];

        try {
            $response = $client->post($url, [
                'headers' => $headers,
                'json' => $data,
            ]);

            $statusCode = $response->getStatusCode();
            $body = $response->getBody()->getContents();

            // Check for successful response
            if ($statusCode === 200) {
                return response()->json(['status_code' => $statusCode, 'response' => json_decode($body)]);
            } else {
                // Handle other success status codes here if needed
                return response()->json(['status_code' => $statusCode, 'error' => 'Error message goes here']);
            }
        } catch (\Exception $e) {
            // Handle exceptions (e.g., network issues or API errors) here
            return response()->json(['status_code' => 500, 'error' => $e->getMessage()]);
        }
    }
}
