@extends('layouts.app')

@section('content')
<h1>{{ \Carbon\Carbon::parse($month)->format('Y年m月') }}</h1>
<a href="{{ route('calendar.index', ['month' => \Carbon\Carbon::parse($month)->subMonth()->format('Y-m')]) }}">前月</a>
<a href="{{ route('calendar.index', ['month' => \Carbon\Carbon::parse($month)->addMonth()->format('Y-m')]) }}">次月</a>

<table>
    <!-- カレンダーのヘッダー（日付）を表示 -->
    <tr>
        @for ($day = 1; $day <= \Carbon\Carbon::parse($month)->daysInMonth; $day++)
            <td>
                <a href="{{ route('schedules.create', ['date' => $month . '-' . $day]) }}">
                    {{ $day }}
                </a>
            </td>
        @endfor
    </tr>
</table>
@endsection
