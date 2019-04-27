@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card-header" style="border:solid 1px #dee2e6;">ユーザ一覧</div>

            <a class="btn btn-primary" style="width:100px;margin:5px" href="{{ url('/model/create') }}" role="button">新規追加</a>

            <table class="table"  style="border:solid 1px #dee2e6;">
                <thead class="thead-dark">
                  <tr style="border:solid 1px #dee2e6;">
                    <th scope="col" style="border:solid 1px #dee2e6;">ID</th>
                    <th scope="col" style="border:solid 1px #dee2e6;">名前</th>
                    <th scope="col" style="border:solid 1px #dee2e6;">メール</th>
                    <th scope="col" style="border:solid 1px #dee2e6;">操作</th>
                  </tr>
                </thead>
                <tbody>
                    <!-- @TODO ユーザーデータを回して表示する start-->
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a class="btn btn-primary" href="/model/edit/{{ $user->id }}" role="button">修正</a>
                                <button type="button" data-id="{{ $user->id }}" class="btn btn-secondary delButton">削除</button>
                            </td>
                        </tr>
                        @endforeach
                    <!-- @TODO ユーザーデータを回して表示する end-->
                </tbody>
            </table>
        </div>
    </div>
</div>

<form id="delForm" action="/model/delete" method="post">
    <input id="del_id" name="delId" type="hidden" value="">
    @csrf
</form>

<script>
    $(function(){
        $(".delButton").click(function() {

            //確認ダイアログを表示する
            if (confirm("本当に削除してよろしいですか？")) {
                $("#del_id").val($(this).data().id);
                $("#delForm").submit();
            } else {

            }
        });
    });
</script>

@endsection
