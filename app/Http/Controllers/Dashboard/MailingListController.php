<?php
namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Session;
use Redirect;
use Response;
use App\Models\MailingList;

class MailingListController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index() {
    $mailings = MailingList::paginate(20);
    return view('admin_panel.mailing-list.index',compact('mailings'));
  }



  public function destroy($id) {
    try {
      $delete = MailingList::find($id);
        if(!$delete)
          return redirect('admin_panel/mailing-list')->with(['error' => 'هذا الايميل غير موجود']);
            $delete->delete();
          return redirect('admin_panel/mailing-list')->with(['save' => 'تم حذف الايميل بنجاح']);
      } catch (\Exception $e) {
          return redirect('admin_panel/mailing-list')->with(['error' => 'حدث خطا ما برجاء المحاولة لاحقا']);
      }

  }


}
