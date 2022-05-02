@extends('layouts.app')
 
@section('content')
 
<!-- タスク一覧表示 -->
@if (count($entrys) > 0)
<div class="panel panel-default">
    <div class="panel-heading">
        Current Entrys
    </div>
 
    <div class="panel-body">
        <table class="table table-striped entry-table">
 
            <!-- テーブルヘッダ -->
            <thead>
                <th>Entry</th>
                <th>&nbsp;</th>
            </thead>
 
            <!-- テーブル本体 -->
            <tbody>
                @foreach ($entrys as $entry)
                <tr>
                    <!-- タスク名 -->
                    <td class="table-text">
                        <div>{{ $entry->name }}</div>
                    </td>
 
                    <td>
                        <!-- TODO: 削除ボタン -->
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
@endsection