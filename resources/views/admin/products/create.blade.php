
@extends('admin.layouts.default')

@section('css')
<link href="{{asset('assets/css/plugins/slick/slick-theme.css')}}" rel="stylesheet">
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
<script src="{{asset('assets/js/plugins/slick/slick.min.js')}}"></script>

<script>
	$(document).ready(function()
	{
		
		$('.product-images').slick({
			dots: true
		});
    });
</script>
@stop