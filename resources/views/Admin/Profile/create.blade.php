@extends('royal_layout.main_dash.index')
@section('content')
<?php 
use App\Http\Controllers\Files\Image\ImageController;
?>
<div class="section-body">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<form
enctype="multipart/form-data"
action="{{Route('edit_profile')}}" method="post">
    @csrf
        <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>اسم الموظف</label>
                        <input type="text" value="{{$model->name??""}}" name="name" class="form-control">
                    </div>
                    <br>
                  
                    <div class="form-group">
                        <label>البريد الالكتروني </label>
                        <input type="text" value="{{$model->email??""}}" name="email" class="form-control">
                    </div>
                    <br>
                  
                    <br>
                  
                    <div class="form-group">
                        <label>رقم الهاتف  </label>
                        <input type="text" value="{{$model->phone??""}}" name="phone" class="form-control">
                    </div>
                    <br>

                   
                 
                        
                    <div class="form-group">
                        <label>كلمة السر القديمة</label>
                        <input type="text"  name="old_password" class="form-control">
                    </div>
                    <br>

                        
                    <div class="form-group">
                        <label>كلمة السر الجديدة</label>
                        <input type="text"  name="password" class="form-control">
                    </div>
                    <br>

                    
                  
                    
                  
                  
                
                    <br>
                  
                

                  
                
                </div>
               
                <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">
                        @if(isset($model))
                            تعديل 
                        @else
                            انشاء 
                        @endif
                    </button>
                </div>
            </div>
</form>
        </div>
    </div>
</div>
@endsection
