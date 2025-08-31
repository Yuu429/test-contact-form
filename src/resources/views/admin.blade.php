<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <div class="header__title">
                FashionablyLate
            </div>
            @if (Auth::check())
            <form class="header__logout-button" action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="header__logout">
                    logout
                </button>
            </form>
            @endif
        </div>
    </header>

    <main>
        <div class="admin__content">
            <div class="admin__heading">
                Admin
            </div>
            <div class="function">
                <form action="{{ route('admin.index') }}" method="get" class="search-form">
                    <div class="function__wrap">
                        <div class="search-form__item">
                            <input class="search-form__item-input" type="text" name="keyword" value="{{ old('keyword', request('keyword')) }}" placeholder="名前やメールアドレスを入力してください">
                        </div>
                        <div class="gender__selection">
                            <select class="select__gender" name="gender">
                                <option value="">性別</option>
                                <option value="">全て</option>
                                <option value="1" @selected(request('gender') == '1' ? 'selected' : '')>男性</option>
                                <option value="2" @selected(request('gender') == '2' ? 'selected' : '')>女性</option>
                                <option value="3" @selected(request('gender') == '3' ? 'selected' : '')>その他</option>
                            </select>
                        </div>
                        <div class="content__selection">
                            <select class="select__content" name="category_id">
                                <option value="">お問い合わせの種類</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->content }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="date">
                            <input type="date" name="date" value="{{ request('date') }}" class="form__date">
                        </div>
                        <div class="search-form__item">
                            <button type="submit" class="search-form__item-button">検索</button>
                        </div>
                    </div>
                </form>
                <div class="reset-form__item">
                    <a href="{{ route('admin.index') }}" class="reset-form__item-button">リセット</a>
                </div>
            </div>
            <div class="export">
                <a href="{{ route('admin.export', request()->query()) }}" class="export__button">
                    エクスポート
                </a>
                <div class="pagination">
                    {{ $contacts->onEachSide(2)->links('pagination::default') }}
                </div>
            </div>
            <div class="contact-view">
                <div class="contact-view__heading">
                    <div class="contact-view__heading-wrap">
                        <div class="heading__col heading__name">
                            お名前
                        </div>
                        <div class="heading__col heading__gender">
                            性別
                        </div>
                        <div class="heading__col heading__email">
                            メールアドレス
                        </div>
                        <div class="heading__col heading__content">
                            お問い合わせの種類
                        </div>
                    </div>
                </div>
                <div class="contact-view__main">
                    @foreach ($contacts as $contact)
                        <div class="contact-row">
                            <div class="contact-col contact-name">{{ $contact->first_name }}　{{ $contact->last_name }}</div>
                            <div class="contact-col contact-gender">@if ($contact->gender == 1)
                                    男性
                                @elseif ($contact->gender == 2)
                                    女性
                                @elseif ($contact->gender == 3)
                                    その他
                                @endif
                            </div>
                            <div class="contact-col contact-email">{{ $contact->email }}</div>
                            <div class="contact-col contact-content">{{ $contact->category->content }}</div>
                            <div class="contact-col contact-detail">
                            <a href="#modal-{{ $contact->id }}" class="modal-open" data-id="{{ $contact->id }}">詳細</a>
                            </div>
                        </div>
                        <div id="modal-{{ $contact->id }}" class="modal">
                            <div class="modal__content">
                                <a href="#" class="modal__close">&times;</a>
                                <p class="modal__item"><strong>お名前</strong> {{ $contact->first_name }}　{{ $contact->last_name }}</p>
                                <p><strong>性別</strong>
                                    @if ($contact->gender == 1)
                                        男性
                                    @elseif ($contact->gender == 2)
                                        女性
                                    @elseif ($contact->gender == 3)
                                        その他
                                    @endif
                                </p>
                                <p><strong>メールアドレス</strong> <span class="modal__value">{{ $contact->email }}</span></p>
                                <p><strong>電話番号</strong><span class="modal__value">{{ $contact->tel }}</span></p>
                                <p><strong>住所</strong><span class="modal__value">{{ $contact->address }}</span></p>
                                <p><strong>建物名</strong><span class="modal__value">{{ $contact->building }}</span></p>
                                <p><strong>お問い合わせの種類</strong><span class="modal__value">{{ $contact->category->content }}</span></p>
                                <p><strong>お問い合わせ内容</strong><span class="modal__value">{{ $contact->detail }}</span></p>
                                <form action="{{ route('contacts.destroy', $contact->id) }}" method="post" class="delete-form">
                                    @csrf
                                    @method('delete')
                                    <button class="modal__delete-button" type="submit">削除</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
</body>
</html>