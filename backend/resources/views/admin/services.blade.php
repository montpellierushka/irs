@extends('admin.layout')

@section('title', 'Услуги')

@section('css')
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')	 
<div class="row">
	<div class="col-12">
		<div class="card"> 
			<div class="card-body p-0 pt-2"> 
				<table id="subjects-table" class="table dataTable table-hover m-0" style="margin:0 !important">
					<thead>
						<tr>  
							<th>#</th>  
							<th>Название</th> 
							<th class="sorting_disabled"></th>
							<th class="sorting_disabled"></th>
						</tr>
					</thead>
					<tbody>
						<?foreach($services as $s){?>
							<tr> 
								<td><?=$s->id?></td> 
								<td><?=$s->title?></td>  
								<td><a href="{{url(route('admin_vacancies').'/'.$v->id)}}">Подробнее</a></td>
								<td><a href="javascript:;" class="open-delete" data-id="<?=$s->id?>" data-toggle="modal" data-target="#modal-delete">Удалить</a></td>
							</tr> 
						<?}?>
					</tbody>
				</table>
			</div> 
		</div> 
	</div>
</div> 
 
<div class="modal fade" id="modal-delete">
	<div class="modal-dialog">
		<form method="POST" action="{{ route('admin_services_delete') }}" class="modal-content">
			@csrf
			<input type="hidden" name="id">
			<div class="modal-header">
				<h4 class="modal-title">Удалить #<span></span></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Вы уверены в том что хотите удалить услугу #<b><i></i></b>?</p>
			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
				<button type="submit" class="btn btn-primary">Удалить</button>
			</div>
		</form>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal --> 

@endsection

@section('scripts')
<script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script><script>
	$(function () { 
		$('#subjects-table').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": true,
			"ordering": true,
			order:  [[0, 'asc']],
			"info": false,
			"autoWidth": false,
			"responsive": true,
	        "language": {
	            "sSearch": "Поиск:",
	            "sZeroRecords": "Ничего не найдено"
	        }
		});
		$('body').on('click',".open-delete",function(){ 
			$("#modal-delete .modal-title span").text($(this).attr('data-id'))
			$("#modal-delete [name='id']").val($(this).attr('data-id'))
			$("#modal-delete .modal-body p i").text($(this).attr('data-id'))
		})
 
 
	});
</script>
@endsection