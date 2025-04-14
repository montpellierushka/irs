@extends('admin.layout')

@section('title', 'Заявки')

@section('css') 
<!-- Ekko Lightbox -->
<link rel="stylesheet" href="{{ asset('adminlte/plugins/ekko-lightbox/ekko-lightbox.css')}}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')  

<div class="row">
	
	<div class="col-md-12">
		<div class="card">
			<div class="card-body p-0 pt-2"> 
				<table id="table" class="table dataTable table-hover m-0" style="margin:0 !important">
					<thead>
						<tr>
							<th>ID</th>	
							<th>Почта</th> 
							<th>Дата</th>	  	 
							<th class="sorting_disabled"></th>
						</tr>
					</thead>
					<tbody>
						<?foreach($orders as $el){?>
							<tr>
								<td>{{$el->id}}</td>
								<td>{{$el->email}}</td>
								<td>{{$el->created_at}}</td>
								<td><a href="javascript:;" class="open-delete" data-id="{{$el->id}}" data-toggle="modal" data-target="#modal-delete">Удалить</a></td>
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
		<form method="POST" action="{{ route('orders_delete') }}" class="modal-content">
			@csrf
			<input type="hidden" name="id">
			<div class="modal-header">
				<h4 class="modal-title">Удалить заявку #<span></span></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Вы уверены в том что хотите удалить заявку #<b><i></i></b>?</p>
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
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script> 
<script src="{{ asset('adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script> 
<!-- Ekko Lightbox -->
<script src="{{asset('/adminlte/plugins/ekko-lightbox/ekko-lightbox.min.js')}}"></script>
<script>


$(function () {
	$(document).on('click', '[data-toggle="lightbox"]', function(event) {
		event.preventDefault();
		$(this).ekkoLightbox({
			alwaysShowClose: true
		});
	}); 

	$('#table').DataTable({
		"paging": true,
		"lengthChange": false,
		"searching": true,
		"ordering": true,
		order:  [[0, 'desc']],
		"info": false, 
		"autoWidth": false,
		"responsive": true,
				"language": {
						"sSearch": "Поиск:",
						"sZeroRecords": "Ничего не найдено"
				}
	});

	$(".open-delete").click(function(){
		$("#modal-delete .modal-title span").text($(this).attr('data-id'))
		$("#modal-delete [name='id']").val($(this).attr('data-id'))
		$("#modal-delete .modal-body p i").text($(this).attr('data-id'))
	});


	bsCustomFileInput.init();

})
</script>
@endsection 