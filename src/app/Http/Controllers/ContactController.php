<?php
// お問い合わせフォーム入力画面

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Mime\Part\Multipart\FormDataPart;

class ContactController extends Controller
{
    public function index()
    {
        return view('confirm-index');
    }

    public function submit(Request $request)
    {
        $request->session()->put('contact_form_data', $request->all());

        return redirect()->route('contact.confirm');
    }

    // 送信ボタンクリック時に行われる処理
    public function confirm(Request $request)
    {
        $validatedData = $request->validate([
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'gender' => 'required',
            'email' => 'required|email',
            'tel1' => 'required|numeric|digits_between:5',
            'tel2' => 'required|numeric|digits_between:5',
            'tel3' => 'required|numeric|digits_between:5',
            'address' => 'required',
            'inquiry_type' => 'required',
            'detail' => 'required|max:120',
        ]);

        $fullName = $request->last_name. ' ' . $request->first_name;
        $validatedData['name'] = $fullName;

        $fullNumber = $request->tel1 . $request->tel2 . $request->tel3;
        $validateData['full_phone'] = $fullNumber;

        $request->session()->put('contact_form_data', $validatedData);

        session(['contact_form_data' => $validatedData]);

        return view('confirm',['formData' => $validatedData]);
        // return redirect()->route('contact.confirm');
    }

    public function store(Request $request)
    {
        $formData = $request->session()->get('contact_form_data');

        $request->session()->forget('contact_form_data');

        return redirect()->route('complete.thanks');
    }
}
