{{-- 継承 --}}
@extends('layouts.base')
{{-- タイトル --}}
@section('title', '商品管理')
{{-- ヘッダ部 --}}
@section('active_master', 'active')
@section('active_master_item', 'active')
{{-- メイン部 --}}
@section('content')
    @parent

    <div class="search-box">
        <form class="row g-3" action="{{ url('item/search') }}" method="POST">
            @csrf
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">商品名称</label>
                <input type="text" class="form-control" id="itemName" name="itemName">
            </div>
            <div class="col-12 align-right">
                <button type="submit" class="btn btn-info">検索</button>
            </div>
        </form>
    </div>
    @error('id')
        <span class="text-danger">{{ $message }}</span><br>
    @enderror
    @error('name')
        <span class="text-danger">{{ $message }}</span><br>
    @enderror
    @error('list_price')
        <span class="text-danger">{{ $message }}</span><br>
    @enderror
    <div class="btn-container align-right">
        <div class="btn-group">
            <button type="button" class="btn btn-success" name="add" data-bs-toggle="modal" data-bs-target="#add"
                data-bs-whatever="@mdo">追加</button>
            <button type="button" class="btn btn-primary" id="edit-btn" name="edit" data-bs-toggle="modal"
                data-bs-target="#edit" data-bs-whatever="@mdo">更新</button>
            <button type="button" class="btn btn-danger" id="delete-btn" name="delete" data-bs-toggle="modal"
                data-bs-target="#delete" data-bs-whatever="@mdo">削除</button>
        </div>

        {{-- 商品追加モーダル --}}
        <div class="modal fade" id="add" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addLabel">商品追加</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('item/add') }}" method="POST">
                            @csrf
                            <div class="mb-3 align-left">
                                <label for="recipient-name" class="col-form-label">ID</label>
                                <input type="text" class="form-control" id="id" disabled>

                            </div>
                            <div class="mb-3 align-left">
                                <label for="message-text" class="col-form-label">商品名</label>
                                <input type="text" class="form-control" id="name" name="name">

                            </div>
                            <div class="mb-3 align-left">
                                <label for="message-text" class="col-form-label">定価</label>
                                <input type="text" class="form-control" id="list_price" name="list_price">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                                <button type="submit" class="btn btn-success">追加</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        {{-- 商品更新モーダル --}}
        <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editLabel">商品更新</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('item/edit') }}" method="POST">
                            @csrf
                            <div class="mb-3 align-left">
                                <label for="recipient-name" class="col-form-label">ID</label>
                                <input type="text" class="form-control" id="id" name="id" readonly>

                            </div>
                            <div class="mb-3 align-left">
                                <label for="message-text" class="col-form-label">商品名</label>
                                <input type="text" class="form-control" id="name" name="name">

                            </div>
                            <div class="mb-3 align-left">
                                <label for="message-text" class="col-form-label">定価</label>
                                <input type="text" class="form-control" id="list_price" name="list_price">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                                <button type="submit" class="btn btn-success">更新</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        {{-- 商品削除モーダル --}}
        <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="deleteLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteLabel">商品更新</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body align-left">
                        <form action="{{ url('item/delete') }}" method="POST">
                            @csrf
                            <p>商品を削除しますか？</p>
                            <div class="modal-footer">
                                <input type="hidden" id="id" name="id">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                                <button type="submit" class="btn btn-danger">削除</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>商品名称</th>
                <th>定価</th>
                <th>作成⽇時</th>
                <th>更新⽇時</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radioId" id="radioId1"
                                value="{{ $item->id }}">
                        </div>
                    </td>
                    <td>{{ $item->id }}</td>
                    <td class="name">{{ $item->name }}</td>
                    <td class="list_price">{{ $item->list_price }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script>
        //選択したIDを更新/削除ボタンに渡す
        $('input:radio[name="radioId"]').on('change', function() {
            const checkedId = $('input:radio[name="radioId"]:checked').val();
            $('#edit-btn').attr('data-bs-id', checkedId);
            $('#delete-btn').attr('data-bs-id', checkedId);
        });

        // 更新モーダルにパラメータ渡し
        $('#edit').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var getId = button.data('bs-id');

            var modal = $(this);
            modal.find('#id').val(getId);
        });

        // 削除モーダルにパラメータ渡し
        $('#delete').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var getId = button.data('bs-id');

            var modal = $(this);
            modal.find('#id').val(getId);
        });
    </script>
@endsection
