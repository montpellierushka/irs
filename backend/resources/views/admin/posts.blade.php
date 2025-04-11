@extends('admin.layout')

@section('title', 'Блог')

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
							<th>Дата</th>  
							<th>#</th>  
							<th>Заголовок</th>
							<th>Категория</th> 
							<th class="sorting_disabled"></th>
							<th class="sorting_disabled"></th>
						</tr>
					</thead>
					<tbody>
						<?foreach($posts as $post){?>
							<tr>
								<td>{{gmdate("d/m/Y", $post->date)}}</td>  
								<td><?=$post->id?></td> 
								<td><?=$post->title?></td> 
								<td><?foreach($categories as $s){ if($s->id == $post->category_id){ echo $s->title; break; } }?></td>
								<td><a href="{{url(route('admin_posts').'/'.$post->id)}}">Подробнее</a></td>
								<td><a href="javascript:;" class="open-delete" data-id="<?=$post->id?>" data-toggle="modal" data-target="#modal-delete">Удалить</a></td>
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
		<form method="POST" action="{{ route('admin_posts_delete') }}" class="modal-content">
			@csrf
			<input type="hidden" name="id">
			<div class="modal-header">
				<h4 class="modal-title">Удалить #<span></span></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Вы уверены в том что хотите удалить пост #<b><i></i></b>?</p>
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
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script><script>/**
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
		$('#subjects-table').DataTable({
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
		$('body').on('click',".open-delete",function(){ 
			$("#modal-delete .modal-title span").text($(this).attr('data-id'))
			$("#modal-delete [name='id']").val($(this).attr('data-id'))
			$("#modal-delete .modal-body p i").text($(this).attr('data-id'))
		})
 
 
	});
</script>
@endsection