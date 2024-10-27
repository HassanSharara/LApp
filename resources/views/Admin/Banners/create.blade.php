@extends('royal_layout.main_dash.index')
@section('content')
<?php 
use App\Http\Controllers\Files\Image\ImageController
?>
<div class="section-body">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<form
enctype="multipart/form-data"
action="{{
    isset($model)?Route('edit_banner_post',['id'=>$model->id]):
    Route('create_banner_post')}}" method="post">
    @csrf
        <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>اسم التخصص</label>
                        <input type="text" value="{{$model->title??""}}" name="title" class="form-control">
                    </div>
                    <br>
                    
                    <div class="form-group">
                        <label>قوة ظهور القسم</label>
                        <input name="t" value="{{$model->t??""}}" type="number" class="form-control">
                    </div>
                    <br>

                    <br>
                    <div class="form-group">
                        <label> الوصف  </label>
                        <input name="description" value="{{$model->description??""}}" type="text" class="form-control">
                    </div>
                    <br>
                    <div class="form-group">
                        <label> action_type  </label>
                        <input name="action_type" value="{{$model->action_type??""}}" type="text" class="form-control">
                    </div>
                    <br>
                    <div class="form-group">
                        <label> metadata  </label>
                        <input name="metadata" value="{{$model->metadata??""}}" type="text" class="form-control">
                    </div>
                    <br>
                    @if(isset($model))
                            <label>تبديل صورة القسم</label>
                           @if($model->images->count()>0)
                           <br>
                            <td><img class="img-responsive imgcover" src="{{asset(ImageController::$uploadPath.'/'.$model->images->first()->path)}}">
                            <br>
                            <br>
                           @endif
                        @else
                            <label>صورة القسم</label>
                        @endif



                        <input type="file" name="royal_image" class="form-control">
                </div>
               
                <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">
                        @if(isset($model))
                            تعديل التخصص
                        @else
                            انشاء تخصص
                        @endif
                    </button>
                </div>
            </div>
</form>
        </div>
    </div>
</div>
@endsection
