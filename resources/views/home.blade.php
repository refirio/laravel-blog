@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">ダッシュボード</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>ログインしています。</p>
                    <ul>
                        <li><a href="{{ route('admin.entry') }}">ブログ管理</a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    <p>新着記事は以下のとおりです。</p>
                    <table class="table">
                        <tr>
                            <th>タイトル</th>
                            <th>本文</th>
                        </tr>
                        @forelse($entries as $row)
                        <tr>
                            <td>{{ $row->title }}</td>
                            <td>{{ mb_strimwidth(strip_tags($row->body), 0, 30, "...") }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2">ブログ記事がありません</td>
                        </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
