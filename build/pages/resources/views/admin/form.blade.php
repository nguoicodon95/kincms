@extends('base::admin.__master')

@section('content')
<div class="row">
    <form role="form" method="post" action="{{ $page->exists ? route('admin.pages.edit', $page->id) : route('admin.pages.store') }}">
        {{ csrf_field() }}
        @if($page->exists)
            {{ method_field('PUT') }}
        @endif
        <div class="col-md-8 col-sm-12 col-xs-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Thông tin cơ bản</h3>
                </div>
                <div class="box-body">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Tiêu đề <span class="required">*</span></label>
                        <input type="text" 
                                    name="title" 
                                    class="form-control" 
                                    placeholder="Tiêu đề trang ..." 
                                    value="{{ $page->exists ? $page->title : old('title') }}">
                    </div>
                    <div class="form-group">
                        <label>Slug</label>
                        <input type="text"
                                    name="slug" 
                                    class="form-control" 
                                    placeholder="Mặc định slug của trang là tiêu đề ..."
                                    value="{{ $page->exists ? $page->slug : old('slug') }}">
                        <p class="help-block">Liên kết bài viết.</p>
                    </div>
                    <!-- textarea -->
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea class="form-control" name="content" rows="3" placeholder="Nội dung trang ..." style="margin-top: 0px; margin-bottom: 0px; height: 150px;">{{ $page->exists ? $page->content : old('content') }}</textarea>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">SEO</h3>
                </div>
                <div class="box-body">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Từ khóa</label>
                        <input type="text" 
                                    name="keywords"
                                    class="form-control"
                                    placeholder="Từ khóa cho trang ..."
                                    value="{{ $page->exists ? $page->keywords : old('keywords') }}">
                    </div>
                    <!-- textarea -->
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control" name="description" rows="3" placeholder="Mô tả trang ...">{{ $page->exists ? $page->description : old('description') }}</textarea>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Bản mẫu</h3>
                    <div class="pull-right box-tools">
                        <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                   <div class="form-group">
                        <label>Chọn bản mẫu</label>
                        <select class="form-control" name="template">
                            <option value="">Bản mẫu mặc định</option>
                        </select>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Cài đặt</h3>
                    <div class="pull-right box-tools">
                        <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                   <div class="form-group">
                        <label>Hình ảnh</label>
                    </div>
                </div>
                <div class="box-body">
                   <div class="form-group">
                        <label>Trạng thái</label>
                        <select class="form-control" name="status">
                            <option value="active">Kích hoạt</option>
                            <option value="disable">Vô hiệu hóa</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="box box-danger">
                <div class="box-body">
                   <button class="btn btn-default" name="continute" value="true">Lưu và quay lại trang index</button>
                   <button class="btn btn-success">Lưu</button>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </form>
</div>
@endsection

@push('js-push')
@endpush