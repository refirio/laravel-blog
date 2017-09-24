@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">ブログエントリ</div>

                <div class="panel-body">
                    <p>記事一覧は以下のとおりです。</p>
                    <table class="table">
                        <tr>
                            <th>タイトル</th>
                            <th>本文</th>
                            <th></th>
                        </tr>
                        @forelse($entries as $row)
                        <tr>
                            <td>{{ $row->title }}</td>
                            <td>{{ mb_strimwidth(strip_tags($row->body), 0, 50, '...') }}</td>
                            <td><a href="{{ route('entry.view', [$row->id]) }}">詳細</a></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">ブログ記事がありません</td>
                        </tr>
                        @endforelse
                    </table>
                    {{ $entries->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
