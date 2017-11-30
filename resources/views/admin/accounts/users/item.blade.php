<td>
    <img src="{{ $item->avatar() }}" class="img-avatar pull-left m-r-10">
    <strong>{{ $item->name }}</strong> <br>
    <div class="row-action">
        @can('accounts.users.edit')
            <a href="{{ route('admin.accounts.users.edit', $item->id) }}">
                <button type="button" class="btn btn-xs btn-default">
                    <i class="fa fa-pencil-square"></i> <span>Sửa</span>
                </button>
            </a>
        @endcan
        @can('delete', $item)
            <a href="#" data-url="{{ query_url($actionUrl, ['action' => 'destroy', 'id' => $item->id]) }}" data-action="link-confirm">
                <button type="button" class="btn btn-xs btn-default">
                    <i class="fa fa-trash"></i> <span>Xóa</span>
                </button>
            </a>
        @endcan
    </div>
</td>
<td>
    {{ $item->username }}
</td>
<td>
    <a href="mailto:{{ $item->email }}">{{ $item->email }}</a>
</td>
<td>
    @if($item->isActivated())
        <a href="{{ query_url($actionUrl, ['action' => 'deactive', 'id' => $item->id]) }}" class="label label-success">Đang kích hoạt</a>
    @else
        <a href="{{ query_url($actionUrl, ['action' => 'active', 'id' => $item->id]) }}" class="label label-warning">Ngừng kích hoạt</a>
    @endif
</td>
<td>
    @if($item->group)
        <span>{{ $item->group->title }}</span>
    @else
        <span>Không có</span>
    @endif
</td>