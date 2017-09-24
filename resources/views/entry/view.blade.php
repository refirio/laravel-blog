@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">ブログエントリ</div>

                <div class="panel-body">
                    <dl>
                        <dt>タイトル</dt>
                        <dd>{{{ $entry->title }}}</dd>
                    </dl>
                    <dl>
                        <dt>本文</dt>
                        <dd>{{{ $entry->body }}}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
