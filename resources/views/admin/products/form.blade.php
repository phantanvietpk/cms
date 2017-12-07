@section('back', route('admin.products.index'))
<div class="row">
    <!-- Basic example -->
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title">Thông tin</h3></div>
            <div class="panel-body">

                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Từ khóa</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Nhập từ khóa">
                        @if($errors->has('name'))
                            <div class="help-block">{{ $errors->first('name') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="description">Chi tiết</label>
                        <textarea class="form-control" rows="5" name="description" id="description" name="description" readonly>{{ old('description') }}</textarea>
                        @if($errors->has('description'))
                            <div class="help-block">{{ $errors->first('description') }}</div>
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-fw fa-check-circle"></i> Lưu
                        </button>
                    </div>
            </div><!-- panel-body -->
        </div> <!-- panel -->
    </div> <!-- col-->
</div>
@push('scripts')
    <script src="{{ backend_asset('js/app.js') }}"></script>
@endpush