<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Foverite;
class FoveriteController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {

  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request, $id)
  {

//
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    $favAd = Foverite::where('user_id',Auth()->user()->id)->where('ads_id',$id)->first();
    if($favAd){
      Foverite::find($favAd->id)->delete();
      return back()->withFlashMessage('تم الغاء الاعلان من المفضلة');
    }else{
      Foverite::create([
        'user_id' => Auth()->user()->id,
        'ads_id' => $id,
      ]);
    }
    return back()->withFlashMessage('تم أضافة الاعلان اللى المفضلة');

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {

  }

}

?>
