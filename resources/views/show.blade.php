@extends('layout')

@section('content')
        <h1>{{ $work->name }}</h1>
        <div>
          <p>{{ $work->name }}</p>
          <p>{{ $work->criant }}</p>
          <p>{{ $work->money }}</p>
          <p>{{ $work->year }}</p>
          <p>{{ $work->munth }}</p>
          <p>{{ $work->day }}</p>
          <p>{{ $work->state }}</p>
          <p>{{ $work->category->name }}</p>
          <p>{{ $work->result }}</p>
          <p>{{ $work->bikou }}</p>
        </div>
        <div>
          <a href={{ route('work.list') }}>一覧に戻る</a>
          @auth
            @if ($work->user_id === $login_user_id)
              |<a href={{ route('work.edit', ['id' => $work->id]) }}>更新</a>
              <p></p>
              {{ Form::open(['method' => 'delete', 'route' => ['work.destroy', $work->id]]) }}
                {{ Form::submit('削除', ['class' => 'btn btn-outline-danger']) }}
              {{ Form::close() }}
            @endif
          @endauth
        </div>

@endsection
