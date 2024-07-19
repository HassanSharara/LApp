@extends('royal_layout.main_dash.index')
@section('content')
<?php
use App\Http\Controllers\Files\Image\ImageController;

$modelExist = isset($model);
?>
<div class="section-body">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <form enctype="multipart/form-data" method="post"
                  action="{{
                  $modelExist?
                  Route('edit_notifications',["id"=>$model->id]):
                  Route('create_notifications')
                  }}">
                @csrf
        <div class="card">
                <div class="card-header">
                    <h4>انشاء اشعار جديد</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>اسم اشعار</label>
                        <input name="title" value="{{$model->title??""}}" type="text" class="form-control">
                    </div>
                    <br>
                    <div class="form-group">
                        <label>وصف الاشعار</label>
                        <input name="body"  value="{{$model->body??""}}"type="text" class="form-control">
                    </div>

                    <br>
                    <?php 
                    $image = $model->images->first();
                    ?>
                    <div class="from-group">
                        
                    @if(!empty($images))
                        <label>تبديل صورة القسم</label>
                       <br>
                        <td><img class="img-responsive imgcover" src="{{asset(ImageController::$uploadPath.'/'.$image->path)}}">
                        <br>
                        <br>
                    @endif



                    <input type="file" name="royal_image" class="form-control">
                    </div>

                </div>

                <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">
                     {{
                        $modelExist?
                        "تعديل":
                        "انشاء الاشعار"
                     }}
                    </button>
                </div>
            </div>

            </form>
        </div>
    </div>
</div>
@endsection
