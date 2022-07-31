@extends('layouts.app')

@section('title', 'フォームページ')
@section('sidebar')
<div>
    <ul>
        <li><a href="/">TOP</a></li>
        <li><a href="/contact">お問い合わせ</a></li>
    </ul>
</div>
@endsection

@section('content')
<div class="content">
    <h1>お問い合わせ</h1>
<div>
    <form method="POST" action="/contact/confirm">
        @csrf

        <div>
            <label for="email">メールアドレス</label>
        <div>
        @error('email')
        <p>{{ $message }}</p>
        @enderror
        <input id="email" type="text" name="email" value="{{ old('email') }}" autofocus>
    </div>
</div>

<div>
    <label for="contact">お問い合わせ内容</label>
        <div>
            @error('contact')
            <p>{{ $message }}</p>
            @enderror
            <textarea id="contact" name="contact" cols="30" rows="10">{{ old('contact') }}</textarea>
        </div>
</div>

<div>
    <div>
        <button type="submit">確認</button>
    </div>
    </div>
    </form>
    </div>
</div>
@endsection
