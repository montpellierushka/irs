@extends('admin.layout')

@section('title', 'Медиабиблиотека')

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
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">Загрузить файл</h3>
			</div>
			<!-- /.card-header -->
			<!-- form start -->
			<form method="POST" action="{{route('upload')}}" enctype="multipart/form-data">
				@csrf
				<div class="card-body"> 
					<div class="form-group">
						<label for="exampleInputFile">Файл @error('file') <code>{{ $message }}</code> @enderror</label>
						<div class="input-group">
							<div class="custom-file">
								<input type="file" name="file" class="custom-file-input @error('file') is-invalid @enderror" id="exampleInputFile" required>
								<label class="custom-file-label" for="exampleInputFile"></label>
							</div>
						</div>
					</div> 
				</div>
				<!-- /.card-body -->

				<div class="card-footer">
					<button type="submit" class="btn btn-primary">Загрузить</button>
				</div>
			</form>
		</div>
	</div>
	<div class="col-md-12">
		<div class="card">
			<div class="card-body p-0 pt-2"> 
				<table id="table" class="table dataTable table-hover m-0" style="margin:0 !important">
					<thead>
						<tr>
							<th>Дата</th>	
							<th>Предпросмотр</th> 
							<th>Название</th>	
							<th>Размер, КБт</th>	 
							<th>Ссылка</th>	 	 
							<th class="sorting_disabled"></th>
						</tr>
					</thead>
					<tbody>
						<?foreach($uploadContent as $el){
							$time = Storage::lastModified($el);
							$size = Storage::size($el);
							$el = str_replace('public/','',$el)?>
							<tr>
								<td>{{gmdate("d/m/Y", $time)}}</td>
								<td>
									<a href="{{asset('/storage/'.$el)}}" data-toggle="lightbox" data-title="<?=$el?>">
								        <img src="{{asset('/storage/'.$el)}}" style="height:150px;width:150px;object-fit:contain;" alt="" loading="lazy">
							  		</a> 									
								</td>
								<td>{{$el}}</td>
								<td>{{round($size/1024, 2)}}</td>
								<td>{{'/storage/'.$el}}</td>  
								<td><a href="javascript:;" class="open-delete" data-name="{{$el}}" data-toggle="modal" data-target="#modal-delete">Удалить</a></td>
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
		<form method="POST" action="{{ route('upload_delete') }}" class="modal-content">
			@csrf
			<input type="hidden" name="name">
			<div class="modal-header">
				<h4 class="modal-title">Удалить <span></span></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Вы уверены в том что хотите удалить <b><i></i></b>?</p>
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
<script>/**
 * Similar to the Date (dd/mm/YY) data sorting plug-in, this plug-in offers 
 * additional  flexibility with support for spaces between the values and
 * either . or / notation for the separators.
 *
 * Please note that this plug-in is **deprecated*. The
 * [datetime](//datatables.net/blog/2014-12-18) plug-in provides enhanced
 * functionality and flexibility.
 *
 *  @name Date (dd . mm[ . YYYY]) 
 *  @summary Sort dates in the format `dd/mm/YY[YY]` (with optional spaces)
 *  @author [Robert Sedovšek](http://galjot.si/)
 *  @deprecated
 *
 *  @example
 *    $('#example').dataTable( {
 *       columnDefs: [
 *         { type: 'date-eu', targets: 0 }
 *       ]
 *    } );
 */

jQuery.extend( jQuery.fn.dataTableExt.oSort, {
	"date-eu-pre": function ( date ) {
		date = date.replace(" ", "");

		if ( ! date ) {
			return 0;
		}

		var year;
		var eu_date = date.split(/[\.\-\/]/);

		/*year (optional)*/
		if ( eu_date[2] ) {
			year = eu_date[2];
		}
		else {
			year = 0;
		}

		/*month*/
		var month = eu_date[1];
		if ( month.length == 1 ) {
			month = 0+month;
		}

		/*day*/
		var day = eu_date[0];
		if ( day.length == 1 ) {
			day = 0+day;
		}

		return (year + month + day) * 1;
	},

	"date-eu-asc": function ( a, b ) {
		return ((a < b) ? -1 : ((a > b) ? 1 : 0));
	},

	"date-eu-desc": function ( a, b ) {
		return ((a < b) ? 1 : ((a > b) ? -1 : 0));
	}
} );


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
		columnDefs: [
          { type: 'date-eu', targets: 0 }
        ],
		"autoWidth": false,
		"responsive": true,
				"language": {
						"sSearch": "Поиск:",
						"sZeroRecords": "Ничего не найдено"
				}
	});

	$(".open-delete").click(function(){
		$("#modal-delete .modal-title span").text($(this).attr('data-name'))
		$("#modal-delete [name='name']").val($(this).attr('data-name'))
		$("#modal-delete .modal-body p i").text($(this).attr('data-name'))
	});


	bsCustomFileInput.init();

})
</script>
@endsection 