<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
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
                Contact
            </div>
            <form class="form" action="/confirm" method="post">
                @csrf
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">お名前</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content form__group-content-name">
                        <div class="form__input--text">
                            <input type="text" name="first_name" value="{{ $contact['first_name'] ?? '' }}" placeholder="例:山田" >
                            <input type="text" name="last_name" value="{{ $contact['last_name'] ?? '' }}" placeholder="例:太郎" >
                        </div>
                        <div class="form__error-group">
                            @error('first_name')
                                <div class="form__error">{{ $message }}</div>
                            @enderror
                            @error('last_name')
                                <div class="form__error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">性別</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--gender">
                            @php
                                $gender = old('gender', $contact['gender'] ?? '');
                            @endphp
                            <label for="man">
                                <input type="radio" id="man" name="gender" value="1" {{ $gender == 1 ? 'checked' : '' }} >
                                <span></span>男性
                            </label>
                            <label for="woman">
                                <input type="radio" id="woman" name="gender" value="2" {{ $gender == 2 ? 'checked' : '' }}>
                                <span></span>女性
                            </label>
                            <label for="other">
                                <input type="radio" id="other" name="gender" value="3" {{ $gender == 3 ? 'checked' : '' }}>
                                <span></span>その他
                            </label>
                        </div>
                        <div class="form__error-group">
                        @error('gender')
                            <div class="form__error">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">メールアドレス</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--item-text">
                            <input type="email" name="email" value="{{ $contact['email'] ?? '' }}" placeholder="例:test@example.com" >
                        </div>
                        <div class="form__error-group">
                        @error('email')
                            <div class="form__error">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">電話番号</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--tel">
                            <input class="tel-1" type="tel" name="tel-1" value="{{ $contact['tel-1'] ?? '' }}" placeholder="080" >
                            -
                            <input class="tel-2" type="tel" name="tel-2" value="{{ $contact['tel-2'] ?? '' }}" placeholder="1234" >
                            -
                            <input class="tel-3" type="tel" name="tel-3" value="{{ $contact['tel-3'] ?? '' }}" placeholder="5678" >
                        </div>
                        <div class="form__error-group">
                        @error('tel-1')
                            <div class="form__error">{{ $message }}</div>
                        @enderror
                        @error('tel-2')
                            <div class="form__error">{{ $message }}</div>
                        @enderror
                        @error('tel-3')
                            <div class="form__error">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">住所</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--item-text">
                            <input type="text" name="address" value="{{ $contact['address'] ?? '' }}" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3" >
                        </div>
                        <div class="form__error-group">
                        @error('address')
                            <div class="form__error">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                </div>
                <div class="form__group building">
                    <div class="form__group-title">
                        <span class="form__label--item">建物名</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--item-text">
                            <input type="text" name="building" value="{{ $contact['building'] ?? '' }}" placeholder="例:千駄ヶ谷マンション101">
                        </div>
                        <div class="form__error-group">
                            <div class="form__error--building"></div>
                        </div>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">お問い合わせの種類</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--select">
                            @php
                                $content = old('content', $contact['content'] ?? '');
                            @endphp
                            <select name="content" value="{{ $contact['content'] ?? '' }}" >
                                <option class="form__option-1" value="" disabled selected hidden>選択してください</option>
                                <option class="form__option" value="1" {{ $content == 1 ? 'selected' : '' }}>商品のお届けについて</option>
                                <option class="form__option" value="2" {{ $content == 2 ? 'selected' : '' }}>商品の交換について</option>
                                <option class="form__option" value="3" {{ $content == 3 ? 'selected' : '' }}>商品トラブル</option>
                                <option class="form__option" value="4" {{ $content == 4 ? 'selected' : '' }}>ショップへのお問い合わせ</option>
                                <option class="form__option" value="5" {{ $content == 5 ? 'selected' : '' }}>その他</option>
                            </select>
                        </div>
                        <div class="form__error-group">
                        @error('content')
                            <div class="form__error">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">お問い合わせ内容</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--textarea">
                            <textarea name="detail" placeholder="お問い合わせ内容をご記載ください" >{{ $contact['detail'] ?? '' }}</textarea>
                        </div>
                        <div class="form__error-group">
                        @error('detail')
                            <div class="form__error">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                </div>
                <div class="form__button">
                    <button class="form__button-submit" type="submit">確認画面</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>