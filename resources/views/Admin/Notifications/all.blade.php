

@extends('royal_layout.main_dash.index')

@section('content')
    <?php

use App\Models\SystemModels\Notifications\Notifications;
use App\Http\Controllers\Files\Image\ImageController;
    $counter=1;

    ?>
    <section class="section">
        <div class="section-body">
            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>جميع الاقسام</h4>
                            <div class="card-header-action">
                                <td><a href="{{Route('create_notifications')}}" class="btn btn-primary">انشاء  اشعار جديد </a></td>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>التسلسل </th>
                                        <th>عنوان الاشعار</th>
                                        <th>الصورة </th>
                                        <th>تفاصيل الاشعار</th>
                                        <th>تعديل </th>
                                        <th>حذف</th>
                                       
                                    </tr>
                                    @foreach($model as $obj)

                                        <td>{{$counter++}}</td>
                                        <td>{{$obj->title}}</td>
                                        <?php 
                                         $images  = $obj->images;
                                        ?>
                                        <td> 
                                            @if(!empty($images))
                                            <img class="img-responsive imgcover" src="{{asset(ImageController::$uploadPath.'/'.$obj->images->first()->path)}}">                                            
                                            @endif
                                        </td>
                                        <td>{{$obj->body}}</td>
                                        <td><a href="{{Route('edit_notifications',['id'=>$obj->id])}}" class="btn btn-primary">تعديل</a></td>
                                        <td><a href="{{Route('delete_notifications',['id'=>$obj->id])}}" class="btn btn-danger">حذف</a></td>
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

