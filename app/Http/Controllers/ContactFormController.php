<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactForm;
use App\Services\CheckFormService;
use App\Http\Requests\StoreContactRequest;

class ContactFormController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    // $contacts = ContactForm::select('id', 'name', 'title', 'created_at')->get();

    // 検索機能の追加
    $search = $request->search;
    // ローカルスコープの検索機能を呼び出し
    $query = ContactForm::search($search);
    $contacts = $query
      ->select('id', 'name', 'title', 'created_at')
      ->paginate(20);

    return view('contacts.index', compact('contacts'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('contacts.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreContactRequest $request)
  {
    // dd($request);

    // https: //readouble.com/laravel/10.x/ja/eloquent.html#mass-assignment
    // クリエイトでDBへ値を追加するには複数代入への脆弱性の対策をする必要がある
    ContactForm::create([
      'name' => $request->name,
      'title' => $request->title,
      'email' => $request->email,
      'url' => $request->url,
      'gender' => $request->gender,
      'age' => $request->age,
      'contact' => $request->contact,
    ]);

    return to_route('contacts.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $contact = ContactForm::find($id);

    // Servicesへ性別確認の処理切り分け
    $gender = CheckFormService::checkGender($contact);

    $age = CheckFormService::checkAge($contact);

    return view('contacts.show', compact('contact', 'gender', 'age'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $contact = ContactForm::find($id);

    return view('contacts.edit', compact('contact'));
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
    $contact = ContactForm::find($id);
    $contact->name = $request->name;
    $contact->title = $request->title;
    $contact->email = $request->email;
    $contact->url = $request->url;
    $contact->gender = $request->gender;
    $contact->age = $request->age;
    $contact->contact = $request->contact;
    $contact->save();

    return to_route('contacts.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $contact = ContactForm::find($id);
    $contact->delete();

    return to_route('contacts.index');
  }
}
