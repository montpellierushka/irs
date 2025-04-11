@extends('admin.layout')

@section('title', "Новая страница")

@section('css')   
@endsection


@section('content')	 
<div class="row">
	<div class="col-md-12">
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title"></h3>
			</div> 
			<form method="POST" class="new-theme-form" action="{{ route('admin_pages_new') }}">
                @csrf 
				<div class="card-body">    
					<div class="form-group">
						<label>Заголовок @error('title') <code>{{ $message }}</code> @enderror</label>
						<input type="text" class="form-control mytranslit @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="" required>
					</div>  
					<div class="form-group">
						<label>Символьный код @error('slug') <code>{{ $message }}</code> @enderror</label>
						<input type="text" class="form-control mytranslitto @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug') }}" placeholder="" required>
					</div>     
					<div class="form-group">
						<label>Краткое описание @error('excerpt') <code>{{ $message }}</code> @enderror</label>
						<input type="text" class="form-control @error('excerpt') is-invalid @enderror" name="excerpt" value="{{ old('excerpt') }}" placeholder="" required>
					</div>  
					<div class="form-group">
						<label>SEO Тайтл (если пуст выводится тайтл по умолчанию) @error('seo_title') <code>{{ $message }}</code> @enderror</label>
						<input type="text" class="form-control @error('seo_title') is-invalid @enderror" name="seo_title" value="{{ old('seo_title') }}" placeholder="">
					</div>  
					<div class="form-group">
						<label>SEO description (если пуст выводится description по умолчанию) @error('seo_description') <code>{{ $message }}</code> @enderror</label>
						<input type="text" class="form-control @error('seo_description') is-invalid @enderror" name="seo_description" value="{{ old('seo_description') }}" placeholder="">
					</div>    	
					<div class="form-group">
						<label>Контент @error('content') <code>{{ $message }}</code> @enderror</label>
						<textarea class="form-control ta-theory" rows="3" placeholder="Контент" name="content">{{ old('content') }}</textarea>
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