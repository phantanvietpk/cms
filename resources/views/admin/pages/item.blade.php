<td>
    <strong>{{ $item->title }}</strong><br>
    <div class="row-action">
        @can('pages.edit')
            <a href="{{ route('admin.pages.edit', $item->id) }}">
                <button type="button" class="btn btn-xs btn-default">
                    <i class="fa fa-pencil-square"></i> <span>Sửa</span>
                </button>
            </a>
        @endcan
        @can('pages.destroy')
            <a href="#" data-url="{{ query_url(route('admin.pages.actions'), ['action' => 'destroy', 'id' => $item->id]) }}" data-action="link-confirm">
                <button type="button" class="btn btn-xs btn-default">
                    <i class="fa fa-trash"></i> <span>Xóa</span>
                </button>
            </a>
        @endcan
    </div>
</td>
<td>{{ number_format($item->users_count) }}</td>
<td>{{ $item->created_at }}</td>