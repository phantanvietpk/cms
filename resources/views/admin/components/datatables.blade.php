@if($data->isNotEmpty())
    <div class="pull-right">
        <form action="{{ $searchUrl }}" method="GET" class="form-inline">
            <div class="form-group">
                <label for="search" class="sr-only">Tìm kiếm</label>
                <input type="search" id="search" name="q" value="{{ request('q') }}" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-search"></i> Tìm kiếm
                </button>
            </div>
        </form>
    </div>

    <form action="{{ $actionUrl }}" method="GET">
        @if(isset($actions) && count($actions) > 0)
        <div class="pull-left">
            <div class="form-inline">
                <div class="form-group">
                    <label for="action" class="sr-only">Hành động</label>
                    <select name="action" id="action" class="form-control">
                        <option value="-1">Hành động</option>
                        @foreach($actions as $action)
                            @can($action[2]) <option value="{{ $action[0] }}">{{ $action[1] }}</option> @endcan
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-check-circle"></i> Thực hiện
                    </button>
                </div>
            </div>
        </div>
        @endif
        <div class="clearfix"></div>
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    @if(isset($actionColumn) && $actionColumn === true)
                    <th class="text-center" width="10px">
                        <label class="cr-styled">
                            <input type="checkbox" data-action="toggle-checkbox-table">
                            <i class="fa"></i>
                        </label>
                    </th>
                    @endif

                    @include('admin.components.columnsDatatable')
                </tr>
                </thead>
                <tbody>
                @foreach($data as $item)
                    <tr>
                        <td>
                            <label class="cr-styled">
                                <input type="checkbox" name="id[]" value="{{ $item->id }}">
                                <i class="fa"></i>
                            </label>
                        </td>
                        @include($view, ['item' => $item])
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </form>
    <div class="m-t-5">
        @if($data->lastPage() > 2)
            <div class="pull-right">
                {{ $data->appends(request()->except(['page']))->links() }}
            </div>
        @endif
        <div class="pull-left">
            <p>Tổng cộng <strong>{{ $data->total() }}</strong> kết quả.</p>
        </div>
        <div class="clearfix"></div>
    </div>
@else
    <p class="alert alert-warning alert-important text-center">
        Không có nội dung ở đây.
    </p>
@endif