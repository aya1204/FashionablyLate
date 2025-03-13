<!-- {{ dd($categories) }} -->
@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&display=swap" rel="stylesheet">
@endsection

@section('content')
{{ dd($categories) }}

<div class="FashionablyLate__content">
    <div class="section__title">
        <h2>Admin</h2>
    </div>

    <form class="search-form" action="/admin" method="get">
        <div class="search-form__item">
            <input class="search-form__text-input" type="text" name="content" value="{{ old('content') }}" />
            <select name="gender" id="search-form__item-select">
                <option value="0">全て</option>
                <option value="1">男性</option>
                <option value="2">女性</option>
                <option value="3">その他</option>
            </select>
            <select name="inquiry_type" id="" class="search-form__item-select">
                <option value="1">商品の交換について</option>
                <option value="2">返金について</option>
                <option value="3">その他</option>
            </select>
            <input type="date" id="inputDate" />
            <select name="年/月/日" id="" class="search-form__item-select">
            </select>
        </div>
        <div class="search-form__button">
            <button class="search-form__button-submit" type="submit">検索</button>
        </div>
        <div class="reset-form__button">
            <button class="reset-form__button-submit" type="reset">リセット</button>
        </div>
    </form>

    <form class="export-form" action="/FashionablyLate/detail">
        <div class="export-form__button">
            <button class="export-form__button-submit" type="submit">エクスポート</button>
        </div>
    </form>

    <div class="category-table">
        <table class="category-table__inner">
            <tr class="category-table__row">
                <th class="category-table__header">
                    <span class="category__header-span">お名前</span>
                    <span class="category__header-span">性別</span>
                    <span class="category__header-span">メールアドレス</span>
                    <span class="category__header-span">お問い合わせの種類</span>
                </th>
            </tr>
            @foreach ($categories->items() as $category)
            <tr class="category-table__row">
                <td class="category-table__item">
                    <!-- <p class="category-table__item-p">{{ $category->last_name }}{{ $category->first_name }}</p>
                    <p class="category-table__item-p">{{ $category->gender }}</p>
                    <p class="category-table__item-p">{{ $category->email}}</p>
                    <p class="category-table__item-p">{{ $category->inquiry_type }}</p>
                    <p class="category-table__item-p">{{ $detail }}</p> -->
                    <form class="detail-form" action="/FashionablyLate/detail" method="get">
                        <!-- <div class="detail-form__item">
                            <input class="detail-form__item-input" type="text" name="content" value="{{ $category->content }}" />
                            <input type="hidden" name="id" value="{{ $category->id }}" />
                        </div> -->
                        <div class="detail-form__item">
                            <p class="detail-form__item-p">{{ $category->last_name }}{{ $category->first_name }}</p>
                        </div>
                        <div class="detail-form__item">
                            <p class="detail-form__item-p">{{ $category->gender }}</p>
                        </div>
                        <div class="detail-form__item">
                            <p class="detail-form__item-p">{{ $category->email }}</p>
                        </div>
                        <div class="detail-form__item">
                            <p class="detail-form__item-p">{{ $category->inquiry_type }}</p>
                        </div>
                        <input type="hidden" name="id" value="{{ $category->id }}">
                    </form>
                </td>
            </tr>

            <!-- <tr class="category-table__row">
                <td class="category-table__item">
                    <form class="detail-form" action="/FashionablyLate/detail" method="get">
                        <div class="detail-form__item">
                            <input class="detail-form__item-input" type="text" name="content" value="{{ $category->content }}" />
                            <input type="hidden" name="id" value="{{ $category->id }}" />
                        </div>
                        <div class="detail-form__item">
                            <p class="detail-form__item-p">{{ $category->name }}</p>
                        </div>
                        <div class="detail-form__item">
                            <p class="detail-form__item-p">{{ $category->gender }}</p>
                        </div>
                        <div class="detail-form__item">
                            <p class="detail-form__item-p">{{ $category->email }}</p>
                        </div>
                        <div class="detail-form__item">
                            <p class="detail-form__item-p">{{ $category->inquiry_type }}</p>
                        </div>
                        <div class="modal" id="detailModal">
                            <div class="modal-content">
                                <span class="close-button" id="closeButton">&times;</span>
                                <h2>詳細情報</h2>
                                <div id="modalDetails">
                                    届いた商品が注文した商品ではありませんでした。
                                    商品の取り替えをお願いします。
                                </div>
                            </div>
                        </div> -->
            <!-- <div class="detail-form__button">
                            <button class="detail-form__button-submit" type="submit">
                                詳細
                            </button>
                        </div> -->
            <!-- </form>
                </td>
            </tr> -->
            @endforeach
        </table>
        <div class="pagination">
            {{ $categories->links() }}
        </div>
    </div>
</div>
@endsection