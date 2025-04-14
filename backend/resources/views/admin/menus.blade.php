@extends('admin.layout')

<?$menusArr = array(
	'main' => 'Главное'
);?>

@section('title', $menusArr[Route::current()->type].' меню')

@section('css') 
<!-- Ekko Lightbox -->
<link rel="stylesheet" href="{{ asset('adminlte/plugins/ekko-lightbox/ekko-lightbox.css')}}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content') 
 


<div class="row">
	<div class="col-md-8">
		<div class="card">
			<div class="card-body p-0 pt-2"> 
				<table id="table" class="table dataTable table-hover m-0" style="margin:0 !important">
					<thead>
						<tr>
							<th>Сортировка</th>
							<th>Текст</th>
							<th>Ссылка</th>	 	
							<th class="sorting_disabled"></th>
							<th class="sorting_disabled"></th>
						</tr>
					</thead>
					<tbody>
						<?foreach($menu as $el){?>
							<tr>
								<td><?=$el->sort?></td>
								<td><?=$el->text?></td>
								<td><?=$el->link?></td> 
								<td><a href="javascript:;" class="open-update" data-id="<?=$el->id?>" data-sort="<?=$el->sort?>" data-text="<?=$el->text?>" data-link="<?=$el->link?>" data-toggle="modal" data-target="#modal-update">Изменить</a></td>
								<td><a href="javascript:;" class="open-delete" data-id="<?=$el->id?>" data-text="<?=$el->text?>" data-link="<?=$el->link?>" data-toggle="modal" data-target="#modal-delete">Удалить</a></td>
							</tr> 
						<?}?>
					</tbody>
				</table>
			</div> 
		</div>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-new">Добавить новый пункт</button>
	</div>
	<div class="col-md-4">
		<div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-text-width"></i>
                    Справка
                </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            	<p>Основное меню сайта.</p>
            	<a href="{{asset('/storage/main_menu.png')}}" data-toggle="lightbox" data-title="Главное меню">
			        <img src="{{asset('/storage/main_menu.png')}}" class="w-100" alt="Главное меню">
		  		</a> 
            </div>
        </div>
    </div>
</div> 


 
<div class="modal fade" id="modal-update">
	<div class="modal-dialog">
		<form method="POST" action="{{ route('admin_menu_update') }}" class="modal-content">
			@csrf
			<input type="hidden" name="id" value="">
			<div class="modal-header">
				<h4 class="modal-title">Изменить <span></span></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">				
				<div class="form-group">
					<label>Текст</label>
					<input type="text" class="form-control" name="text" value="" placeholder="Текст*" required>
				</div>
				<div class="form-group">
					<label>Ссылка</label>
					<input type="text" class="form-control" name="link" value="" placeholder="Ссылка*" required>
				</div> 
				<div class="form-group">
					<label>Сортировка</label>
					<input type="number" class="form-control" name="sort" min="0" value="" placeholder="Сортировка*" required>
				</div> 
			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
				<button type="submit" class="btn btn-primary">Сохранить</button>
			</div>
		</form>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
 
<div class="modal fade" id="modal-new">
	<div class="modal-dialog">
		<form method="POST" action="{{ route('admin_menu_new') }}" class="modal-content">
			@csrf
			<input type="hidden" name="type" value="<?=Route::current()->type?>">
			<div class="modal-header">
				<h4 class="modal-title">Добавить пункт меню</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">				
				<div class="form-group">
					<label>Текст</label>
					<input type="text" class="form-control" name="text" value="" placeholder="Текст*" required>
				</div>
				<div class="form-group">
					<label>Ссылка</label>
					<input type="text" class="form-control" name="link" value="" placeholder="Ссылка*" required>
				</div> 
				<div class="form-group">
					<label>Сортировка</label>
					<input type="number" class="form-control" name="sort" min="0" value="" placeholder="Сортировка*" required>
				</div> 
			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
				<button type="submit" class="btn btn-primary">Добавить</button>
			</div>
		</form>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<div class="modal fade" id="modal-delete">
	<div class="modal-dialog">
		<form method="POST" action="{{ route('admin_menu_delete') }}" class="modal-content">
			@csrf
			<input type="hidden" name="id">
			<div class="modal-header">
				<h4 class="modal-title">Удалить пункт меню <span></span></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Вы уверены в том что хотите удалить пункт меню <b><i></i></b>?</p>
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
		"paging": false,
		"lengthChange": false,
		"searching": true,
		"ordering": true,
		"info": false,
		"autoWidth": false,
		"responsive": true,
				"language": {
						"sSearch": "Поиск:",
						"sZeroRecords": "Ничего не найдено"
				}
	});

	$(".open-delete").click(function(){
		$("#modal-delete .modal-title span").text($(this).attr('data-link'))
		$("#modal-delete [name='id']").val($(this).attr('data-id'))
		$("#modal-delete .modal-body p i").text($(this).attr('data-text'))
	});

	$(".open-update").click(function(){
		$("#modal-update .modal-title span").text($(this).attr('data-text'))
		$("#modal-update [name='id']").val($(this).attr('data-id'))
		$("#modal-update [name='sort']").val($(this).attr('data-sort')) 
		$("#modal-update [name='text']").val($(this).attr('data-text'))  
		$("#modal-update [name='link']").val($(this).attr('data-link')) 
	});

})
</script>
@endsection 