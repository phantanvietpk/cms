@section('back', route('admin.pages.index'))

<!-- Basic example -->
<div class="col-md-8">
    <div class="panel panel-default">
        <div class="panel-heading"><h3 class="panel-title">Thông tin trang</h3></div>
        <div class="panel-body">

                <div class="form-group">
                    <label for="name">Tiêu đề trang</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Nhập tiêu đề trang">
                </div>

                <div class="form-group">
                    <label for="description">Mô tả trang</label>
                    <textarea class="form-control" rows="5" name="description" id="description" name="description"></textarea>
                </div>

                <div class="form-group">
                    <label for="content">Nội dung trang</label>
                    <textarea class="form-control" rows="8" name="content" id="content" name="content"></textarea>
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-fw fa-save"></i> Lưu
                    </button>
                </div>
        </div><!-- panel-body -->
    </div> <!-- panel -->
</div> <!-- col-->
<div class="col-md-4">
    <div class="panel panel-default">
        <div class="panel-heading"><h3 class="panel-title">Cài đặt</h3></div>
        <div class="panel-body">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="col-sm-6 control-label">Hiển thị</label>
                <div class="col-sm-6 control-label">
                    <div class="toggle toggle-primary"></div>
                </div>
            </div>
        </div><!-- panel-body -->
    </div> <!-- panel -->
</div> <!-- col-->

@push('scripts')
    <script src="{{ backend_asset('js/app.js') }}"></script>
@endpush