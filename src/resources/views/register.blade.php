<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <div class="header__title">FashionablyLate</div>
            <a href="{{ route('login') }}" class="header__login-button">login</a>
        </div>
    </header>

    <main>
        <div class="register__background">
            <div class="register__content">
                <div class="register-form">
                    <div class="register-form__title">Register</div>
                </div>
                <form class="register-form__content" action="{{ route('register') }}" method="post" novalidate>
                    @csrf
                    <div class="register-form__group">
                        <div class="register-form__label register-form__label-name">
                            お名前
                        </div>
                        <input type="name" name="name" value="{{ old('name') }}" class="register-form__input" placeholder="例:山田   太郎">
                        <div class="register-form__group-error">
                            @error ('name')
                                <div class="form__error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="register-form__group">
                        <div class="register-form__label">
                            メールアドレス
                        </div>
                        <input type="email" name="email" value="{{ old('email') }}" class="register-form__input" placeholder="例:test@example.com">
                        <div class="register-form__group-error">
                            @error ('email')
                                <div class="form__error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="register-form__group register-form__group-bottom">
                        <div class="register-form__label register-form__label-password">
                            パスワード
                        </div>
                        <input type="password" name="password" class="register-form__input" placeholder="例:coachtechno6">
                        <div class="register-form__group-error">
                            @error ('password')
                                <div class="form__error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="register-form__button">
                        <button class="register-form__button-submit">登録</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>