@extends('royal_layout.main_dash.index')
@section('content')
<?php 
use App\Http\Controllers\Files\Image\ImageController;
$settings= config('royal_settings'); 
$roles = RoyalSettings::AllRoles();
$adminRoles = isset($model) ? $model->roles() : [];
?>
<div class="section-body">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<form
enctype="multipart/form-data"
action="{{
    isset($model)?Route('edit_employee',['id'=>$model->id]):
    Route('edit_employee')}}" method="post">
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

                   
                    @if (!isset($model))
                        
                    <div class="form-group">
                        <label>الباسورد</label>
                        <input type="text"  name="password" class="form-control">
                    </div>
                    <br>

                    
                  
                    @endif
                  
                  
                
                    <br>
                  
                    
                    @foreach ( $roles  as $role )

                    <div class="form-group">
                        <label>  {{$role->description}}  </label>
                        <input type="checkbox" value="{{$role->id}}"  name="roles[]" 
                        
                         @if (in_array($role->id,$adminRoles))
                             checked
                         @endif
                        >

                    </div>
                    @endforeach




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
