<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <div class="header__title">
                FashionablyLate
            </div>
            <a href="{{ route('register') }}" class="header__register">
                register
            </a>
        </div>
    </header>

    <main>
        <div class="login__background">
            <div class="login__content">
                <div class="login-form">
                    <div class="login-form__title">Login</div>
                </div>
                <form class="login-form__content" action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="login-form__group">
                        <div class="login-form__label">
                            メールアドレス
                        </div>
                        <input type="email" name="email" value="{{ old('email') }}" class="login-form__input" placeholder="例:test@example.com">
                        <div class="login-form__group-error">
                            @error ('email')
                                <div class="form__error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="login-form__group login-form__group-bottom">
                        <div class="login-form__label login-form__label-password">
                            パスワード
                        </div>
                        <input type="password" name="password" class="login-form__input" placeholder="例:coachtechno6">
                        <div class="login-form__group-error">
                            @error ('password')
                                <div class="form__error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="login-form__button">
                        <button class="login-form__button-submit">ログイン</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>