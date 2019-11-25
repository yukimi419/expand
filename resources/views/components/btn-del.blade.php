@php
    $id_attr = 'modal-delete-' . $controller . '-' . $id;
@endphp

{{-- 削除ボタン --}}
<a class="article-d" href="#" data-toggle="modal" data-target="#{{ $id_attr }}"><i class="fas fa-trash"></i> 削除</a>

{{-- モーダルウィンドウ --}}
<div class="modal fade" id="{{ $id_attr }}" tabindex="-1" role="dialog" aria-labelledby="{{ $id_attr }}-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="{{ $id_attr }}-label">
                    記事の削除
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>削除してもよろしいですか？</p>
                <p><strong>{{ $name }}</strong></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                閉じる
                </button>
                {{-- 削除用のアクションを実行させるフォーム --}}
                <form action="{{ url('user/'.$controller.'/'.$id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                    削除
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>