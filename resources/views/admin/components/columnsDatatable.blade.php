@foreach($columns as $column)
    @php
        $orderable = isset($column[2]) && $column[2] === true;
        if ($orderable) {
            $url = request('orderType') === 'asc' ? current_query_url([], true, ['orderBy', 'orderType']) : current_query_url([
                'orderBy' => $column[0],
                'orderType' => request('orderType') === 'desc' ? 'asc' : 'desc'
            ]);
        }
    @endphp
    <th id="column_{{ @$column[0] }}"{!! isset($column[3]) ? ' width="'. $column[3] .'"' : '' !!}>
        @if($orderable)
            <a href="{{ $url }}" style="display: block;">
                @if(@$column[0] === request('orderBy'))
                    @if(request('orderType') === 'desc')
                        <span class="fa fa-fw fa-sort-amount-desc"></span>
                    @else
                        <span class="fa fa-fw fa-sort-amount-asc"></span>
                    @endif
                @else
                    <i class="fa fa-fw fa-sort"></i>
                @endif
        @endif

            <span>{{ @$column[1] }}</span>

        @if($orderable)
            </a>
        @endif
    </th>
@endforeach