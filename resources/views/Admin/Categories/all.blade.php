

@extends('royal_layout.main_dash.index')
@section('content')
    <?php

use App\Models\System\Category\Category;
use App\Http\Controllers\Files\Image\ImageController;

    $counter=1;
    $model=Category::paginate();
    
    ?>

        <div class="section-body">
            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>جميع التخصصات</h4>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>التسلسل </th>
                                        <th>اسم التخصص</th>
                                        <th>وصف التخصص</th>
                                        <th>صورة التخصص</th>
                                        <th>الحالة</th>
                                        <th> الاقسام</th>
                                        <th>تعديل</th>
                                        <th>حذف</th>

                                        {{--                                        <th>تعديل</th>--}}
                                    </tr>
                                    @foreach($model as $m)

                                        <td>{{$counter++}}</td>
                                        <td>{{$m->name}}</td>
                                        <td>{{$m->description}}</td>
                                        
                                      
                                        <td>
                                        @if(count($m->images))   
                                        <br>
                                        <img class="img-responsive imgcover" src="{{asset(ImageController::$uploadPath.'/'.$m->images->first()->path)}}">
                                        <br>
                                        @endif
                                        </td>



                                        <td>
                                            <div class="badge <?php echo $m->status==1?"badge-success":"badge-danger"?>">{{$m->status==1?"نشط":"غير نشط"}}</div>
                                        </td>
                                 

                                        <td><a href="{{Route('subcategories',[
                                            'id'=>$m->id
                                            ])}}" class="btn btn-primary"> الاقسام</a></td>
                                        <td><a href="
                                        {{Route('edit_category',[
                                            'id'=>$m->id
                                            ])}}" class="btn btn-primary">تعديل</a></td>
                                            <td><a href="
                                        {{Route('delete_category',[
                                            'id'=>$m->id
                                            ])}}" class="btn btn-danger">حذف</a></td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{$model->links()}}

        </div>

@endsection
<style>

    .w-5{
        display: none;
        background: black;

    }
    /*.pics_listsize{*/

    /*    max-height: 120px;*/
    /*    max-width: 200px;*/
    /*}*/
    /*.imgcover{*/
    /*    height: 150px;*/
    /*    width: 220px;*/
    /*}*/
</style>

