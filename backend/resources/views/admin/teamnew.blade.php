@extends('admin.layout')

@section('title', "Новый сотрудник")

@section('css')   
@endsection


@section('content')	 
<div class="row">
	<div class="col-md-12">
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title"></h3>
			</div> 
			<form method="POST" class="new-theme-form" action="{{ route('admin_team_new') }}">
                @csrf 
				<div class="card-body"> 					     
					<div class="form-group">
						<label>Имя @error('name') <code>{{ $message }}</code> @enderror</label>
						<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="" required>
					</div>  
					<div class="form-group">
						<label>Должность @error('role') <code>{{ $message }}</code> @enderror</label>
						<input type="text" class="form-control @error('role') is-invalid @enderror" name="role" value="{{ old('role') }}" placeholder="" required>
					</div>  
					<div class="form-group">
						<label>Сортировка @error('sort') <code>{{ $message }}</code> @enderror</label>
						<input type="number" min="0" class="form-control @error('sort') is-invalid @enderror" name="sort" value="{{ old('sort') }}" placeholder="" required>
					</div>  					   
					<div class="container-fluid">
						<div class="row">
							<div class="form-group col-8">
								<label>Фото (ссылка из медиабиблиотеки) @error('ava') <code>{{ $message }}</code> @enderror</label>
								<input type="text" class="form-control @error('ava') is-invalid @enderror img-preview-input" name="ava" value="{{ old('ava') }}" placeholder="Ссылка на картинку">
							</div>
							<div class="col-4 img-preview"></div>
						</div>
					</div>
					<div class="form-group">
						<label>Главные умы компании на данный момент @error('brains') <code>{{ $message }}</code> @enderror</label>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-check">
	                        		<input class="form-check-input" type="radio" id="radio1" name="brains" value="0" <?if(old('brains')=='0' || !old('brains')){ echo 'checked'; }?>>
	                          		<label class="form-check-label" for="radio1">Нет</label>
		                        </div>
							</div>
							<div class="col-sm-6">
								<div class="form-check">
	                        		<input class="form-check-input" type="radio" id="radio2" name="brains" value="1" <?if(old('brains')=='1'){ echo 'checked'; }?>>
	                          		<label class="form-check-label" for="radio2">Да</label>
		                        </div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Ведущие специалисты @error('leads') <code>{{ $message }}</code> @enderror</label>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-check">
	                        		<input class="form-check-input" type="radio" id="radio3" name="leads" value="0" <?if(old('leads')=='0' || !old('leads')){ echo 'checked'; }?>>
	                          		<label class="form-check-label" for="radio3">Нет</label>
		                        </div>
							</div>
							<div class="col-sm-6">
								<div class="form-check">
	                        		<input class="form-check-input" type="radio" id="radio4" name="leads" value="1" <?if(old('leads')=='1'){ echo 'checked'; }?>>
	                          		<label class="form-check-label" for="radio4">Да</label>
		                        </div>
							</div>
						</div>
					</div>   
						
				</div> 
				<div class="card-footer">
					<button type="submit" class="btn btn-primary">Сохранить</button>
				</div>
			</form>
		</div>
	</div>
</div>

 
@endsection

@section('scripts')   
<script>
    $(document).ready(function(){  

    	$('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });
    	
		$(".img-preview-input").change(function(){
			$(this).parent().parent().find('.img-preview').attr('style','background: url('+$(this).val()+') no-repeat center / contain;');
		})
		$(".img-preview-input").on('input', function(){
			$(this).parent().parent().find('.img-preview').attr('style','background: url('+$(this).val()+') no-repeat center / contain;');
		})
		$('.img-preview-input').trigger('change')

    });
</script>
@endsection