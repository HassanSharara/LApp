

@extends('royal_layout.main_dash.index')

@section('content')
    <?php

use App\Models\SystemModels\Notifications\Notifications;

    $counter=1;
    $model=Notifications::where('type','general')->orderby('created_at','desc')->paginate();

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
                                        <th>تفاصيل الاشعار</th>
                                        <th>حذف</th>
                                       
                                    </tr>
                                    @foreach($model as $obj)

                                        <td>{{$counter++}}</td>
                                        <td>{{$obj->title}}</td>
                                        <td>{{$obj->body}}</td>
                                        <td><a href="{{Route('notifications_delete',['id'=>$obj->id])}}" class="btn btn-danger">حذف</a></td>
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

