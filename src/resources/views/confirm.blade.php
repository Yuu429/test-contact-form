<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>confirm</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <div class="header__title">FashionablyLate</div>
        </div>
    </header>

    <main>
        <div class="contact-form__content">
            <div class="contact-form__heading">
                Confirm
            </div>
            <form class="form" action="/thanks" method="post">
                @csrf
                <div class="form__group">
                    <div class="form__group-title">
                        <span>お名前</span>
                    </div>
                    <div class="form__group-content form__group-content--first">
                        @php
                        $name1 = $contact['first_name'] ?? '';
                        $name2 = $contact['last_name'] ?? '';
                        $fullName = $name1 . ' ' . $name2;
                        @endphp
                        <input type="hidden" name="first_name" value="{{ $name1 }}">
                        <input type="hidden" name="last_name" value="{{ $name2 }}">
                        <input type="text" value="{{ $fullName }}" readonly>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span>性別</span>
                    </div>
                    <div class="form__group-content">
                        @php
                        $labels = [ 1 => '男性', 2 => '女性', 3 => 'その他'];
                        @endphp
                        <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
                        <input type="text" value="{{ $labels[$contact['gender']] }}" readonly>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span>メールアドレス</span>
                    </div>
                    <div class="form__group-content">
                        <input type="email" name="email" value="{{ $contact['email'] }}" readonly>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span>電話番号</span>
                    </div>
                    <div class="form__group-content">
                        @php
                        $tel1 = $contact['tel-1'] ?? '';
                        $tel2 = $contact['tel-2'] ?? '';
                        $tel3 = $contact['tel-3'] ?? '';
                        $tel = $tel1 . $tel2 . $tel3;
                        @endphp
                        <input type="tel" name="tel" value="{{ $tel }}" readonly>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span>住所</span>
                    </div>
                    <div class="form__group-content">
                        <input type="text" name="address" value="{{ $contact['address'] }}" readonly>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span>建物名</span>
                    </div>
                    <div class="form__group-content">
                        <input type="text" name="building" value="{{ $contact['building'] }}" readonly>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span>お問い合わせの種類</span>
                    </div>
                    <div class="form__group-content">
                        @php
                            $labels = [
                                1 => '商品のお届けについて',
                                2 => '商品の交換について',
                                3 => '商品トラブル',
                                4 => 'ショップへのお問い合わせ',
                                5 => 'その他',
                            ];

                            $content_id = $contact['content'] ?? '';
                            $content_jp = $labels[$content_id] ?? '';
                        @endphp
                        <input type="hidden" name="content" value="{{ $content_id }}">
                        <input type="text" value="{{ $content_jp }}" readonly>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title form__group-title--last">
                        <span>お問い合わせ内容</span>
                    </div>
                    <div class="form__group-content form__group-content--last">
                        <input type="text" name="detail" value="{{ $contact['detail'] }}" readonly>
                    </div>
                </div>
                <div class="form__button">
                    <button class="form__button-submit"  type="submit">
                        送信
                    </button>
                </div>
            </form>
            <form class="form__correct" action="/" method ="post">
                @csrf
                <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
                <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
                <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
                <input type="hidden" name="email" value="{{ $contact['email'] }}">
                <input type="hidden" name="tel-1" value="{{ $contact['tel-1'] }}">
                <input type="hidden" name="tel-2" value="{{ $contact['tel-2'] }}">
                <input type="hidden" name="tel-3" value="{{ $contact['tel-3'] }}">
                <input type="hidden" name="address" value="{{ $contact['address'] }}">
                <input type="hidden" name="building" value="{{ $contact['building'] }}">
                <input type="hidden" name="content" value="{{ $contact['content'] }}">
                <input type="hidden" name="detail" value="{{ $contact['detail'] }}">
                <button class="form__button-correct" type="submit">修正</button>
            </form>
        </div>
    </main>
</body>
</html>