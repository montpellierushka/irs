@extends('admin.layout')

@section('title', $post->title)

@section('css')   
@endsection


@section('content')	 
<div class="row">
	<div class="col-md-12">
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title"></h3>
			</div> 
			<form method="POST" class="new-theme-form" action="{{ route('admin_posts_update') }}">
                @csrf 
                <input type="hidden" name="id" value="{{ $post->id }}">
				<div class="card-body"> 
					<div class="form-group">
						<label>Категория @error('category_id') <code>{{ $message }}</code> @enderror</label>
						<select class="form-control select2" name="category_id" required>
							<?foreach($categories as $cat){?>
								<option value="<?=$cat->id?>" <?if($post->category_id == $cat->id){ echo "selected"; }?>><?=$cat->title?></option>
							<?}?> 
						</select>
					</div>     
					<div class="form-group">
						<label>Заголовок @error('title') <code>{{ $message }}</code> @enderror</label>
						<input type="text" class="form-control mytranslit @error('title') is-invalid @enderror" name="title" value="{{ $post->title }}" placeholder="" required>
					</div>  
					<div class="form-group">
						<label>Символьный код @error('slug') <code>{{ $message }}</code> @enderror</label>
						<input type="text" class="form-control mytranslitto @error('slug') is-invalid @enderror" name="slug" value="{{ $post->slug }}" placeholder="" required>
					</div>    
					<div class="container-fluid">
						<div class="row">
							<div class="form-group col-8">
								<label>Превью изображение (ссылка из медиабиблиотеки) @error('preview') <code>{{ $message }}</code> @enderror</label>
								<input type="text" class="form-control @error('preview') is-invalid @enderror img-preview-input" name="preview" value="{{ $post->preview }}" placeholder="Ссылка на картинку">
							</div>
							<div class="col-4 img-preview"></div>
						</div>
					</div>
					<div class="form-group">
						<label>Краткое описание @error('excerpt') <code>{{ $message }}</code> @enderror</label>
						<input type="text" class="form-control @error('excerpt') is-invalid @enderror" name="excerpt" value="{{ $post->excerpt }}" placeholder="" required>
					</div>   
					<div class="form-group">
						<label>Дата поста @error('date') <code>{{ $message }}</code> @enderror</label>
							<div class="input-group date" id="reservationdatetime" data-target-input="nearest">
								<input type="text" class="form-control datetimepicker-input @error('date') is-invalid @enderror" data-target="#reservationdatetime"  name="date" value="<?=date("d.m.Y H:i",$post->date)?>" required />
								<div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
								<div class="input-group-text"><i class="fa fa-calendar"></i></div>
							</div>
						</div>
					</div> 	
					<div class="form-group">
						<label>Контент @error('content') <code>{{ $message }}</code> @enderror</label>
						<textarea class="form-control ta-theory" rows="3" placeholder="Теория" name="content">{{ $post->content }}</textarea>
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
			$('.mytranslitto').val(urlLit($('.mytranslit').val(),0))
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
    });
</script>
@endsection