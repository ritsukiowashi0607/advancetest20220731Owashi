<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Contact;

class ContactController extends Controller
{
    /**
     * フォームページ
     */
    public function index()
    {
        // VIEW
        return view('contact.index');
    }

    /**
     * 確認ページ
     */
    public function confirm(Request $request)
    {
        // 入力チェック
        $request->validate([
            'email'   => 'required|email',
            'contact' => 'required',
        ]);
        $input = $request->input();

        // SESSION 格納
        $request->session()->put('input', $input);

        // VIEW
        return view('contact.confirm', ['input' => $input]);
    }

    /**
     * 完了ページ
     */
    public function thanks(Request $request)
    {
        // SESSION 情報取得
        $input = $request->session()->get('input');

        // 戻る処理
        if($request->has('back') == true){
            return redirect('/contact')->withInput($input);
        }

        // SESSION が存在しない
        if(!$input){
            return redirect()->route('contact.index');
        }

        // メール送信処理
        // 自分宛メール
        $title = 'Laravelからのお問い合わせ';
        \Mail::to('自分宛メールアドレス')->send(new Contact('contact._temp_mail_me', $title, $input));
        // ユーザー宛メール
        $title = 'お問い合わせありがとうございました';
        \Mail::to($input['email'])->send(new Contact('contact._temp_mail_you', $title));

        // SESSION 削除
        $request->session()->forget('input');

        // VIEW
        return view('contact.thanks');
    }
}
