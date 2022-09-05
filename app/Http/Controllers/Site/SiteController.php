<?php

namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Setting;
use App\Models\City;
use App\Models\User;
use App\Models\Address;
use App\Models\About_Us;
use App\Models\Ads;
use App\Models\Car_Type;
use App\Models\Comment;
use App\Models\Foverite;
use Validator;
use Session;
use Redirect;
// use Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class SiteController extends Controller {

  public function index(Request $request) {
    $setting  = Setting::find(1);
    $cars     = Car_Type::all();
    $products = Ads::where('offers', 0)->paginate(4);
    $products_offers = Ads::where('offers', 1)->paginate(4);
    $ads_views = Ads::orderBy('view_count','desc')->take(8)->get();
    return view('site.index',compact('setting', 'cars', 'products', 'products_offers', 'ads_views'));
  }

  public function getSearch(Request $request){
    $products = Ads::where(function ($q) use ($request) {
      return $q->when($request->search, function ($query) use ($request) {
      return $query->where('name_ar', 'like', '%' . $request->search . '%');
      });
    })->latest()->paginate(20);
    return view('site.research_results',compact('products'));
  }

  public function getAdvancedSearch(Request $request){
        $request = request();
        $products = Ads::when($request->query('name_ar') ,function($query ,$name_ar){
            $query->where('name_ar','LIKE', '%' . $name_ar . '%');

        })->when($request->query('car_type_id') ,function($query ,$car_type_id){
            $query->where('car_type_id','=' , $car_type_id);

        })->when($request->query('name_ar') ,function($query ,$name_ar){
            $query->where('car_models.name_ar','LIKE', '%' . $name_ar . '%');

        })
    ->paginate();
    return view('site.research_results',compact('products'));
  }


  public function getProducts() {
    $setting  = Setting::find(1);
    $products = Ads::where('offers', 0)->paginate(50);
    $products_offers = Ads::where('offers', 1)->paginate(50);
    return view('site.products',compact('setting', 'products', 'products_offers'));
  }

  public function getOffers() {
    $setting  = Setting::find(1);
    $products_offers = Ads::where('offers', 1)->paginate(50);
    return view('site.offers',compact('setting', 'products_offers'));
  }


  public function getShow_carType($id) {
    $setting  = Setting::find(1);
    $products_types = Ads::where('car_type_id', $id)->paginate(12);
    return view('site.show_car_type',compact('setting', 'products_types'));
  }

  public function getShow_Product($id) {
    $setting = Setting::find(1);
    $product = Ads::findOrFail($id);
    
    $car_type_id =  $product->car_type_id;
    $related_products = Ads::where('car_type_id',$car_type_id)->limit(2)->get();
    $comments = $product->comments()->limit(4)->get();
    $commentCount = $product->comments()->count();
   $progresseData =  [];
    if($commentCount > 0){
    $progresseData =  [

        '1' => $product->comments()->where('rate', 1)->count() / $commentCount *100 ,
        '2' => $product->comments()->where('rate', 2)->count() / $commentCount *100,
        '3' => $product->comments()->where('rate', 3)->count() / $commentCount *100,
        '4' => $product->comments()->where('rate', 4)->count() / $commentCount *100,
        '5' => $product->comments()->where('rate', 5)->count() / $commentCount *100,
        ];

    }else{
        $commentCount = 0;
    }

    $av =  $commentCount ? round($product->comments()->sum('rate') / $commentCount ,2) : 0;
    if(!session()->has('proViewCount')){
      $count = $product->view_count += 1;
      $product->update(['view_count',$count]);
      session()->put('proViewCount',1);
    }
    return view('site.show_product',compact('setting', 'product','comments', 'progresseData', 'av', 'commentCount','related_products'));
  }



  public function getAbout_Us() {
    $setting  = Setting::find(1);
    $about_us = About_Us::find(1);
    return view('site.about_us',compact('setting', 'about_us'));
  }

  public function getContact() {
    $setting = Setting::find(1);
    return view('site.contact',compact('setting'));
  }

  public function getConditions() {
    $setting = Setting::find(1);
    return view('site.conditions',compact('setting'));
  }

  public function getPrivacy_policy() {
    $setting = Setting::find(1);
    return view('site.privacy_policy',compact('setting'));
  }

  public function postContact(ContactRequest $request) {
    $data = Contact::create($request->all());
    if ($data->save()) {
    return Redirect::to('/')->withFlashMessage(trans('main.Your_Message_successfully'));
     }
  }


  /* Start Regester And Login   */

  public function CreateNewRegester(Request $request) {
      try {
        $user = User::create([
          'username'=> $request->username,
            'email' => $request->email,
            'password' =>$request->password,
        ]);

        return Redirect('/')->withFlashMessage('تم الاشتراك بنجاح');
        } catch (\Exception $ex) {
            return Redirect('/')->withFlashMessage('هناك خطا ما يرجي المحاوله فيما بعد');
          }
    }

    public function postLogin(Request $request) {
      $remember_me = $request->has('remember_me') ? true : false;
      $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
                return Redirect('/')->withFlashMessage('تم تسجيل الدخول بنجاح');
     }else{
     return Redirect('/')->withFlashMessage( 'هناك خطا ما يرجي المحاوله فيما بعد');
     }
    }

    public function logout(Request $request) {
        Auth::logout();
        return Redirect('/')->withFlashMessage('تم الخروج بنجاح');
    }


    public function Addfav($id){

      Foverite::create([
        'user_id' => Auth::user()->id,
        'Ads_id' => $id,
      ]);
      return Redirect('/')->withFlashMessage('تم أضافة الاعلان  اللى المفضلة');
    }

    public function storeComment(Request $request,$id)
    {
        $product = Ads::findOrFail($id);
        $comments = Comment::create([
            'user_id' => Auth::user()->id,
            'msg' => $request->msg,
            'ads_id' => $product->id,
            'rate'=> $request->rate
        ]);
            return redirect()->back()->withFlashMessage('تم اضافة بنجاح');

    } //end of store messages that send from user's website un database

    public function getProfileDetails($id){
        $user = User::findOrFail($id);
        $address = $user->addresses;
        $city = City::all();
        $products   = Foverite::where('user_id',$user->id)->latest()->paginate(20);
        return view('site.my_profile',[
            'user'=>$user,
            'citys'=>$city,
            'addresses'=>$address,
            'products'=>$products,
            ]);

    }
    public function updateProfileDetails(Request $request,$id){
      $data = User::find($id);
          $data->username  = isset($request->username) ? $request->username : $data->username;
          $data->email     = isset($request->email) ? $request->email : $data->email;
          $data->phone     = isset($request->phone) ? $request->phone : $data->phone;
          $data->image     = isset($request->image) ? $request->image : $data->image;
          $data->password  = isset($request->password) ? bcrypt(request('password')) : $data->password;
       if($request->hasFile('image')){
        $path = public_path();
        $destinationPath = '';
        $filename        = '';
        $destinationPath = $path.'/admin/uploads/Users/'; // upload path
        $image= $request->file('image');
        $extension = $image->getClientOriginalExtension(); // getting image extension
        $name = time().''.rand(11111,99999).'.'.$extension; // renameing image
        $image->move($destinationPath, $name); // uploading file to given path
        $data->image  = '/admin/uploads/Users/'.$name ;
        }
        $data->update();
        Session::flash('save',' تم تحديث بيانات المستخدم بنجاح');
        return Redirect()->back();
    }

    public function show($id) {
      $favAd = Foverite::where('user_id',Auth()->user()->id)->where('ads_id',$id)->first();
      if($favAd){
        Foverite::find($favAd->id)->delete();
        return back()->withFlashMessage('الإعلان مضاف بالفعل للمفضله');
      }else{
        Foverite::create([
          'user_id' => Auth()->user()->id,
          'ads_id' => $id,
        ]);
      }
      return back()->withFlashMessage('تم أضافة الاعلان اللى المفضله');

    }

    public function updateAddressDetails(Request $request,$id){

        // $user = User::findOrFail($id);

        $address = Address::where('id',$id)->Create([
            'user_id' => auth()->user()->id,
            'street' => $request->street,
            'address' => $request->address,
            'house'=> $request->house,
            'level'=> $request->level,
            'flat'=> $request->flat,
            'city_id'=> $request->city_id,
            ]);

            if(!$address){

            return redirect()->back()->withFlashMessage('يوجد خطأ بالتسجيل');
            }
            return redirect()->back()->withFlashMessage('تم اضافة بنجاح');



    }


























}
