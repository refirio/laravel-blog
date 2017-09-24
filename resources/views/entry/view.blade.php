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
                {{--  ここからは記事に対してのコメントフォームとなります --}}
                <div class="panel-body">
                    <form method="post" action="{{{ route('comment.store') }}}">
                        {!! csrf_field() !!}
                        <input type="hidden" name="entry_id" value="{{{ $entry->id }}}">
                        <div class="form-group col-md-4">
                            <label class="control-label" for="name">名前</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="名前" value="{{{ old('name') }}}">
                        </div>
                        <div class="form-group col-md-8 @if($errors->first('comment'))has-error @endif">
                            <label class="control-label" for="entry_id">コメント {{ $errors->first('comment') }}</label>
                            <textarea class="form-control" name="comment" id="comment"
                                placeholder="コメントを入力してください" rows="1"></textarea>
                        </div>
                        <div class="form-group pull-right">
                            <button type="submit" class="btn btn-success">コメントを投稿する</button>
                        </div>
                    </form>
                </div>
                {{--  ここまでが記事に対してのコメントフォームです --}}
                {{--  ここからは記事に対してのコメントとなります --}}
                <div class="panel-body">
                    @foreach($comments as $comment)
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    {{{ $comment->name }}} / {{{ $comment->created_at }}}
                                </h3>
                            </div>
                            <div class="panel-body word-break">
                                {{{ $comment->comment }}}
                            </div>
                        </div>
                    @endforeach
                </div>
                {{--  ここまでが記事に対してのコメントです --}}
            </div>
        </div>
    </div>
</div>
@endsection
