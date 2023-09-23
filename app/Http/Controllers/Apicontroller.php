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
    //admin//
    public function register(Request $req){
        if (isset($req->password)) {
            $existingUser = DB::table('adminlogin')->where('password', $req->password)->first();
            if ($existingUser) {
                // User already exists
                return response()->json(['message' => 'User already exists', 'alreadyhave' => 1], 400);
            } else {
                // Insert new user
                $newUserId = DB::table('adminlogin')->insertGetId([
                    'username' => $req->username,
                    'email' => $req->email,
                    'password' => $req->password,
                ]);

                if ($newUserId) {
                    // New user registered successfully
                    $user = [
                    "email" => $req->email,
                    "username" => $req->username,
                    "fullName" => "",
                    "avatar" => null,
                    "role" => "admin",
                    "ability" => [
                        [
                            "action" => "manage",
                            "subject" => "all"
                        ]
                    ],
                    "id" => $newUserId
                    ];

                    $accessToken = "your_access_token"; // Replace with your actual access token

                    $response = [
                        "user" => $user,
                        "accessToken" => $accessToken
                    ];

                    return response()->json($response, 200); // Return user data and access token
                } else {
                    return response()->json(['message' => 'Failed to register user'], 400); // Registration failed
                }
            }
        }
    }

public function adminlogin(Request $req) {
    $where = array();
    $where['email'] = $req->loginEmail;
    $where['password'] = $req->password;
    $existingUser = DB::table('adminlogin')->where($where)->first();
    
    if(!empty($existingUser)) {
        $userData = array(
            'id' => $existingUser->id,
            'fullname' => $existingUser->fullname,
            'username' => $existingUser->username,
            'avatar' => $existingUser->avatar,
            'email' => $existingUser->email,
            'role' => $existingUser->role,
            'ability' => array(array('action' => 'manage', 'subject' => 'all')),
            'extras' => array('eCommerceCartItemsCount' => 5)
        );
        
        return $userData;
    } else {
        return response()->json(array('error' => 'User not found'));
   }
}
public function addcategory(Request $req){
      $data =array();
      $data['name'] = $req->categoryname;
      if ($req->hasFile('categoryimage')) {
        $imageName = time() . '.' . $req->file('categoryimage')->extension();
        $req->file('categoryimage')->storeAs('public/uploads', $imageName);
        $data['categoryimage'] = $imageName;
        
      }
      $check = DB::table('category')->where('id',$req->categoryid)->first();
      if(!empty($check)){
          DB::table('category')->where('id',$req->categoryid)->update($data);
      }else{
          DB::table('category')->insert($data);
      }
      return 1;
}
public function categorylist(){
     return DB::table('category')->get();
}
//   // Extract other form data
//         $request->validate([
//             'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust max file size as needed
//         ]);
//         $imageName = time() . '.' . $request->image->extension();
//         $request->image->move(public_path('uploads'), $imageName);
//         // $featuredImagesArray = json_decode($req->featuredimages, true);
//         // return $featuredImagesArray;

public function getproducts(){
     return DB::table('product')->get();
}
public function getproductsnew(){
    $products = DB::table('product')->get();
    $formattedProducts = [];
    foreach ($products as $product) {
        $formattedProducts[] = [
            'id' => $product->id,
            'pname' => $product->pname,
            'oprice' => $product->oprice,
            'image' => $product->image,
            'bdescription' => $product->bdescription,
            'categoryname' => $product->categoryname,
            'tags' => ["tag1", "tag2"], 
            'link' => "/product-detail/" . $product->id, 
            'variants' => [
                'id' => 1,
                'name' => " Black",
                'thumbnail' => 'https://picsum.photos/200/300', 
                'featuredImage' => 'https://picsum.photos/200/300', 
            ], 
            'variantType' => "image", 
            'sizes' => ["XS", "S", "M", "L", "XL"], 
            'allOfSizes' => ["XS", "S", "M", "L", "XL", "2XL", "3XL"], 
            'status' => "New in" , 
        ];
    }
    return $formattedProducts;
}
public function getProductsByCat()
{
$products = DB::table('product')->get();
$formattedProducts = [];
$api = 'https://essane.in/monecommerce/storage/app/public/uploads/';
foreach ($products as $product) {
    $selectedsizes = DB::table('selectedsizes')->where('lastid', $product->id)->get();
    $formattedProduct = [
        'id' => $product->id,
        'category' => $product->categoryname,
        'description' => $product->bdescription,
        'image' => $api . $product->image,
        'link' => "/product-detail/" . $product->id,
        'name' => $product->pname,
        'price' => (int) $product->oprice,
        'size' => $selectedsizes[0]->size,
        'status' => "New in",
        'tags' => ["tag1", "tag2"],
        'variantType' => "image",
        'variants' => [
            [
                'id' => 1,
                'name' => "Black",
                'thumbnail' => 'https://picsum.photos/200/300',
                'featuredImage' => 'https://picsum.photos/200/300',
            ],
            [
                'id' => 2,
                'name' => "White",
                'thumbnail' => 'https://picsum.photos/200/300',
                'featuredImage' => 'https://picsum.photos/200/300',
            ],
            [
                'id' => 3,
                'name' => "Orange",
                'thumbnail' => 'https://picsum.photos/200/300',
                'featuredImage' => 'https://picsum.photos/200/300',
            ],
            [
                'id' => 4,
                'name' => "Sky Blue",
                'thumbnail' => 'https://picsum.photos/200/300',
                'featuredImage' => 'https://picsum.photos/200/300',
            ],
            [
                'id' => 5,
                'name' => "Natural",
                'thumbnail' => 'https://picsum.photos/200/300',
                'featuredImage' => 'https://picsum.photos/200/300',
            ],
        ],
    ];
    
    $formattedProducts[] = $formattedProduct;
}

return $formattedProducts;
}
public function getProductByID($id)
{
$product = DB::table('product')->where('id', $id)->first();

if (!$product) {
    // Handle the case where no product with the given ID was found.
    return null;
}

$api = 'https://essane.in/monecommerce/storage/app/public/uploads/';
$selectedsizes = DB::table('selectedsizes')->where('lastid', $id)->get();
$formattedProduct = [
    'id' => $product->id,
    'category' => $product->categoryname,
    'description' => $product->bdescription,
    'image' => $api . $product->image,
    'link' => "/product-detail/" . $product->id,
    'name' => $product->pname,
    'price' => (int) $product->oprice,
    'size' => $selectedsizes[0]->size,
    'status' => "New in",
    'tags' => ["tag1", "tag2"],
    'variantType' => "image",
    'variants' => [
        [
            'id' => 1,
            'name' => "Black",
            'thumbnail' => 'https://picsum.photos/200/300',
            'featuredImage' => 'https://picsum.photos/200/300',
        ],
        [
            'id' => 2,
            'name' => "White",
            'thumbnail' => 'https://picsum.photos/200/300',
            'featuredImage' => 'https://picsum.photos/200/300',
        ],
        [
            'id' => 3,
            'name' => "Orange",
            'thumbnail' => 'https://picsum.photos/200/300',
            'featuredImage' => 'https://picsum.photos/200/300',
        ],
        [
            'id' => 4,
            'name' => "Sky Blue",
            'thumbnail' => 'https://picsum.photos/200/300',
            'featuredImage' => 'https://picsum.photos/200/300',
        ],
        [
            'id' => 5,
            'name' => "Natural",
            'thumbnail' => 'https://picsum.photos/200/300',
            'featuredImage' => 'https://picsum.photos/200/300',
        ],
    ],
];
$featuresimages = DB::table('featuredimages')->where('lastid', $id)->select('image as name','lastid')->get();
return ['pdata'=>$formattedProduct,'featuresimages'=>$featuresimages];
}

// public function getProductsByCat()
// {
//     $products = DB::table('product')->get();
//     $formattedProducts = [];
//     $api = 'https://essane.in/monecommerce/storage/app/public/uploads/';
//     foreach ($products as $product) {
//         $formattedProducts[] = [
//             'id' => $product->id,
//             'name' => $product->pname,
//             'description' => $product->bdescription,
//             'price' => (int)$product->oprice,
//             'image' => $api.$product->image,
//             'category' => $product->categoryname,
//             'tags' => ["tag1", "tag2"],
//             'link' => "/product-detail/" . $product->id,
//             'variants' => [
//                 [
//                     'id' => 1,
//                     'name' => "Black",
//                     'thumbnail' => 'https://picsum.photos/200/300',
//                     'featuredImage' => 'https://picsum.photos/200/300',
//                 ],
//                 [
//                     'id' => 2,
//                     'name' => "White",
//                     'thumbnail' => 'https://picsum.photos/200/300',
//                     'featuredImage' => 'https://picsum.photos/200/300',
//                 ],
//                 [
//                     'id' => 3,
//                     'name' => "Orange",
//                     'thumbnail' => 'https://picsum.photos/200/300',
//                     'featuredImage' => 'https://picsum.photos/200/300',
//                 ],
//                 [
//                     'id' => 4,
//                     'name' => "Sky Blue",
//                     'thumbnail' => 'https://picsum.photos/200/300',
//                     'featuredImage' => 'https://picsum.photos/200/300',
//                 ],
//                 [
//                     'id' => 5,
//                     'name' => "Natural",
//                     'thumbnail' => 'https://picsum.photos/200/300',
//                     'featuredImage' => 'https://picsum.photos/200/300',
//                 ],
//             ],
//             'variantType' => "image",
//             'sizes' => ["XS", "S", "M", "L", "XL"],
//             'allOfSizes' => ["XS", "S", "M", "L", "XL", "2XL", "3XL"],
//             'status' => "New in",
//         ];
//     }

//     return $formattedProducts;
// }

public function productedit($pid) {
    return DB::table('product')->where('id', $pid)->first();
}
public function viewproduct($pid) {
    $pdata = DB::table('product')->where('id', $pid)->first();
    $featuresimages = DB::table('featuredimages')->where('lastid', $pdata->id)->select('image as name','lastid')->get();
    $selectedsizes = DB::table('selectedsizes')->where('lastid', $pdata->id)->get();
    $sizes = array();
    foreach($selectedsizes as $size){
        $i = array();
        $i['value'] = $size->size;
        $i['label'] = $size->size;
        $sizes[]= $i;
    }
    return ['pdata'=>$pdata,'featuresimages'=>$featuresimages,'selectedsizes'=>$sizes];
}
public function addtowishlist(Request $request) {
    $where = array();
    $where['userid'] = $request->userid;
    $where['productid'] = $request->productid;
    $data = array();
    $data['userid'] = $request->userid;
    $data['productid'] = $request->productid;
    $data['isliked'] = $request->isliked;
    $check = DB::table('mywishlist')->where($where)->first();
    if(!empty($check)){
        DB::table('mywishlist')->where($where)->update($data);
        if($request->isliked == 'add'){
            return ['text'=>'Added to wishlist'];
        }else{
            return ['text'=>'Removed from wishlist'];
        }
    }else{
        
        DB::table('mywishlist')->insert($data);
        return ['text'=>'Added to wishlist'];
    }
}
public function mywishlist($userid) {
    return DB::table('mywishlist')->where('userid',$userid)->get();
}
public function addproduct(Request $request) {
    $selectedSizes = json_decode($request->input('selectedSizes'));
    // Create an array with product data
    $catdata = DB::table('category')->where('id',$request->input('categoryid'))->first();
    $data = [
        'pname' => $request->input('pname'),
        'oprice' => $request->input('oprice'),
        'sprice' => $request->input('sprice'),
        'bdescription' => $request->input('bdescription'),
        'ddescription' => $request->input('ddescription'),
        'slength' => $request->input('slength'),
        'armhole' => $request->input('armhole'),
        'chest' => $request->input('chest'),
        'metatitle' => $request->input('metatitle'),
        'metades' => $request->input('metades'),
        'categoryid' => $request->input('categoryid'),
        'categoryname' => $catdata->name,
    ];
    // Check if 'image' is provided
    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->file('image')->extension();
        $request->file('image')->storeAs('public/uploads', $imageName);
        $data['image'] = $imageName;
    }else{
        $data['image'] = $request->image;
    }
    // Check if 'image' is provided
    if ($request->hasFile('metaimage')) {
        $imageName = time() . '.' . $request->file('metaimage')->extension();
        $request->file('metaimage')->storeAs('public/uploads', $imageName);
        $data['metaimage'] = $imageName;
    }else{
        $data['metaimage'] = $request->metaimage;
    }
    if($request->isduplicate != 1){
        // Check if 'upid' is provided
    if ($request->has('upid')) {
        $productId = $request->input('upid');
        // Update the product data
        DB::table('product')->where('id', $productId)->update($data);
        DB::table('selectedsizes')->where('lastid', $productId)->delete();
        foreach($selectedSizes as $size){
            DB::table('selectedsizes')->insert(['size'=>$size->value,'lastid'=>$productId]);
        }
        // Check if 'featuredimages' is provided for new products
        $index = 0;
        $featuredImages = [];
        DB::table('featuredimages')->where('lastid', $productId)->delete();
        
        while ($request->has("featuredimages{$index}")) {
            // Check if the field contains a file or just a file name
            if ($request->hasFile("featuredimages{$index}")) {
                $featuredImage = $request->file("featuredimages{$index}");
                if ($featuredImage->isValid()) {
                    $featuredImageName = time() . '_' . $featuredImage->getClientOriginalName();
                    $featuredImage->storeAs('public/uploads', $featuredImageName);
                    $featuredImages[] = [
                        'image' => $featuredImageName,
                        'lastid' => $productId,
                    ];
                }
            } else {
                // The field contains only a file name, so you can handle it accordingly
                $featuredImageName = $request->input("featuredimages{$index}");
                if (is_string($featuredImageName)) {
                     $featuredImages[] = [
                        'image' => $featuredImageName,
                        'lastid' => $productId,
                    ];
                }
            }
        
            $index++;
        }
        
        if (!empty($featuredImages)) {
            DB::table('featuredimages')->insert($featuredImages);
        }
    }
    }else {
        // Insert a new product and get the last inserted ID
        $productId = DB::table('product')->insertGetId($data);
        foreach($selectedSizes as $size){
            DB::table('selectedsizes')->insert(['size'=>$size->value,'lastid'=>$productId]);
        }
        // Check if 'featuredimages' is provided for new products
        $index = 0;
        $featuredImages = [];
        DB::table('featuredimages')->where('lastid', $productId)->delete();
        
        while ($request->has("featuredimages{$index}")) {
            // Check if the field contains a file or just a file name
            if ($request->hasFile("featuredimages{$index}")) {
                $featuredImage = $request->file("featuredimages{$index}");
                if ($featuredImage->isValid()) {
                    $featuredImageName = time() . '_' . $featuredImage->getClientOriginalName();
                    $featuredImage->storeAs('public/uploads', $featuredImageName);
                    $featuredImages[] = [
                        'image' => $featuredImageName,
                        'lastid' => $productId,
                    ];
                }
            } else {
                // The field contains only a file name, so you can handle it accordingly
                $featuredImageName = $request->input("featuredimages{$index}");
                if (is_string($featuredImageName)) {
                     $featuredImages[] = [
                        'image' => $featuredImageName,
                        'lastid' => $productId,
                    ];
                }
            }
        
            $index++;
        }
        
        if (!empty($featuredImages)) {
            DB::table('featuredimages')->insert($featuredImages);
        }
        
    }

    return response()->json(['message' => 'Product added/updated successfully']);
}


public function deleteproduct(Request $req){
     return  DB::table('product')->where('id', $req->id)->delete();
}
public function deletecategory (Request $req){
     return  DB::table('category')->where('id', $req->id)->delete();
}
public function editcategory (Request $req){
     return  DB::table('category')->where('id', $req->id)->first();
}
//WEBSITE\\
public function newregistration(Request $req) {
    if (isset($req->number)) {
        $data = DB::table('user')->where('number', $req->number)->count();
        if ($data > 0) {
            $rrr = DB::table('user')->where('number', $req->number)->first();
            return (['uid' => $rrr->id,'alreadyhave'=>1,'userdata'=>$rrr]);
        } else {
            $last_id = DB::table('user')->insertGetId([
                'name' => $req->name,
                'number' => $req->number,
                'email' => $req->email,
                'password' => $req->password,
                ]);
            $check = DB::table('user')->where('number', $req->number)->first();
            return (['uid' => $last_id,'alreadyhave'=>0,'userdata'=>$check]);
        }
    }else {
        return (['status' => 0, 'message' => 'OTP Not Matched']);
    }      
}
public function login(Request $request) {
    $data = array();
    $number = $request->number;
    $check = DB::table('user')->where('number', $number)->first();
    if ($check) {
        return response()->json(['status' => 1,'message' => 'Login successful','userdata'=>$check], 200);
    } else {
        return response()->json(['status' => 0,'message' => 'Invalid credentials'], 401);
    }
}
public function userprofile() {
    return DB::table('user')->first();
}
 public function con_email_edit($id) { 
      return DB::table('product')->where('id', $id)->first();
 }

    public function checkout(Request $req) {
      $data =array();
      $data['paymentid'] = $req->paymentid;
      $data['firstname'] = $req->firstname;
      $data['lastname'] = $req->lastname;
      $data['address'] = $req->address;
      $data['aptsuite'] = $req->aptsuite;
      $data['city'] = $req->city;
      $data['state'] = $req->state;
      $data['postalcode'] = $req->postalcode;
      $cartno = DB::table('orders')->insertGetId($data);
      $loopdata = json_decode($req->cartdata);
      foreach($loopdata as $d){
          $data = array();
          $data['cartno'] = $cartno;
          $data['productid'] = $d->id;
          $data['name'] = $d->name;
          $data['price'] = $d->price;
          $data['size'] = $d->size;
          $data['qty'] = $d->qty;

          DB::table('cartdata')->insert($data);
      }
      return 1;
    }

//ORDERS
public function orders() { 
      $res = array();
      $orderdata =  DB::table('orders')->get();
      foreach($orderdata as $d){
          $cartdata =  DB::table('cartdata')->where('cartno',$d->id)->get();
          $insert = array();
          $insert['orderdata'] = $d;
          $insert['cartdata'] = $cartdata;
          $res[] = $insert;
      }
      return $res;
 }
}
