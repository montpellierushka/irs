@extends('admin.layout')

@section('title', "Новая услуга")

@section('css')   
@endsection


@section('content')	 
@php
    $gifts = old('content.gifts', $service->content['gifts'] ?? []);
		$whys = old('content.whys', $service->content['whys'] ?? []);
		$whyItems = $whys['items'] ?? [];
		$helps = old('content.helps', $service->content['helps'] ?? []);
		$works = old('content.works', $service->content['works'] ?? []);
		$workItems = $works['items'] ?? [];
		$starts = old('content.starts', $service->content['starts'] ?? []);
		$whywes = old('content.whywes', $service->content['whywes'] ?? []);
		$goals = old('content.goals', $service->content['goals'] ?? []);
		$trusts = old('content.trusts', $service->content['trusts'] ?? []);
		$projects = old('content.projects', $service->content['projects'] ?? []);
		$chooses = old('content.chooses', $service->content['chooses'] ?? []);
@endphp

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header d-flex p-0">
					<h3 class="card-title p-3">Слайды</h3>
					<ul class="nav nav-pills ml-auto p-2">
							<li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Общее</a></li>
							<li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Верхний блок</a></li>
							<li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Зачем?</a></li>
							<li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">Мы поможем!</a></li> 
							<li class="nav-item"><a class="nav-link" href="#tab_5" data-toggle="tab">Над вашим сайтом работают</a></li> 
							<li class="nav-item"><a class="nav-link" href="#tab_6" data-toggle="tab">С чего начнем?</a></li> 
							<li class="nav-item"><a class="nav-link" href="#tab_7" data-toggle="tab">Почему?</a></li>
							<li class="nav-item"><a class="nav-link" href="#tab_8" data-toggle="tab">Наша цель</a></li>
							<li class="nav-item"><a class="nav-link" href="#tab_9" data-toggle="tab">Нам доверились</a></li>  
							<li class="nav-item"><a class="nav-link" href="#tab_10" data-toggle="tab">Наши проекты</a></li>   
							<li class="nav-item"><a class="nav-link" href="#tab_11" data-toggle="tab">Выбирая нас</a></li> 
					</ul>
			</div>
			<div class="card-body">
				<form method="POST" action="{{route('admin_services_new_add')}}">
					@csrf
					<div class="tab-content">
						<div class="tab-pane active" id="tab_1">
							<div class="row">
								<div class="col-md-8">
									<div class="card card-primary">
										<div class="card-header">
											<h3 class="card-title">Общее</h3>
										</div> 
											<div class="card-body">
												<div class="form-group">
													<label>Название @error('title') <code>{{ $message }}</code> @enderror</label>
													<input type="text" class="form-control mytranslit @error('title') is-invalid @enderror" name="title" value="{{ old('text', $service->text ?? '') }}" placeholder="" required>
												</div>  
												<div class="form-group">
													<label>Подзаголовок @error('description') <code>{{ $message }}</code> @enderror</label>
													<input type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description', $service->description ?? '') }}" placeholder="Подзаголовок">
												</div>   	
												<div class="form-group">
													<label>Символьный код @error('slug') <code>{{ $message }}</code> @enderror</label>
													<input type="text" class="form-control mytranslitto @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug', $service->slug ?? '') }}" placeholder="" required>
												</div>  
												<div class="form-group">
													<label>Текст страницы @error('text') <code>{{ $message }}</code> @enderror</label>
													<textarea class="form-control @error('text') is-invalid @enderror" name="text" placeholder="Текст страницы">{{ old('text', $service->text ?? '') }}</textarea>
												</div> 
											</div>
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
											<p>Общая информация</p>
											<ul>
												<li>Заголовок</li>
												<li>Подзаголовок</li>
												<li>url</li>
												<li>SEO текст</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="tab_2">
								<div class="row">
									<div class="col-md-8">
										<div class="card card-primary">
											<div class="card-header">
												<h3 class="card-title">Верхний блок c подарками</h3>
											</div> 
												<div class="card-body p-0 pt-2"> 
													<table class="table dataTable table-hover m-0 dynamic-table" style="margin:0 !important" data-tab="gifts">
														<thead>
															<tr>
																<th>Заголовок</th>
																<th>Действие</th> 
															</tr>
														</thead>
														<tbody>
															@foreach($gifts as $i => $gift)
																<tr>
																	<td>
																			<input type="text" name="content[gifts][{{ $i }}][title]" value="{{ $gift['title'] ?? '' }}" class="form-control" required>
																	</td>
																	<td>
																			<button type="button" class="btn btn-danger btn-sm remove-row">Удалить</button>
																	</td> 
																</tr> 
															@endforeach
														</tbody>
													</table>
													<button type="button" class="btn btn-primary add-row-btn m-2" data-tab="gifts">Добавить</button>
												</div>
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
											<div class="card-body">
												<a href="{{asset('/storage/s-gifts.jpg')}}" data-toggle="lightbox" data-title="Слайд 1">
													<img src="{{asset('/storage/s-gifts.jpg')}}" class="w-100" alt="Слайд 1">
												</a>
											</div>
										</div>
									</div>
								</div> 
						</div>
						<div class="tab-pane" id="tab_3">
							<div class="row">
								<div class="col-md-8">
									<div class="card card-primary">
										<div class="card-header">
											<h3 class="card-title">Зачем вам?</h3>
										</div> 
											<div class="card-body">
												<div class="form-group">
													<label>Зачем вам ...</label>
													<input type="text" class="form-control" name="content[whys][titleBlock]" value="{{ $whys['titleBlock'] ?? '' }}" placeholder="Зачем вам ...">
												</div>
												<div class="card-body p-0 pt-2"> 
													<table class="table dataTable table-hover m-0 dynamic-table" style="margin:0 !important" data-tab="whys">
														<thead>
															<tr>
																<th>Заголовок</th>
																<th>Действие</th> 
															</tr>
														</thead>
														<tbody>
															@foreach($whyItems as $i => $why)
																<tr>
																	<td>
																			<input type="text" name="content[whys][items][{{ $i }}][title]" value="{{ $why['title'] ?? '' }}" class="form-control" required>
																	</td>
																	<td>
																			<button type="button" class="btn btn-danger btn-sm remove-row">Удалить</button>
																	</td> 
																</tr> 
															@endforeach
														</tbody>
													</table>
													<button type="button" class="btn btn-primary add-row-btn m-2" data-tab="whys">Добавить</button>
												</div>
											</div> 
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
											<a href="{{asset('/storage/s-why.jpg')}}" data-toggle="lightbox" data-title="Слайд 2">
												<img src="{{asset('/storage/s-why.jpg')}}" class="w-100" alt="Слайд 2">
											</a>
										</div>
									</div>
								</div>
							</div> 
						</div>
						<div class="tab-pane" id="tab_4">
							<div class="row">
								<div class="col-md-8">
									<div class="card card-primary">
										<div class="card-header">
											<h3 class="card-title">Мы поможем!</h3>
										</div> 
									</div>
									<div class="card-body p-0 pt-2"> 
										<table class="table dataTable table-hover m-0 dynamic-table" style="margin:0 !important" data-tab="helps">
											<thead>
												<tr>
													<th>Заголовок</th>
													<th>Действие</th> 
												</tr>
											</thead>
											<tbody>
												@foreach($helps as $i => $help)
													<tr>
														<td>
																<input type="text" name="content[helps][{{ $i }}][digit]" value="{{ $help['digit'] ?? '' }}" class="form-control" required>
														</td>
														<td>
																<input type="text" name="content[helps][{{ $i }}][subtitle]" value="{{ $help['subtitle'] ?? '' }}" class="form-control" required>
														</td>
														<td>
																<input type="text" name="content[helps][{{ $i }}][text]" value="{{ $help['text'] ?? '' }}" class="form-control" required>
														</td>
														<td>
																<button type="button" class="btn btn-danger btn-sm remove-row">Удалить</button>
														</td> 
													</tr> 
												@endforeach
											</tbody>
										</table>
										<button type="button" class="btn btn-primary add-row-btn m-2" data-tab="helps">Добавить</button>
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
										<div class="card-body">
											<a href="{{asset('/storage/s-help.jpg')}}" data-toggle="lightbox" data-title="Слайд 3">
												<img src="{{asset('/storage/s-help.jpg')}}" class="w-100" alt="Слайд 3">
											</a>
										</div>
									</div>
								</div>
							</div> 
						</div>
						<div class="tab-pane" id="tab_5">
							<div class="row">
								<div class="col-md-8">
									<div class="card card-primary">
										<div class="card-header">
											<h3 class="card-title">Над вашим сайтом работают</h3>
										</div> 
										<div class="card-body">
											<div class="form-group">
												<label>Над вашим ... работают</label>
												<input type="text" class="form-control" name="content[works][titleBlock]" value="{{ $works['titleBlock'] ?? '' }}" placeholder="Над вашим ... работают">
											</div> 
											<div class="card-body p-0 pt-2"> 
												<table class="table dataTable table-hover m-0 dynamic-table" style="margin:0 !important" data-tab="works">
													<thead>
														<tr>
															<th>Заголовок</th>
															<th>Действие</th> 
														</tr>
													</thead>
													<tbody>
														@foreach($workItems as $i => $work)
															<tr>
																<td>
																		<input type="text" name="content[works][items][{{ $i }}][title]" value="{{ $work['title'] ?? '' }}" class="form-control" required>
																</td>
																<td>
																		<input type="text" name="content[works][items][{{ $i }}][text]" value="{{ $work['text'] ?? '' }}" class="form-control" required>
																</td>
																<td>
																		<button type="button" class="btn btn-danger btn-sm remove-row">Удалить</button>
																</td> 
															</tr> 
														@endforeach
													</tbody>
												</table>
												<button type="button" class="btn btn-primary add-row-btn m-2" data-tab="works">Добавить</button>
											</div> 
										</div> 
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
											<a href="{{asset('/storage/s-work.jpg')}}" data-toggle="lightbox" data-title="Слайд 4">
												<img src="{{asset('/storage/s-work.jpg')}}" class="w-100" alt="Слайд 4">
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="tab_6">
							<div class="row">
								<div class="col-md-8">
									<div class="card card-primary">
										<div class="card-header">
											<h3 class="card-title">С чего начнем?</h3>
										</div> 
										<div class="card-body">
											<div class="form-group">
												<label>Заголовок</label>
												<input type="text" class="form-control" name="content[starts][title]" value="{{ $starts['title'] ?? '' }}" placeholder="Заголовок">
											</div>  
											<div class="form-group">
												<label>Текст</label>
												<input type="text" class="form-control" name="content[starts][text]" value="{{ $starts['text'] ?? '' }}" placeholder="Текст">
											</div>  
											<div class="form-group">
												<label>Изображение(ссылка из медиабиблиотеки)</label>
												<input type="text" class="form-control" name="content[starts][img]" value="{{ $starts['img'] ?? '' }}" placeholder="Изображение">
											</div>  
										</div> 
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
											<a href="{{asset('/storage/s-start.jpg')}}" data-toggle="lightbox" data-title="Слайд 5">
												<img src="{{asset('/storage/s-start.jpg')}}" class="w-100" alt="Слайд 5">
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="tab_7">
								<div class="row">
									<div class="col-md-8">
										<div class="card card-primary">
											<div class="card-header">
												<h3 class="card-title">Почему стоит обратиться к нам?</h3>
											</div> 
											<div class="card-body p-0 pt-2"> 
												<table class="table dataTable table-hover m-0 dynamic-table" style="margin:0 !important" data-tab="whywes">
													<thead>
														<tr>
															<th>Заголовок</th>
															<th>Действие</th> 
														</tr>
													</thead>
													<tbody>
														@foreach($whywes as $i => $whywe)
															<tr>
																<td>
																		<input type="text" name="content[whywes][{{ $i }}][title]" value="{{ $whywe['title'] ?? '' }}" class="form-control" required>
																</td>
																<td>
																		<button type="button" class="btn btn-danger btn-sm remove-row">Удалить</button>
																</td> 
															</tr> 
														@endforeach
													</tbody>
												</table>
												<button type="button" class="btn btn-primary add-row-btn m-2" data-tab="whywes">Добавить</button>
											</div>
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
											<div class="card-body">
												<a href="{{asset('/storage/s-whywe.jpg')}}" data-toggle="lightbox" data-title="Слайд 6">
													<img src="{{asset('/storage/s-whywe.jpg')}}" class="w-100" alt="Слайд 6">
												</a>
											</div>
										</div>
									</div>
								</div>
						</div>
						<div class="tab-pane" id="tab_8">
								<div class="row">
									<div class="col-md-8">
										<div class="card card-primary">
											<div class="card-header">
												<h3 class="card-title">Наша цель...</h3>
											</div> 
												<div class="card-body">
													<div class="form-group">
														<label>Наша цель...</label>
														<input type="text" class="form-control" name="content[goals][title]" value="{{ $goals['title'] ?? '' }}" placeholder="Наша цель...">
													</div>  
													<div class="form-group">
														<label>Текст</label>
														<input type="text" class="form-control" name="content[goals][text]" value="{{ $goals['text'] ?? '' }}" placeholder="Текст">
													</div> 
													<div class="form-group">
														<label>Изображение(ссылка из медиабиблиотеки)</label>
														<input type="text" class="form-control" name="content[goals][img]" value="{{ $goals['img'] ?? '' }}" placeholder="Изображение">
													</div>      	
												</div> 
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
												<a href="{{asset('/storage/s-goal.jpg')}}" data-toggle="lightbox" data-title="Слайд 6">
													<img src="{{asset('/storage/s-goal.jpg')}}" class="w-100" alt="Слайд 6">
												</a>
											</div>
										</div>
									</div>
								</div>
						</div>
						<div class="tab-pane" id="tab_9">
							<div class="row">
								<div class="col-md-8">
									<div class="card card-primary">
										<div class="card-header">
											<h3 class="card-title">Нам доверились</h3>
										</div> 
										<div class="card-body p-0 pt-2"> 
											<table class="table dataTable table-hover m-0 dynamic-table" style="margin:0 !important" data-tab="trusts">
												<thead>
													<tr>
														<th>Изображение</th>
														<th>Действие</th> 
													</tr>
												</thead>
												<tbody>
													@foreach($trusts as $i => $trust)
														<tr>
															<td>
																	<input type="text" name="content[trusts][{{ $i }}][img]" value="{{ $trust['img'] ?? '' }}" placeholder="ссылка из медиабиблиотеки" class="form-control" required>
															</td>
															<td>
																	<button type="button" class="btn btn-danger btn-sm remove-row">Удалить</button>
															</td> 
														</tr> 
													@endforeach
												</tbody>
											</table>
											<button type="button" class="btn btn-primary add-row-btn m-2" data-tab="trusts">Добавить</button>
										</div>
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
											<a href="{{asset('/storage/s-trust.jpg')}}" data-toggle="lightbox" data-title="Слайд 6">
												<img src="{{asset('/storage/s-trust.jpg')}}" class="w-100" alt="Слайд 6">
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="tab_10">
							<div class="row">
								<div class="col-md-8">
									<div class="card card-primary">
										<div class="card-header">
											<h3 class="card-title">Наши проекты</h3>
										</div> 
										<div class="card-body p-0 pt-2"> 
											<table class="table dataTable table-hover m-0 dynamic-table" style="margin:0 !important" data-tab="projects">
												<thead>
													<tr>
														<th>Заголовок</th>
														<th>Текст</th>
														<th>Изображение</th>
														<th>Ссылка</th>
														<th>Действие</th> 
													</tr>
												</thead>
												<tbody>
													@foreach($projects as $i => $project)
														<tr>
															<td>
																	<input type="text" name="content[projects][{{ $i }}][title]" value="{{ $project['title'] ?? '' }}" class="form-control" required>
															</td>
															<td>
																	<input type="text" name="content[projects][{{ $i }}][text]" value="{{ $project['text'] ?? '' }}" class="form-control" required>
															</td>
															<td>
																	<input type="text" name="content[projects][{{ $i }}][img]" value="{{ $project['img'] ?? '' }}" placeholder="ссылка из медиабиблиотеки" class="form-control" required>
															</td>
															<td>
																	<input type="text" name="content[projects][{{ $i }}][link]" value="{{ $project['link'] ?? '' }}" class="form-control" required>
															</td>
															<td>
																	<button type="button" class="btn btn-danger btn-sm remove-row">Удалить</button>
															</td> 
														</tr> 
													@endforeach
												</tbody>
											</table>
											<button type="button" class="btn btn-primary add-row-btn m-2" data-tab="projects">Добавить</button>
										</div>
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
											<a href="{{asset('/storage/s-projects.jpg')}}" data-toggle="lightbox" data-title="Слайд 6">
												<img src="{{asset('/storage/s-projects.jpg')}}" class="w-100" alt="Слайд 6">
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="tab_11">
								<div class="row">
									<div class="col-md-8">
										<div class="card card-primary">
											<div class="card-header">
												<h3 class="card-title">Выбирая нас</h3>
											</div> 
											<div class="card-body p-0 pt-2"> 
												<table class="table dataTable table-hover m-0 dynamic-table" style="margin:0 !important" data-tab="chooses">
													<thead>
														<tr>
															<th>Заголовок</th>
															<th>Действие</th> 
														</tr>
													</thead>
													<tbody>
														@foreach($chooses as $i => $choose)
															<tr>
																<td>
																		<input type="text" name="content[chooses][{{ $i }}][title]" value="{{ $choose['title'] ?? '' }}" class="form-control" required>
																</td>
																<td>
																		<button type="button" class="btn btn-danger btn-sm remove-row">Удалить</button>
																</td> 
															</tr> 
														@endforeach
													</tbody>
												</table>
												<button type="button" class="btn btn-primary add-row-btn m-2" data-tab="chooses">Добавить</button>
											</div>
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
												<a href="{{asset('/storage/s-choose.jpg')}}" data-toggle="lightbox" data-title="Слайд 6">
													<img src="{{asset('/storage/s-choose.jpg')}}" class="w-100" alt="Слайд 6">
												</a>
											</div>
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
</div>

 
@endsection

@section('scripts')   
<script>
    $(document).ready(function(){    

    	function urlLit(w,v) {
			var tr='a b v g d e ["zh","j"] z i y k l m n o p r s t u f h c ch sh ["shh","shch"] ~ y ~ e yu ya ~ ["jo","e"]'.split(' ');
			var ww=''; w=w.toLowerCase();
			for(i=0; i<w.length; ++i) {
				cc=w.charCodeAt(i); ch=(cc>=1072?tr[cc-1072]:w[i]);
				if(ch.length<3) ww+=ch; else ww+=eval(ch)[v];
			}
			return(ww.replace(/[^a-zA-Z0-9\-]/g,'-').replace(/[-]{2,}/gim, '-').replace( /^\-+/g, '').replace( /\-+$/g, ''));
		}
 
		$('.mytranslit').bind('change keyup input click', function(){
			let slug = urlLit($('.mytranslit').val(), 0);
    	$('.mytranslitto').val('services/' + slug);
		});
 
        $('textarea.form-control').summernote({ 
            tabsize: 2, 
            height: '300px',
            lang : 'ru-RU',
            toolbar: [
              ['style', ['style']],
              ['font', ['bold', 'underline','subscript','superscript']],
              ['color', ['color']],
              ['para', ['ul', 'ol', 'paragraph']],
              ['table', ['table']],
              ['insert', ['picture']],
              ['view', ['codeview']]
            ],
            callbacks: {
                onImageUpload: function(files) {
                    var el = $(this);
                    sendFile(files[0],el);
                }
            }
        }); 
        function sendFile(file, el) {
            var  data = new FormData();
            data.append("file", file);
            data.append("echo", 1);
            var url = "{{ route('upload') }}";
            $.ajax({
                data: data,
                type: "POST",
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                url: url,
                cache: false,
                contentType: false,
                processData: false,
                success: function(url2) {
                    el.summernote('insertImage', url2.replace('public/', '/storage/'));
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("Формат картинки не поддерживается, либо размер файла слишком велик");
                }
           });
        } 
				function createRow(tab, index) {
					if (tab === 'gifts') {
							return `
									<tr>
											<td>
													<input type="text" name="content[gifts][${index}][title]" class="form-control" required>
											</td>
											<td>
													<button type="button" class="btn btn-danger btn-sm remove-row">Удалить</button>
											</td>
									</tr>
							`;
					}
					if (tab === 'whys') {
							return `
									<tr>
											<td>
													<input type="text" name="content[whys][items][${index}][title]" class="form-control" required>
											</td>
											<td>
													<button type="button" class="btn btn-danger btn-sm remove-row">Удалить</button>
											</td>
									</tr>
							`;
					}
					if (tab === 'helps') {
							return `
									<tr>
											<td>
													<input type="text" name="content[helps][${index}][digit]" class="form-control" required>
											</td>
											<td>
													<input type="text" name="content[helps][${index}][subtitle]" class="form-control" required>
											</td>
											<td>
													<input type="text" name="content[helps][${index}][text]" class="form-control" required>
											</td>
											<td>
													<button type="button" class="btn btn-danger btn-sm remove-row">Удалить</button>
											</td>
									</tr>
							`;
					}
					if (tab === 'works') {
							return `
									<tr>
											<td>
													<input type="text" name="content[works][items][${index}][title]" class="form-control" required>
											</td>
											<td>
													<input type="text" name="content[works][items][${index}][text]" class="form-control" required>
											</td>
											<td>
													<button type="button" class="btn btn-danger btn-sm remove-row">Удалить</button>
											</td>
									</tr>
							`;
					}
					if (tab === 'whywes') {
							return `
									<tr>
											<td>
													<input type="text" name="content[whywes][${index}][title]" class="form-control" required>
											</td>
											<td>
													<button type="button" class="btn btn-danger btn-sm remove-row">Удалить</button>
											</td>
									</tr>
							`;
					}
					if (tab === 'chooses') {
							return `
									<tr>
											<td>
													<input type="text" name="content[chooses][${index}][title]" class="form-control" required>
											</td>
											<td>
													<button type="button" class="btn btn-danger btn-sm remove-row">Удалить</button>
											</td>
									</tr>
							`;
					}
					if (tab === 'trusts') {
							return `
									<tr>
											<td>
													<input type="text" name="content[trusts][${index}][img]" class="form-control" placeholder="ссылка из медиабиблиотеки" required>
											</td>
											<td>
													<button type="button" class="btn btn-danger btn-sm remove-row">Удалить</button>
											</td>
									</tr>
							`;
					}
					if (tab === 'projects') {
							return `
									<tr>
											<td>
													<input type="text" name="content[projects][${index}][title]" class="form-control" required>
											</td>
											<td>
													<input type="text" name="content[projects][${index}][text]" class="form-control" required>
											</td>
											<td>
													<input type="text" name="content[projects][${index}][img]" class="form-control" placeholder="ссылка из медиабиблиотеки" required>
											</td>
											<td>
													<input type="text" name="content[projects][${index}][link]" class="form-control" required>
											</td>
											<td>
													<button type="button" class="btn btn-danger btn-sm remove-row">Удалить</button>
											</td>
									</tr>
							`;
					}
					return '';
					
				}

				document.querySelectorAll('.add-row-btn').forEach(function(btn) {
					btn.addEventListener('click', function() {
						let tab = btn.getAttribute('data-tab');
						let table = document.querySelector(`.dynamic-table[data-tab="${tab}"] tbody`);
						let index = table.querySelectorAll('tr').length;
						table.insertAdjacentHTML('beforeend', createRow(tab, index));
					});
				});
				function renumberRows(table) {
					let rows = table.querySelectorAll('tr');
					rows.forEach((row, i) => {
							row.querySelectorAll('input, select, textarea').forEach(input => {
									if (input.name) {
											input.name = input.name.replace(/(\[\d+\])/, `[${i}]`);
									}
							});
					});
				}
				document.querySelectorAll('.dynamic-table').forEach(function(table) {
						table.addEventListener('click', function(e) {
								if (e.target && e.target.classList.contains('remove-row')) {
										e.target.closest('tr').remove();
										renumberRows(table);
								}
						});
				});
    });
</script>
@endsection
