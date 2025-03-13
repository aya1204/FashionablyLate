<!-- お問い合わせ確認画面 -->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/">
                FashionablyLate
            </a>
        </div>
    </header>

    <main>
        <div class="confirm__content">
            <div class="confirm__heading">
                <h2>Confirm</h2>
            </div>
            <form class="form" action="{{ route('store') }}" method="POST">
                @csrf
                <div class="confirm-table">
                    <table class="confirm-table__inner">
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">お名前</th>
                            <td class="confirm-table__text">
                                <input type="text" name="name" value="{{ session('contact_form_data')['last_name'] ?? '' }} {{ session('contact_form_data')['first_name'] ?? '' }}" readonly />
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">性別</th>
                            <td class="confirm-table__text">
                                @if(session('contact_form_data')['gender'] == 'male')
                                男性
                                @elseif(session('contact_form_data')['gender'] == 'female')
                                女性
                                @elseif(session('contact_form_data')['gender'] == 'others')
                                その他
                                @endif
                                <!-- <input type="hidden" name="gender" value="{{ session('contact_form_data')['gender'] }}" readonly /> -->
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">メールアドレス</th>
                            <td class="confirm-table__text">
                                <input type="email" name="email" value="{{ session('contact_form_data')['email'] ?? '' }}" readonly />
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">電話番号</th>
                            <td class="confirm-table__text">
                                <input type="tel" name="tel1" value="{{ session('contact_form_data')['full_phpne'] ?? '' }}" readonly />
                                <!-- <input type="tel" name="tel2" value="{{ session('contact_form_data')['tel2'] ?? '' }}" readonly />
                                <input type="tel" name="tel3" value="{{ session('contact_form_data')['tel3'] ?? '' }}" readonly /> -->
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">住所</th>
                            <td class="confirm-table__text">
                                <input type="text" name="address" value="{{ session('contact_form_data')['address'] ?? '' }}" readonly />
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">建物名</th>
                            <td class="confirm-table__text">
                                <input type="text" name="building" value="{{ session('contact_form_data')['building'] ?? '' }}" readonly />
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">お問い合わせの種類</th>
                            <td class="confirm-table__text">
                                <input type="text" name="inquiry_type" value="{{ session('contact_form_data')['inquiry_type'] ?? '' }}" readonly />
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">お問い合わせ内容</th>
                            <td class="confirm-table__text">
                                <textarea name="detail" readonly>{{ session('contact_form_data')['detail'] ?? '' }}</textarea>
                                <!-- <input type="hidden" name="detail" value="{{ session('contact_form_data')['detail'] }}" readonly /> -->
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="form__button">
                    <button class="form__button-submit" type="submit">送信</button>
                    <button class="fixes__button-submit" type="button" onclick="history.back()">修正</button>
                </div>
            </form>
        </div>
    </main>

</body>

</html>