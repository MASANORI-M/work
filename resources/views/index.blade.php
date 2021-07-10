@extends('layout')

@section('content')

        <h1>案件一覧</h1>
        <p></p>
        @auth
          <div>
            <a href={{ route('work.new') }} class='btn btn-outline-primary'>New案件</a>
          <div>
        @endauth

        <p></p>
        <table class="table table-striped table-hover">
          <tr>
            <th>案件名</th><th>顧客名</th><th>契約金額</th><th>年</th><th>月</th><th>日</th><th>状態</th><th>仲介</th><th>満足度</th><th>備考</th><th>対応者</th>
          </tr>

        @foreach ($works as $work)
            <tr>
                <td>
                  <a href={{ route('work.detail', ['id' => $work->id]) }}>
                    {{ $work->name }}
                  </a>
                </td>
                <td>{{ $work->criant }}</td>
                <td>{{ $work->money }}</td>
                <td>{{ $work->year }}</td>
                <td>{{ $work->munth }}</td>
                <td>{{ $work->day }}</td>
                <td>{{ $work->state }}</td>
                <td>{{ $work->category->name }}</td>
                <td>{{ $work->result }}</td>
                <td>{{ $work->bikou }}</td>
                <td>{{ $work->user->name }}</td>
            </tr>
        @endforeach
      </table>
@endsection
