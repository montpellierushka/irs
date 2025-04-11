@extends('admin.layout')

@section('title', 'Главная')

@section('css') 
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<!-- Ekko Lightbox -->
<link rel="stylesheet" href="{{asset('/adminlte/plugins/ekko-lightbox/ekko-lightbox.css')}}">
@endsection

@section('content') 

<div class="row">
    <div class="col-12">
        <!-- Custom Tabs -->
        <div class="card">
            <div class="card-header d-flex p-0">
                <h3 class="card-title p-3">Слайды</h3>
                <ul class="nav nav-pills ml-auto p-2">
                    <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">1. Главная</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">2. Услуги</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">3. Наши работы</a></li> 
                    <li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">4. О компании</a></li> 
                    <li class="nav-item"><a class="nav-link" href="#tab_5" data-toggle="tab">5. Интересное</a></li> 
                    <li class="nav-item"><a class="nav-link" href="#tab_6" data-toggle="tab">6. Контакты</a></li> 
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="row">
							<div class="col-md-8">
								<div class="card card-primary">
									<div class="card-header">
										<h3 class="card-title">Слайд 1</h3>
									</div> 
									<form method="POST" action="{{route('admin_slide1')}}">
						                @csrf
										<div class="card-body">
											<div class="form-group">
												<label>Фраза сверху</label>
												<input type="text" class="form-control" name="TOP" value="{{ $slide1['SLIDE1_TOP'] }}" placeholder="Фраза сверху">
											</div>
											<div class="form-group">
												<label>Заголовок</label>
												<input type="text" class="form-control" name="TITLE" value="{{ $slide1['SLIDE1_TITLE'] }}" placeholder="Заголовок">
											</div>  
											<div class="form-group">
												<label>Текст</label>
												<input type="text" class="form-control" name="TEXT" value="{{ $slide1['SLIDE1_TEXT'] }}" placeholder="Текст">
											</div>  
											<div class="form-group">
												<label>Ссылка на видео</label>
												<input type="text" class="form-control" name="VIDEO" value="{{ $slide1['SLIDE1_VIDEO'] }}" placeholder="Ссылка на видео" required>
											</div>  
											<div class="form-group">
												<label>Заголовок видео</label>
												<input type="text" class="form-control" name="VIDEO_TITLE" value="{{ $slide1['SLIDE1_VIDEO_TITLE'] }}" placeholder="Заголовок видео">
											</div>    	
										</div> 
										<div class="card-footer">
											<button type="submit" class="btn btn-primary">Сохранить</button>
										</div>
									</form>
								</div>
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
						            	<a href="{{asset('/storage/slide1.png')}}" data-toggle="lightbox" data-title="Слайд 1">
									        <img src="{{asset('/storage/slide1_mini.png')}}" class="w-100" alt="Слайд 1">
								  		</a>
						            </div>
						        </div>
						    </div>
						</div> 
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                        <div class="row">
							<div class="col-md-8">
								<div class="card card-primary">
									<div class="card-header">
										<h3 class="card-title">Слайд 2</h3>
									</div> 
									<form method="POST" action="{{route('admin_slide2')}}">
						                @csrf
										<div class="card-body">
											<div class="form-group">
												<label>Маленький заголовок</label>
												<input type="text" class="form-control" name="SUBTITLE" value="{{ $slide2['SLIDE2_SUBTITLE'] }}" placeholder="Маленький заголовок">
											</div>  
											<div class="form-group">
												<label>Заголовок</label>
												<input type="text" class="form-control" name="TITLE" value="{{ $slide2['SLIDE2_TITLE'] }}" placeholder="Заголовок">
											</div>  
											<div class="form-group">
												<label>Текст ссылки</label>
												<input type="text" class="form-control" name="LINK" value="{{ $slide2['SLIDE2_LINK'] }}" placeholder="Текст ссылки">
											</div>  
											<div class="form-group">
												<label>Ссылка</label>
												<input type="text" class="form-control" name="HREF" value="{{ $slide2['SLIDE2_HREF'] }}" placeholder="Ссылка">
											</div>  
											<div class="form-group">
												<label>Текст</label>
												<input type="text" class="form-control" name="TEXT" value="{{ $slide2['SLIDE2_TEXT'] }}" placeholder="Текст">
											</div>     	
										</div> 
										<div class="card-footer">
											<button type="submit" class="btn btn-primary">Сохранить</button>
										</div>
									</form>
								</div>
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
						            	<a href="{{asset('/storage/slide2.png')}}" data-toggle="lightbox" data-title="Слайд 2">
									        <img src="{{asset('/storage/slide2_mini.png')}}" class="w-100" alt="Слайд 2">
								  		</a>
						            </div>
						        </div>
						    </div>


						    <div class="card-body p-0 pt-2"> 
								<table class="table dataTable table-hover m-0" style="margin:0 !important">
									<thead>
										<tr>
											<th>Сортировка</th>
											<th>Название</th>
											<th>Цена</th> 
											<th class="sorting_disabled"></th>
											<th class="sorting_disabled"></th>
										</tr>
									</thead>
									<tbody>
										<?foreach($slide2_items as $item){?>
											<tr>
												<td><?=$item->sort?></td>  	
												<td><?=$item->value1?></td>  	
												<td><?=$item->value3?></td>  	 
												<td><a href="javascript:;" class="open-update-slide2" data-id="<?=$item->id?>" data-sort="<?=$item->sort?>" data-value1="{{$item->value1}}" data-value2="<?=$item->value2?>" data-value3="{{$item->value3}}" data-value4="{{$item->value4}}" data-toggle="modal" data-target="#modal-update-slide2">Изменить<div style="display: none;"><?=$item->value5?></div></a></td>
												<td><a href="javascript:;" class="open-delete-slide2" data-id="<?=$item->id?>" data-name="{{$item->value1}}" data-toggle="modal" data-target="#modal-delete-slide2">Удалить</a></td>
											</tr> 
										<?}?>
									</tbody>
								</table>
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-new-slide2">Добавить</button>
							</div>
						</div> 
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_3">
                        <div class="row">
							<div class="col-md-8">
								<div class="card card-primary">
									<div class="card-header">
										<h3 class="card-title">Слайд 3</h3>
									</div> 
									<form method="POST" action="{{route('admin_slide3')}}">
						                @csrf
										<div class="card-body">
											<div class="form-group">
												<label>Маленький заголовок</label>
												<input type="text" class="form-control" name="SUBTITLE" value="{{ $slide3['SLIDE3_SUBTITLE'] }}" placeholder="Маленький заголовок">
											</div>  
											<div class="form-group">
												<label>Заголовок</label>
												<input type="text" class="form-control" name="TITLE" value="{{ $slide3['SLIDE3_TITLE'] }}" placeholder="Заголовок">
											</div>  
											<div class="form-group">
												<label>Текст ссылки</label>
												<input type="text" class="form-control" name="LINK" value="{{ $slide3['SLIDE3_LINK'] }}" placeholder="Текст ссылки">
											</div>  
											<div class="form-group">
												<label>Ссылка</label>
												<input type="text" class="form-control" name="HREF" value="{{ $slide3['SLIDE3_HREF'] }}" placeholder="Ссылка">
											</div>  
											<div class="form-group">
												<label>Текст</label>
												<input type="text" class="form-control" name="TEXT" value="{{ $slide3['SLIDE3_TEXT'] }}" placeholder="Текст">
											</div>     	
										</div> 
										<div class="card-footer">
											<button type="submit" class="btn btn-primary">Сохранить</button>
										</div>
									</form>
								</div>
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
						            	<a href="{{asset('/storage/slide3.png')}}" data-toggle="lightbox" data-title="Слайд 3">
									        <img src="{{asset('/storage/slide3_mini.png')}}" class="w-100" alt="Слайд 3">
								  		</a>
						            </div>
						        </div>
						    </div>


						    <div class="card-body p-0 pt-2"> 
								<table class="table dataTable table-hover m-0" style="margin:0 !important">
									<thead>
										<tr>
											<th>Сортировка</th>
											<th>Тип</th> 
											<th>Название</th>
											<th class="sorting_disabled"></th>
											<th class="sorting_disabled"></th>
										</tr>
									</thead>
									<tbody>
										<?foreach($slide3_items as $item){?>
											<tr>
												<td><?=$item->sort?></td>  	
												<td><?=$item->value1?></td>  	
												<td><?=$item->value2?></td>  	 
												<td><a href="javascript:;" class="open-update-slide3" data-id="<?=$item->id?>" data-sort="<?=$item->sort?>" data-value1="{{$item->value1}}" data-value2="{{$item->value2}}" data-value3="{{$item->value3}}" data-value4="{{$item->value4}}" data-value6="{{$item->value6}}" data-value7="{{$item->value7}}" data-toggle="modal" data-target="#modal-update-slide3">Изменить<div style="display: none;"><?=$item->value5?></div></a></td>
												<td><a href="javascript:;" class="open-delete-slide3" data-id="<?=$item->id?>" data-name="{{$item->value2}}" data-toggle="modal" data-target="#modal-delete-slide3">Удалить</a></td>
											</tr> 
										<?}?>
									</tbody>
								</table>
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-new-slide3">Добавить</button>
							</div>
						</div> 
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_4">
                        <div class="row">
                        	<div class="col-md-8">
								<div class="card card-primary">
									<div class="card-header">
										<h3 class="card-title">Слайд 4</h3>
									</div> 
									<form method="POST" action="{{route('admin_slide4')}}">
						                @csrf
										<div class="card-body">
											<div class="form-group">
												<label>Маленький заголовок</label>
												<input type="text" class="form-control" name="SUBTITLE" value="{{ $slide4['value1'] }}" placeholder="Маленький заголовок">
											</div>  
											<div class="form-group">
												<label>Заголовок</label>
												<input type="text" class="form-control" name="TITLE" value="{{ $slide4['value2'] }}" placeholder="Заголовок">
											</div>  
											<div class="form-group">
												<label>Текст ссылки</label>
												<input type="text" class="form-control" name="LINK" value="{{ $slide4['value3'] }}" placeholder="Текст ссылки">
											</div>  
											<div class="form-group">
												<label>Ссылка</label>
												<input type="text" class="form-control" name="HREF" value="{{ $slide4['value4'] }}" placeholder="Ссылка">
											</div>  
											<div class="form-group">
												<label>Текст</label>
												<input type="text" class="form-control" name="TEXT" value="{{ $slide4['value5'] }}" placeholder="Текст">
											</div>     	
										</div> 
										<div class="card-footer">
											<button type="submit" class="btn btn-primary">Сохранить</button>
										</div>
									</form>
								</div>
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
						            	<a href="{{asset('/storage/slide4.png')}}" data-toggle="lightbox" data-title="Слайд 4">
									        <img src="{{asset('/storage/slide4_mini.png')}}" class="w-100" alt="Слайд 4">
								  		</a>
						            </div>
						        </div>
						    </div>


						    <div class="card-body p-0 pt-2"> 
								<table class="table dataTable table-hover m-0" style="margin:0 !important">
									<thead>
										<tr>
											<th>Сортировка</th>
											<th>Заголовок</th> 
											<th>Текст</th>
											<th class="sorting_disabled"></th>
											<th class="sorting_disabled"></th>
										</tr>
									</thead>
									<tbody>
										<?foreach($slide4_items as $item){?>
											<tr>
												<td><?=$item->sort?></td>  	
												<td><?=$item->value1?></td>  	
												<td><?=$item->value2?></td>  	 
												<td><a href="javascript:;" class="open-update-slide4" data-id="<?=$item->id?>" data-sort="<?=$item->sort?>" data-value1="{{$item->value1}}" data-value2="{{$item->value2}}" data-toggle="modal" data-target="#modal-update-slide4">Изменить</a></td>
												<td><a href="javascript:;" class="open-delete-slide4" data-id="<?=$item->id?>" data-name="{{$item->value1}}" data-toggle="modal" data-target="#modal-delete-slide4">Удалить</a></td>
											</tr> 
										<?}?>
									</tbody>
								</table>
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-new-slide4">Добавить</button>
							</div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_5">
                        <div class="row">
                        	<div class="col-md-8">
								<div class="card card-primary">
									<div class="card-header">
										<h3 class="card-title">Слайд 5</h3>
									</div> 
									<form method="POST" action="{{route('admin_slide5')}}">
						                @csrf
										<div class="card-body">
											<div class="form-group">
												<label>Маленький заголовок</label>
												<input type="text" class="form-control" name="SUBTITLE" value="{{ $slide5['value1'] }}" placeholder="Маленький заголовок">
											</div>  
											<div class="form-group">
												<label>Заголовок</label>
												<input type="text" class="form-control" name="TITLE" value="{{ $slide5['value2'] }}" placeholder="Заголовок">
											</div>  
											<div class="form-group">
												<label>Текст ссылки</label>
												<input type="text" class="form-control" name="LINK" value="{{ $slide5['value3'] }}" placeholder="Текст ссылки">
											</div>  
											<div class="form-group">
												<label>Ссылка</label>
												<input type="text" class="form-control" name="HREF" value="{{ $slide5['value4'] }}" placeholder="Ссылка">
											</div>  
											<div class="form-group">
												<label>Количество <a href="{{route('admin_blog')}}" target="_blank">новостей</a> на слайде</label>
												<input type="number" min="1" class="form-control" name="COUNT" value="{{ $slide5['value6'] }}" placeholder="Новостей" required>
											</div>     	
										</div> 
										<div class="card-footer">
											<button type="submit" class="btn btn-primary">Сохранить</button>
										</div>
									</form>
								</div>
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
						            	<a href="{{asset('/storage/slide5.png')}}" data-toggle="lightbox" data-title="Слайд 5">
									        <img src="{{asset('/storage/slide5_mini.png')}}" class="w-100" alt="Слайд 5">
								  		</a>
						            </div>
						        </div>
						    </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_6">
                        <div class="row">
                        	<div class="col-md-8">
								<div class="card card-primary">
									<div class="card-header">
										<h3 class="card-title">Слайд 6</h3>
									</div> 
									<form method="POST" action="{{route('admin_slide6')}}">
						                @csrf
										<div class="card-body">
											<div class="form-group">
												<label>Маленький заголовок</label>
												<input type="text" class="form-control" name="subtitle" value="{{ $slide6['value1'] }}" placeholder="Маленький заголовок">
											</div>  
											<div class="form-group">
												<label>Заголовок</label>
												<input type="text" class="form-control" name="title" value="{{ $slide6['value2'] }}" placeholder="Заголовок">
											</div> 
											<div class="form-group">
												<label>Ссылка на фрейм карт</label>
												<input type="text" class="form-control" name="frame" value="{{ $slide6['value3'] }}" placeholder="Фрейм">
											</div>  
											<div class="form-group">
												<label>Заголовок над адресом</label>
												<input type="text" class="form-control" name="clock_title" value="{{ $slide6_content['value1'] }}" placeholder="Заголовок над адресом">
											</div>   
											<div class="form-group">
												<label>Адрес</label>
												<input type="text" class="form-control" name="adress" value="{{ $slide6_content['value2'] }}" placeholder="Адрес">
											</div> 
											<div class="form-group">
												<label>Часы работы</label>
												<input type="text" class="form-control" name="clock" value="{{ $slide6_content['value3'] }}" placeholder="Часы работы">
											</div> 
											<div class="form-group">
												<label>Время для звонка</label>
												<input type="text" class="form-control" name="call" value="{{ $slide6_content['value4'] }}" placeholder="Время для звонка">
											</div> 
											<div class="form-group">
												<label>Текст</label>
												<input type="text" class="form-control" name="description" value="{{ $slide6_content['value5'] }}" placeholder="Текст">
											</div>
											<div class="form-group">
												<label>instagram</label>
												<input type="text" class="form-control" name="instagram" value="{{ $social['value1'] }}" placeholder="instagram">
											</div>
											<div class="form-group">
												<label>facebook</label>
												<input type="text" class="form-control" name="facebook" value="{{ $social['value2'] }}" placeholder="facebook">
											</div>
											<div class="form-group">
												<label>VK</label>
												<input type="text" class="form-control" name="vk" value="{{ $social['value3'] }}" placeholder="VK">
											</div>      	
										</div> 
										<div class="card-footer">
											<button type="submit" class="btn btn-primary">Сохранить</button>
										</div>
									</form>
								</div>
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
						            	<a href="{{asset('/storage/slide6.png')}}" data-toggle="lightbox" data-title="Слайд 6">
									        <img src="{{asset('/storage/slide6_mini.png')}}" class="w-100" alt="Слайд 6">
								  		</a>
						            </div>
						        </div>
						    </div>

						    <div class="card-body p-0 pt-2"> 
								<table class="table dataTable table-hover m-0" style="margin:0 !important">
									<thead>
										<tr>
											<th>Сортировка</th>
											<th>Телефон</th>  
											<th class="sorting_disabled"></th>
											<th class="sorting_disabled"></th>
										</tr>
									</thead>
									<tbody>
										<?foreach($slide6_phones as $item){?>
											<tr>
												<td><?=$item->sort?></td>  	
												<td><?=$item->value1?></td>  	  
												<td><a href="javascript:;" class="open-update-slide6" data-id="<?=$item->id?>" data-sort="<?=$item->sort?>" data-value1="{{$item->value1}}" data-value2="{{$item->value2}}" data-toggle="modal" data-target="#modal-update-slide6">Изменить</a></td>
												<td><a href="javascript:;" class="open-delete-slide6" data-id="<?=$item->id?>" data-name="{{$item->value1}}" data-toggle="modal" data-target="#modal-delete-slide6">Удалить</a></td>
											</tr> 
										<?}?>
									</tbody>
								</table>
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-new-slide6">Добавить</button>
							</div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- ./card -->
    </div> 
</div>
<!-- /.row -->


<div class="modal fade" id="modal-new-slide2">
	<div class="modal-dialog">
		<form method="POST" action="{{ route('admin_slide2_new') }}" class="modal-content">
			@csrf 
			<div class="modal-header">
				<h4 class="modal-title">Добавить <span></span></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">				
				<div class="form-group">
					<label>Сортировка</label>
					<input type="number" min="0" class="form-control" name="sort" value="1" placeholder="Сортировка" required>
				</div>			
				<div class="form-group">
					<label>Название</label>
					<input type="text" class="form-control" name="value1" value="" placeholder="Название">
				</div>			
				<div class="form-group">
					<label>Описание</label>
					<input type="text" class="form-control" name="value2" value="" placeholder="Описание">
				</div>			
				<div class="form-group">
					<label>Цена</label>
					<input type="text" class="form-control" name="value3" value="" placeholder="Цена">
				</div>			
				<div class="form-group">
					<label>Ссылка</label>
					<input type="text" class="form-control" name="value4" value="" placeholder="Ссылка">
				</div>			
				<div class="form-group form-group--value5">
					<label>Преимущества</label>
					<input type="hidden" name="value5" value="">
					<div class="container-fluid">  
					</div>
					<button type="button" class="btn btn-primary">Добавить</button>
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
<div class="modal fade" id="modal-update-slide2">
	<div class="modal-dialog">
		<form method="POST" action="{{ route('admin_slide2_update') }}" class="modal-content">
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
					<label>Сортировка</label>
					<input type="number" min="0" class="form-control" name="sort" value="" placeholder="Сортировка" required>
				</div>			
				<div class="form-group">
					<label>Название</label>
					<input type="text" class="form-control" name="value1" value="" placeholder="Название">
				</div>			
				<div class="form-group">
					<label>Описание</label>
					<input type="text" class="form-control" name="value2" value="" placeholder="Описание">
				</div>			
				<div class="form-group">
					<label>Цена</label>
					<input type="text" class="form-control" name="value3" value="" placeholder="Цена">
				</div>			
				<div class="form-group">
					<label>Ссылка</label>
					<input type="text" class="form-control" name="value4" value="" placeholder="Ссылка">
				</div>			
				<div class="form-group form-group--value5">
					<label>Преимущества</label>
					<input type="hidden" name="value5" value="">
					<div class="container-fluid"></div>
					<button type="button" class="btn btn-primary">Добавить</button>
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
<div class="modal fade" id="modal-delete-slide2">
	<div class="modal-dialog">
		<form method="POST" action="{{ route('admin_slide2_delete') }}" class="modal-content">
			@csrf
			<input type="hidden" name="id">
			<div class="modal-header">
				<h4 class="modal-title">Удалить <span></span></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Вы уверены в том что хотите удалить элемент <b><i></i></b>?</p>
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



<div class="modal fade" id="modal-new-slide3">
	<div class="modal-dialog">
		<form method="POST" action="{{ route('admin_slide3_new') }}" class="modal-content">
			@csrf
			<input type="hidden" name="id" value="">
			<div class="modal-header">
				<h4 class="modal-title">Добавить <span></span></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">				
				<div class="form-group">
					<label>Сортировка</label>
					<input type="number" min="0" class="form-control" name="sort" value="" placeholder="Сортировка" required>
				</div>			
				<div class="form-group">
					<label>Тип</label>
					<select class="form-control" name="value1">
                    	<option value="Лендинги">Лендинги</option>
                    	<option value="Интернет-магазины">Интернет-магазины</option>
                    	<option value="Приложения и сервисы">Приложения и сервисы</option>
                    	<option value="Сайты">Сайты</option>
                    	<option value="Реклама и SMM">Реклама и SMM</option>
                    	<option value="Продвижение">Продвижение</option>
                    </select> 
				</div>			
				<div class="form-group">
					<label>Название</label>
					<input type="text" class="form-control" name="value2" value="" placeholder="Название">
				</div>			
				<div class="form-group">
					<label>Ссылка</label>
					<input type="text" class="form-control" name="value3" value="" placeholder="Ссылка">
				</div>		 			
				<div class="form-group form-group--value5">
					<label>Тэги</label>
					<input type="hidden" name="value5" value="">
					<div class="container-fluid"></div>
					<button type="button" class="btn btn-primary">Добавить</button>
				</div>
				<p>Ссылку на картинки брать в <a href="{{route('upload')}}" target="_blank">медиабиблиотеке</a></p>		
				<div class="container-fluid">
					<div class="row">
						<div class="form-group col-8">
							<label>Картинка на заднем фоне элемента</label>
							<input type="text" class="form-control img-preview-input" name="value4" value="" placeholder="Ссылка на картинку">
						</div>
						<div class="col-4 img-preview"></div>
					</div>
				</div>
				<div class="container-fluid">
					<div class="row">
						<div class="form-group col-8">
							<label>Картинка на переднем фоне элемента</label>
							<input type="text" class="form-control img-preview-input" name="value6" value="" placeholder="Ссылка на картинку">
						</div>
						<div class="col-4 img-preview"></div>
					</div>
				</div>
				<div class="container-fluid">
					<div class="row">
						<div class="form-group col-8">
							<label>Картинка на заднем фоне при наведении на элемент</label>
							<input type="text" class="form-control img-preview-input" name="value7" value="" placeholder="Ссылка на картинку">
						</div>
						<div class="col-4 img-preview"></div>
					</div>
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
<div class="modal fade" id="modal-update-slide3">
	<div class="modal-dialog">
		<form method="POST" action="{{ route('admin_slide3_update') }}" class="modal-content">
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
					<label>Сортировка</label>
					<input type="number" min="0" class="form-control" name="sort" value="" placeholder="Сортировка" required>
				</div>			
				<div class="form-group">
					<label>Тип</label>
					<select class="form-control" name="value1">
                    	<option value="Лендинги">Лендинги</option>
                    	<option value="Интернет-магазины">Интернет-магазины</option>
                    	<option value="Приложения и сервисы">Приложения и сервисы</option>
                    	<option value="Сайты">Сайты</option>
                    	<option value="Реклама и SMM">Реклама и SMM</option>
                    	<option value="Продвижение">Продвижение</option>
                    </select> 
				</div>			
				<div class="form-group">
					<label>Название</label>
					<input type="text" class="form-control" name="value2" value="" placeholder="Название">
				</div>			
				<div class="form-group">
					<label>Ссылка</label>
					<input type="text" class="form-control" name="value3" value="" placeholder="Ссылка">
				</div>		 			
				<div class="form-group form-group--value5">
					<label>Тэги</label>
					<input type="hidden" name="value5" value="">
					<div class="container-fluid"></div>
					<button type="button" class="btn btn-primary">Добавить</button>
				</div>
				<p>Ссылку на картинки брать в <a href="{{route('upload')}}" target="_blank">медиабиблиотеке</a></p>		
				<div class="container-fluid">
					<div class="row">
						<div class="form-group col-8">
							<label>Картинка на заднем фоне элемента</label>
							<input type="text" class="form-control img-preview-input" name="value4" value="" placeholder="Ссылка на картинку">
						</div>
						<div class="col-4 img-preview"></div>
					</div>
				</div>
				<div class="container-fluid">
					<div class="row">
						<div class="form-group col-8">
							<label>Картинка на переднем фоне элемента</label>
							<input type="text" class="form-control img-preview-input" name="value6" value="" placeholder="Ссылка на картинку">
						</div>
						<div class="col-4 img-preview"></div>
					</div>
				</div>
				<div class="container-fluid">
					<div class="row">
						<div class="form-group col-8">
							<label>Картинка на заднем фоне при наведении на элемент</label>
							<input type="text" class="form-control img-preview-input" name="value7" value="" placeholder="Ссылка на картинку">
						</div>
						<div class="col-4 img-preview"></div>
					</div>
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
<div class="modal fade" id="modal-delete-slide3">
	<div class="modal-dialog">
		<form method="POST" action="{{ route('admin_slide3_delete') }}" class="modal-content">
			@csrf
			<input type="hidden" name="id">
			<div class="modal-header">
				<h4 class="modal-title">Удалить <span></span></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Вы уверены в том что хотите удалить элемент <b><i></i></b>?</p>
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


<div class="modal fade" id="modal-new-slide4">
	<div class="modal-dialog">
		<form method="POST" action="{{ route('admin_slide4_new') }}" class="modal-content">
			@csrf
			<div class="modal-header">
				<h4 class="modal-title">Добавить <span></span></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">				
				<div class="form-group">
					<label>Сортировка</label>
					<input type="number" min="0" class="form-control" name="sort" value="0" placeholder="Сортировка" required>
				</div>		
				<div class="form-group">
					<label>Заголовок</label>
					<input type="text" class="form-control" name="value1" value="" placeholder="Заголовок">
				</div>		
				<div class="form-group">
					<label>Текст</label>
					<input type="text" class="form-control" name="value2" value="" placeholder="Текст">
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
<div class="modal fade" id="modal-update-slide4">
	<div class="modal-dialog">
		<form method="POST" action="{{ route('admin_slide4_update') }}" class="modal-content">
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
					<label>Сортировка</label>
					<input type="number" min="0" class="form-control" name="sort" value="" placeholder="Сортировка" required>
				</div>		
				<div class="form-group">
					<label>Заголовок</label>
					<input type="text" class="form-control" name="value1" value="" placeholder="Заголовок">
				</div>		
				<div class="form-group">
					<label>Текст</label>
					<input type="text" class="form-control" name="value2" value="" placeholder="Текст">
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
<div class="modal fade" id="modal-delete-slide4">
	<div class="modal-dialog">
		<form method="POST" action="{{ route('admin_slide4_delete') }}" class="modal-content">
			@csrf
			<input type="hidden" name="id">
			<div class="modal-header">
				<h4 class="modal-title">Удалить <span></span></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Вы уверены в том что хотите удалить элемент <b><i></i></b>?</p>
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


<div class="modal fade" id="modal-new-slide6">
	<div class="modal-dialog">
		<form method="POST" action="{{ route('admin_slide6_new') }}" class="modal-content">
			@csrf 
			<div class="modal-header">
				<h4 class="modal-title">Добавить телефон <span></span></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">				
				<div class="form-group">
					<label>Сортировка</label>
					<input type="number" min="0" class="form-control" name="sort" value="1" placeholder="Сортировка" required>
				</div>		
				<div class="form-group">
					<label>Телефон</label>
					<input type="text" class="form-control" name="value1" value="" placeholder="Телефон">
				</div>		
				<div class="form-group">
					<label>Ссылка</label>
					<input type="text" class="form-control" name="value2" value="" placeholder="Ссылка">
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
<div class="modal fade" id="modal-update-slide6">
	<div class="modal-dialog">
		<form method="POST" action="{{ route('admin_slide6_update') }}" class="modal-content">
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
					<label>Сортировка</label>
					<input type="number" min="0" class="form-control" name="sort" value="" placeholder="Сортировка" required>
				</div>		
				<div class="form-group">
					<label>Телефон</label>
					<input type="text" class="form-control" name="value1" value="" placeholder="Телефон">
				</div>		
				<div class="form-group">
					<label>Ссылка</label>
					<input type="text" class="form-control" name="value2" value="" placeholder="Ссылка">
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
<div class="modal fade" id="modal-delete-slide6">
	<div class="modal-dialog">
		<form method="POST" action="{{ route('admin_slide6_delete') }}" class="modal-content">
			@csrf
			<input type="hidden" name="id">
			<div class="modal-header">
				<h4 class="modal-title">Удалить <span></span></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Вы уверены в том что хотите удалить элемент <b><i></i></b>?</p>
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
	$('.table').DataTable({
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



	$(".open-delete-slide2").click(function(){
		$("#modal-delete-slide2 .modal-title span").text($(this).attr('data-name'))
		$("#modal-delete-slide2 [name='id']").val($(this).attr('data-id'))
		$("#modal-delete-slide2 .modal-body p i").text($(this).attr('data-name'))
	})

	$(".open-update-slide2").click(function(){
		$("#modal-update-slide2 .form-group--value5 .container-fluid").empty()
		if($(this).find('div').html()){
			let preim = JSON.parse($(this).find('div').html())
			for(let i = 0; i < preim.length; i++){ 
				$("#modal-update-slide2 .form-group--value5 .container-fluid").append(`
					<div class="row"> 
						<input type="text" class="form-control col-10" value="">
						<div class="col-2 text-center" title="Удалить" style="cursor: pointer;">×</div>
					</div> 
				`);
				$("#modal-update-slide2 .form-group--value5 .container-fluid .row:nth-child("+(+i+1)+") input").val(preim[i])
			}
		}
		$("#modal-update-slide2 .modal-title span").text($(this).attr('data-value1'))
		$("#modal-update-slide2 [name='id']").val($(this).attr('data-id'))
		$("#modal-update-slide2 [name='sort']").val($(this).attr('data-sort'))
		$("#modal-update-slide2 [name='value1']").val($(this).attr('data-value1'))
		$("#modal-update-slide2 [name='value2']").val($(this).attr('data-value2'))
		$("#modal-update-slide2 [name='value3']").val($(this).attr('data-value3'))
		$("#modal-update-slide2 [name='value4']").val($(this).attr('data-value4'))
	})

	$(".form-group--value5 .btn").click(function(){
		$(this).parent().find(".container-fluid").append(`
			<div class="row"> 
				<input type="text" class="form-control col-10" value="">
				<div class="col-2 text-center" title="Удалить" style="cursor: pointer;">×</div>
			</div> 
		`)
	})

	$('body').on('click',".form-group--value5 .col-2",function(){
		$(this).parent().remove()
	})

	$("#modal-update-slide2 form").submit(function(){
		let arrayForJson = [];
		$("#modal-update-slide2 .form-group--value5 .container-fluid input[type='text']").each(function(){
			if($(this).val()){
				arrayForJson.push($(this).val())
			}
		})
		if(arrayForJson.length){			
			$('#modal-update-slide2 input[name="value5"]').val(JSON.stringify(arrayForJson)) 
		} else {
			$('#modal-update-slide2 input[name="value5"]').val("")
		}
	})

	$("#modal-new-slide2 form").submit(function(){
		let arrayForJson = [];
		$("#modal-new-slide2 .form-group--value5 .container-fluid input[type='text']").each(function(){
			if($(this).val()){
				arrayForJson.push($(this).val())
			}
		})
		if(arrayForJson.length){			
			$('#modal-new-slide2 input[name="value5"]').val(JSON.stringify(arrayForJson)) 
		} else {
			$('#modal-new-slide2 input[name="value5"]').val("")
		}
	})








	$(".open-update-slide3").click(function(){
		$("#modal-update-slide3 .form-group--value5 .container-fluid").empty()
		if($(this).find('div').html()){
			let preim = JSON.parse($(this).find('div').html())
			for(let i = 0; i < preim.length; i++){ 
				$("#modal-update-slide3 .form-group--value5 .container-fluid").append(`
					<div class="row"> 
						<input type="text" class="form-control col-10" value="">
						<div class="col-2 text-center" title="Удалить" style="cursor: pointer;">×</div>
					</div> 
				`);
				$("#modal-update-slide3 .form-group--value5 .container-fluid .row:nth-child("+(+i+1)+") input").val(preim[i])
			}
		}
		$("#modal-update-slide3 .modal-title span").text($(this).attr('data-value2'))
		$("#modal-update-slide3 [name='id']").val($(this).attr('data-id'))
		$("#modal-update-slide3 [name='sort']").val($(this).attr('data-sort'))
		$("#modal-update-slide3 [name='value1']").val($(this).attr('data-value1'))
		$("#modal-update-slide3 [name='value2']").val($(this).attr('data-value2'))
		$("#modal-update-slide3 [name='value3']").val($(this).attr('data-value3'))
		$("#modal-update-slide3 [name='value4']").val($(this).attr('data-value4')).trigger('change')
		$("#modal-update-slide3 [name='value6']").val($(this).attr('data-value6')).trigger('change')
		$("#modal-update-slide3 [name='value7']").val($(this).attr('data-value7')).trigger('change')
	})

	$(".open-delete-slide3").click(function(){
		$("#modal-delete-slide3 .modal-title span").text($(this).attr('data-name'))
		$("#modal-delete-slide3 [name='id']").val($(this).attr('data-id'))
		$("#modal-delete-slide3 .modal-body p i").text($(this).attr('data-name')) 
	})

	$("#modal-update-slide3 form").submit(function(){
		let arrayForJson = [];
		$("#modal-update-slide3 .form-group--value5 .container-fluid input[type='text']").each(function(){
			if($(this).val()){
				arrayForJson.push($(this).val())
			}
		})
		if(arrayForJson.length){			
			$('#modal-update-slide3 input[name="value5"]').val(JSON.stringify(arrayForJson)) 
		} else {
			$('#modal-update-slide3 input[name="value5"]').val("")
		}
	})

	$(".img-preview-input").change(function(){
		$(this).parent().parent().find('.img-preview').attr('style','background: url('+$(this).val()+') no-repeat center / contain;');
	})
	$(".img-preview-input").on('input', function(){
		$(this).parent().parent().find('.img-preview').attr('style','background: url('+$(this).val()+') no-repeat center / contain;');
	})

	$("#modal-new-slide3 form").submit(function(){
		let arrayForJson = [];
		$("#modal-new-slide3 .form-group--value5 .container-fluid input[type='text']").each(function(){
			if($(this).val()){
				arrayForJson.push($(this).val())
			}
		})
		if(arrayForJson.length){			
			$('#modal-new-slide3 input[name="value5"]').val(JSON.stringify(arrayForJson)) 
		} else {
			$('#modal-new-slide3 input[name="value5"]').val("")
		}
	})


	$(".open-delete-slide4").click(function(){
		$("#modal-delete-slide4 .modal-title span").text($(this).attr('data-name'))
		$("#modal-delete-slide4 [name='id']").val($(this).attr('data-id'))
		$("#modal-delete-slide4 .modal-body p i").text($(this).attr('data-name'))
	})

	$(".open-update-slide4").click(function(){ 
		$("#modal-update-slide4 .modal-title span").text($(this).attr('data-value1'))
		$("#modal-update-slide4 [name='id']").val($(this).attr('data-id'))
		$("#modal-update-slide4 [name='sort']").val($(this).attr('data-sort'))
		$("#modal-update-slide4 [name='value1']").val($(this).attr('data-value1'))
		$("#modal-update-slide4 [name='value2']").val($(this).attr('data-value2')) 
	})



	$(".open-delete-slide6").click(function(){
		$("#modal-delete-slide6 .modal-title span").text($(this).attr('data-name'))
		$("#modal-delete-slide6 [name='id']").val($(this).attr('data-id'))
		$("#modal-delete-slide6 .modal-body p i").text($(this).attr('data-name'))
	})

	$(".open-update-slide6").click(function(){ 
		$("#modal-update-slide6 .modal-title span").text($(this).attr('data-value1'))
		$("#modal-update-slide6 [name='id']").val($(this).attr('data-id'))
		$("#modal-update-slide6 [name='sort']").val($(this).attr('data-sort'))
		$("#modal-update-slide6 [name='value1']").val($(this).attr('data-value1'))
		$("#modal-update-slide6 [name='value2']").val($(this).attr('data-value2')) 
	})
})
</script>
@endsection