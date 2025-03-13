<!-- サンクスページ -->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thankyou</title>
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>

    <div class="content">
        <div class="thankyou-text">Thankyou</div>
        <div class="message">お問い合わせありがとうございました</div>
        <form class="form">
            <div class="form__button">
                <a href="{{ route('contact.index')}}" class="button-home">HOME</a>
            </div>
        </form>
    </div>

    <!-- <main>
        <div class="thanks__content">
            <div class="thanks__heading">
                <h2>お問い合わせありがとうございました</h2>
            </div>
        </div>
        <form class="form">
            <div class="form__button">
                <a href="{{ route('contact.index')}}" class="button-home">HOME</a>
            </div>
        </form>
    </main> -->
</body>

</html>