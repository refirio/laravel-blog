@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">ブログエントリ</div>
                @include('elements.admin.information')
                <div class="panel-body">
                    <div>
                        <a href="{{{ route('admin.entry.create') }}}" class="btn btn-primary">ブログを投稿する</a>
                    </div>
                    @if(session('message'))
                        <div class="alert alert-danger" role="alert">
                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            <span class="sr-only">Error:</span>
                            {{{ session('message') }}}
                        </div>
                    @endif
                </div>
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <th>タイトル</th>
                            <th>本文</th>
                            <th></th>
                        </tr>
                        @forelse($entries as $row)
                        <tr>
                            <td>{{{ $row->title }}}</td>
                            <td>{{{ mb_strimwidth(strip_tags($row->body), 0, 30, "...") }}}</td>
                            <td><a href="{{{ route('admin.entry.edit', [$row->id]) }}}">編集</a></td>
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
