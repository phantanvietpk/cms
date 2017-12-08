<td>{!! sprintf( '<img src="%s" width="100">', $item->images ) !!}</td>
<td>
    <strong>{{ $item->name }}</strong><br>
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
<td>{{ $item->sku }}</td>
<td>{!! sprintf( '<span class="label label-%s">%s</span>',
                    $item->published ? 'success' : 'warning',
                    $item->published ? trans('language.published') : trans('language.trashed')
                ) !!}</td>
<td>{{ $item->created_at }}</td>