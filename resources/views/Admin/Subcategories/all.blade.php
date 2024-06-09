

@extends('royal_layout.main_dash.index')

@section('content')
    <?php

use App\Models\System\Category\Category;
use App\Http\Controllers\Files\Image\ImageController;
    $counter=1;
    $model=Category::where('father_id',$id)->paginate();

    ?>
    <section class="section">
        <div class="section-body">
            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4> الاقسام الفرعية</h4>
                            <div class="card-header-action">
                                <td><a href="{{Route('create_subcategory',[
                                    'id'=>$id])}}" class="btn btn-primary">انشاء  قسم جديد </a></td>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>التسلسل </th>
                                        <th>اسم القسم الفرعي</th>
                                        <th>وصف القسم الفرعي</th>
                                        <th> السعر  </th>
                                        <th>صورة القسم</th>
                                        <!-- <th>الاقسام النهائية</th> -->
                                        <th>الحالة</th>
                                        <th>تعديل</th>
                                        <th>حذف</th>
                                        {{--                                        <th>تعديل</th>--}}
                                    </tr>
                                    @foreach($model as $obj)

                                        <td>{{$counter++}}</td>
                                        <td>{{$obj->name}}</td>
                                        <td>{{$obj->description}}</td>
                                        <td>{{$obj->price}}</td>
                                            
                                        </td>
                                        <td>
                                            
                                        @if(count($obj->images)>0)
                                        <img class="img-responsive imgcover" src="{{asset(ImageController::$uploadPath.'/'.$obj->images->first()->path)}}">
                                        @endif
                                        </td>
<!-- 
                                        <td><a href="{{Route('sections',[
                                            'id'=>$obj->id])}}" class="btn btn-primary">الاقسام النهائية</a></td> -->
                                        
                                        <td>
                                            <div class="badge <?php echo $obj->status==1?"badge-success":"badge-danger"?>">{{$obj->status==1?"نشط":"غير نشط"}}</div>
                                        </td>
                                        <td><a href="{{Route('edit_subcategory',[
                                            'id'=>$obj->id])}}" class="btn btn-primary">تعديل</a></td>
                                        <td><a href="{{Route('delete_subcategory',[
                                            'id'=>$obj->id])}}" class="btn btn-danger">حذف</a></td>
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
    </section>
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

