
@extends('admin.layouts.default')

@section('css')
<link href="{{asset('assets/css/plugins/slick/slick.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/plugins/slick/slick-theme.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/plugins/jasny/jasny-bootstrap.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('assets/fancybox/source/jquery.fancybox.css')}}">
@stop

{{-- Page content --}}
@section('content')
{{-- Breadcrumb --}}
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-4">
		<h2>Tạo mới sản phẩm</h2>
		<ol class="breadcrumb">
			<li>
				<a href="{{route('dashboard')}}">Home</a>
			</li>
			<li>
				<a href="#">Danh sách sản phẩm</a>
			</li>
			<li class="active">
				<strong>Tạo mới sản phẩm</strong>
			</li>
		</ol>
	</div>
	<div class="col-sm-8">
		<div class="title-action">
			<a href="#" class="btn btn-primary">Trở về danh sách sản phẩm</a>
		</div>
	</div>
</div>
{{-- END Breadcrumb --}}

{{-- START Main Content --}}
<div class="wrapper wrapper-content">
	<div class="row animated fadeInRight">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Thông tin sản phẩm mới</h5>
				<div class="ibox-tools">
					<a class="collapse-link">
						<i class="fa fa-chevron-up"></i>
					</a>
				</div>
			</div>
			{{-- START FORM --}}
			<div class="ibox-content">
				<form id="form" class="form-horizontal" role="form" action="#" 
				enctype="multipart/form-data" method="POST">
				@csrf
					<div class="panel-group payments-method" id="accordion">
						<!--Panel -->
						<div class="panel panel-default">
							<div class="panel-heading">
                                <h5 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#style">Giao diện hiển thị</a>
                                </h5>
                            </div>
                            <div id="style" class="panel-collapse collapse">
                            	<div class="panel-body">
                            		<div class="ibox product-detail">
                        			 	<div class="ibox-content">
                        			 		<div class="row">
                        			 			<div class="col-md-5">
	                                    			<div class="product-images">
	                                    				<div>
				                                            <div class="image-imitation">
				                                                [Giao diện 1]
				                                            </div>
				                                        </div>
				                                        <div>
				                                            <div class="image-imitation">
				                                                [Giao diện 2]
				                                            </div>
				                                        </div>
	                                    			</div>
                                    			</div>
                                    			<div class="col-md-7">
                                    				<h2 class="font-bold m-b-xs">
                                    					Chọn giao diện hiển thị cho sản phẩm mới
                                    				</h2>
                                    				<small>Xem mẫu giao diện ở slide bên cạnh và lựa chọn theo tên</small>
                                    				<hr>
                                    				<div class="text-left">
				                                        <div class="btn-group">
				                                        	<input type="hidden" name="style_p" id="style_p" value='0'>
				                                            <a onclick="chooseStyle()"  class="btn btn-success btn-sm">
				                                            	<i class="fa fa-star"></i> Giao diện 1
				                                            </a>
				                                            <a onclick="chooseStyle()" class="btn btn-white btn-sm">
				                                            	<i class="fa fa-star"></i> Giao diện 2
				                                            </a>
				                                        </div>
				                                    </div>                                				
                                    			</div>
                        			 		</div>
                        			 	</div>
                        			</div>	                            	
                            	</div>
							</div>
						</div>
						<!-- -->
						<!--Panel -->
						<div class="panel panel-default">
							<div class="panel-heading">
                                <h5 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#info">Thông tin sản phẩm</a>
                                </h5>
                            </div>
                            <div id="info" class="panel-collapse collapse">
                            	<div class="panel-body">
                            		<div class="form-group {{ $errors->has('name_p') ? 'has-error' : '' }}">
									 	<label class="col-sm-2 control-label">Tên sản phẩm (*) </label>
									 	<div class="col-sm-10">
									 		<input type="text" class="form-control" name="name_p" id="name_p" value="{{old('name_p')}}">
									 	</div>
									</div>
									<div class="form-group {{ $errors->has('des_s') ? 'has-error' : '' }}">
									 	<label class="col-sm-2 control-label">Miêu tả ngắn (*) </label>
									 	<div class="col-sm-10">
									 		<textarea name="des_s" id="des_s" class="form-control my-editor" rows="20" required>
									 		 	
									 		</textarea>
									 	</div>
									</div>

									<div class="form-group {{ $errors->has('banner') ? 'has-error' : '' }}">
									 	<label class="col-sm-2 control-label">Banner (*)</label>
									 	<div class="col-sm-10">
									 		<div class="fileinput fileinput-new input-group" data-provides="fileinput">
												<div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> 
													<span class="fileinput-filename"></span>
												</div>
												<span class="input-group-addon btn btn-default btn-file">
													<span class="fileinput-new">Chọn ảnh</span>
													<span class="fileinput-exists">Thay đổi</span>
													<input type="file" name="logo">
												</span>
												<a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Xóa</a>
											</div>		
										</div>
									</div>

									<div class="form-group {{ $errors->has('des_f') ? 'has-error' : '' }}">
									 	<label class="col-sm-2 control-label">Miêu tả chi tiết (*) </label>
									 	<div class="col-sm-10">
									 		 <textarea name="des_f" id="des_f" class="form-control my-editor" rows="20" required>
									 		 	
									 		 </textarea>
									 	</div>
									</div>

	                            	
                            	</div>
							</div>
						</div>
						<!-- -->
						<!--Panel -->
						<div class="panel panel-default">
							<div class="panel-heading">
                                <h5 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#quytrinh">Quy trình</a>
                                </h5>
                            </div>
                            <div id="quytrinh" class="panel-collapse collapse">
                            	<div class="panel-body">
	                            	
                            	</div>
							</div>
						</div>
						<!-- -->
						<!--Panel -->
						<div class="panel panel-default">
							<div class="panel-heading">
                                <h5 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#congnghe">Công nghệ</a>
                                </h5>
                            </div>
                            <div id="congnghe" class="panel-collapse collapse">
                            	<div class="panel-body">
	                            	
                            	</div>
							</div>
						</div>
						<!-- -->
						<!--Panel -->
						<div class="panel panel-default">
							<div class="panel-heading">
                                <h5 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#botro">Sản phẩm bổ trợ</a>
                                </h5>
                            </div>
                            <div id="botro" class="panel-collapse collapse">
                            	<div class="panel-body">
	                            	
                            	</div>
							</div>
						</div>
						<!-- -->
					</div>	
					<div class="form-group">
						<div class="col-sm-4 col-sm-offset-2">
							<button class="btn btn-white" >Làm mới</button>
							<button class="btn btn-primary" type="submit">Tạo mới</button>
						</div>
					</div>					  				
				</form>
			</div>
			{{-- END FORM --}}
		</div>
	</div>
</div>
{{-- END Main Content --}}

@stop
{{-- Page content --}}

@section('script')
<!-- slick carousel-->
<script src="{{asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('assets/js/plugins/slick/slick.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/jasny/jasny-bootstrap.min.js')}}"></script>

<script>
	var fmPath = '/goldwell/filemanager/dialog.php?type=2&editor=ckeditor&relative_url=1&fldr=';
	$(document).ready(function()
	{
		CKEDITOR.replace( 'des_f' ,{
	      filebrowserBrowseUrl : fmPath,
	      filebrowserUploadUrl : fmPath,
	      filebrowserImageBrowseUrl : '/goldwell/filemanager/dialog.php?type=1&editor=ckeditor&relative_url=1&fldr=',
	     });
		
		CKEDITOR.replace( 'des_s' );
		$('.product-images').slick({
			dots: true
		});
    });
</script>
@stop