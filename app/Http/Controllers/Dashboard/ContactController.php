<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Session;
use Redirect;
use Response;
use App\Models\Contact;

class ContactController extends Controller {

  public function index() {
    $contacts = Contact::latest()->paginate(25);
    return view('admin_panel.contact.index',compact('contacts'));
  }

  public function show($id) {
    $contact = Contact::find($id);
    return view('admin_panel.contact.send_email',compact('contact'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id) {
    $contact = Contact::find($id);
    $contact->view = 1;
    $contact->save();
    return view('admin_panel.contact.message_details',compact('contact'));
  }


  public function destroy($id) {
    $delete = Contact::find($id);
    $delete->delete();
    Session::flash('save','تم حذف الرسالة المرسلة بنجاح');
    return Redirect('admin_panel/contact');

 }
}
