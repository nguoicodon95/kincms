@extends('base::admin.__master')

@push('css-push')
<style type="text/css">
</style>
@endpush

@section('content')
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<div class="pull-left">
						<h3 class="box-title">Trang</h3>
					</div>
					<div class="pull-right">
						<label><strong>Hành động chung: </strong></label>
						<select name="global_action">
							<option value="0">Lựa chọn</option>
							<option value="active">Kích hoạt</option>
							<option value="disable">Vô hiệu hóa</option>
							<option value="deleted">Xóa</option>
						</select>
						<button class="button-handle-global-action">Xử lí</button>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
				<table id="lists-data" class="table table-bordered table-hover">
				<thead>
				<tr>
				<th>
					<div class="checkbox-style">
						<input type="checkbox" id="check-all"/>
						<label for="check-all"></label>
					</div>
				</th>
				<th>Tiêu đề</th>
				<th>Mẫu</th>
				<th>Trạng thái</th>
				<th>Ngày tạo</th>
				<th>Hành động</th>
				</tr>
				</thead>
				<tbody>
				@foreach($pages as $page)
					<tr>
						<td>
							<div class="checkbox-style">
								<input type="checkbox" class="check-item" value="{{ $page->id }}" id="check-id-{{ $page->id }}" name="id[]"/>
								<label for="check-id-{{ $page->id }}"></label>
							</div>
						</td>
						<td>{{ $page->title }}</td>
						<td>{{ $page->templates }}</td>
						<td>{!! converStatus($page->status) !!}</td>
						<td>{{ $page->created_at }}</td>
						<td>
							<a href="{{ route('admin.pages.update', $page->id) }}" class="btn btn-primary btn-flat btn-sm" ><b><i class="fa fa-pencil"></i></b></a>
							<buttondata-target="#modal-delete-confirmation" data-action-target="{{ route('admin.pages.delete', [$page->id]) }}" class="btn btn-danger btn-flat btn-sm" data-toggle="modal"><b><i class="fa fa-trash"></i></b></button>
						</td>
					</tr>
				@endforeach
				</tbody>
				<tfoot>
				<tr>
				<th></th>
				<th>Tiêu đề</th>
				<th>Đường dẫn</th>
				<th>Mẫu</th>
				<th>Ngày tạo</th>
				<th>Hành động</th>
				</tr>
				</tfoot>
				</table>
				</div>
				<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
			<!-- /.col -->
		</div>
	<!-- /.row -->
</section>
@endsection

@push('js-push')
<script type="text/javascript">
	$(function () {
		$('#lists-data').DataTable({
			"paging": false,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": false,
			"autoWidth": false,
			"order": [[ 0 ]],
			"stateSave": true,
			"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Tất cả"]],
			"language": {
				"lengthMenu": "Hiển thị _MENU_",
				"zeroRecords": "Không tìm thấy gì",
				"info": "Hiển thị trang _PAGE_ của _PAGES_",
				"infoEmpty": "Không có hồ sơ nào",
				"search": "Tìm kiếm",
				"paginate": {
					"previous": "Trang trước",
					"next": "Trang sau",
					"last": "Trang cuối",
					"first": "Trang đầu",
				}
			},
			"columnDefs": [
				{
					"targets": [0],
					"orderable": false,
					"width": "7%",
					"className": "p-target-0"
				},
				{
					"targets": [5],
					"orderable": false
				}
			]
		});
	});
</script>
@endpush