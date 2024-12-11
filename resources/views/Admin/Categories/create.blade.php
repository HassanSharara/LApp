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
    isset($model)?Route('edit_category_post',['id'=>$model->id]):
    Route('create_category_post')}}" method="post">
    @csrf
        <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>اسم التخصص</label>
                        <input type="text" value="{{$model->name??""}}" name="name" class="form-control">
                    </div>

                    @if (isset($id) && !isset($model))
                     <input type="hidden" value="{{$id}}" name="father_id" class="form-control">
                    @endif
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
