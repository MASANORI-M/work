@extends('layout')

@section('content')
        <h1>{{ $work->name }}を編集</h1>
        {{ Form::model($work, ['route' => ['work.update', $work->id]]) }}
          <div class="form-group">
            {{ Form::label('name', '案件名：') }}
            {{ Form::text('name', null) }}
          </div>
          <div class="form-group">
            {{ Form::label('criant', '顧客名：') }}
            {{ Form::text('criant', null) }}
          </div>
          <div class="form-group">
            {{ Form::label('money', '契約金額：') }}
            {{ Form::text('money', null) }}
          </div>
          <div class="form-group">
            {{ Form::label('year', '年：') }}
            {{ Form::text('year', null) }}
          </div>
          <div class="form-group">
            {{ Form::label('munth', '月：') }}
            {{ Form::text('munth', null) }}
          </div>
          <div class="form-group">
            {{ Form::label('day', '日：') }}
            {{ Form::text('day', null) }}
          </div>
          <div class="form-group">
            {{ Form::label('state', '状態：') }}
            {{ Form::text('state', null) }}
          </div>
          <div class="form-group">
            {{ Form::label('category_id', '仲介：') }}
            {{ Form::select('category_id', $categories) }}
          </div>
          <div class="form-group">
            {{ Form::label('result', '満足度：') }}
            {{ Form::text('result', null) }}
          </div>
          <div class="form-group">
            {{ Form::label('bikou', '備考：') }}
            {{ Form::text('bikou', null) }}
          </div>
          <div class="form-group">
            {{ Form::submit('追加する', ['class' => 'btn btn-outline-primary']) }}
          </div>
        {{ Form::close() }}

        <div>
          <a href={{ route('work.list') }}>一覧に戻る</a>
        </div>

@endsection
