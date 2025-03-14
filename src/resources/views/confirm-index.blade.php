<!-- お問い合わせフォーム入力画面 -->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/confirm-index.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/">FashionablyLate</a>
        </div>
    </header>

    <main>
        <div class="contact-form__content">
            <div class="contact-form__heading">
                <h2>Contact</h2>
            </div>
            <form class="form" action="{{ route('contact.submit') }}" method="POST">
                @csrf
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">お名前
                            <span class="form__label--required">※</span>
                        </span>
                    </div>
                    <div class="form__group name-fields">
                        <div class="name-field">
                            <label for="last_name"></label>
                            <input type="text" id="last_name" name="last_name" class="form-control" placeholder="例:山田" value="{{ old('last_name') }}" />
                        </div>
                        <div class="name-field">
                            <label for="first_name"></label>
                            <input type="text" id="first_name" name="first_name" class="form-control" placeholder="例:太郎" value="{{ old('first_name') }}" />
                        </div>
                        <div class="form__error">
                            @error('last_name')
                            {{ $message }}
                            @enderror
                            @error('first_name')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">性別
                            <span class="form__label--required">※</span>
                        </span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--radio">
                            <div id="gender">
                                <input type="radio" name="gender" value="male" {{ old('gender', 'male') == 'male' ? 'checked' : '' }} />男性
                                <input type="radio" name="gender" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}" />女性
                                <input type="radio" name="gender" value="others" {{ old('gender') == 'others' ? 'checked' : '' }} />その他

                            </div>
                            <div class="form__error">
                                @error('gender')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">メールアドレス
                            <span class="form__label--required">※</span>
                        </span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input type="email" name="email" placeholder="test@example.com" value="{{ old('email') }}" />
                        </div>
                        <div class="form__error">
                            @error('email')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">電話番号
                            <span class="form__label--required">※</span>
                        </span>
                    </div>
                    <div class="form__group tel-fields">
                        <div class="tel-field">
                            <label for="first_number"></label>
                            <input type="text" id="first_number" name="first_number" class="form-control" placeholder="080" value="{{ old('tel') }}" />
                        </div>
                        <p>-</p>
                        <div class="tel-field">
                            <label for="second_number"></label>
                            <input type="text" id="second_number" name="second_number" class="form-control" placeholder="1234" value="{{ old('tel') }}" />
                        </div>
                        <p>-</p>
                        <div class="tel-field">
                            <label for="third_number"></label>
                            <input type="text" id="third_number" name="third_number" class="form-control" placeholder="5678" value="{{ old('tel') }}" />
                        </div>
                        @error('tel')
                        {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">住所
                            <span class="form__label--required">※</span>
                        </span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input type="text" name="address" placeholder="東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}" />
                        </div>
                        <div class="form__error">
                            @error('address')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">建物名
                            <span class="form__label--required">※</span>
                        </span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input type="text" name="building" placeholder="例:千駄ヶ谷マンション101" value="{{ old('building') }}" />
                        </div>
                    </div>
                </div>

                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">お問い合わせの種類
                            <span class="form__label--required">※</span>
                        </span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text-select">
                            <select name="inquiry_type" id="form__input--text-select">
                                <option value="">選択してください</option>
                                <option value="exchange" {{ old('inquiry_type') == 'exchange' ? 'selected' : '' }}>商品の交換について</option>
                                <option value="exchange" {{ old('inquiry_type') == 'refund' ? 'selected' : '' }}>返金について</option>
                                <option value="exchange" {{ old('inquiry_type') == 'other' ? 'selected' : '' }}>その他</option>
                            </select>
                        </div>
                        <div class="form__error">
                            @error('inquiry_type')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">お問い合わせ内容
                            <span class="form__label--required">※</span>
                        </span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--textarea">
                            <textarea name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
                        </div>
                        <div class="form__error">
                            @error('detail')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form__button">
                    <button class="form_button-submit" type="submit">確認画面</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>