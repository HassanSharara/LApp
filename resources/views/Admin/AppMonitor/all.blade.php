

@extends('royal_layout.main_dash.index')

@section('content')
    <?php
use App\Models\Appdebugmonitor\AppDebugMonitor;

    $counter=1;
    $model=AppDebugMonitor::paginate();

    ?>
    <section class="section">
        <div class="section-body">
            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4> نظام مراقبة مشاكل الهواتف لدى المستخدمين</h4>
                        
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>التسلسل </th>
                                        <th>الرسالة الموجهة من نظام التطبيق</th>
                                        <th>وصف الرسالة</th>
                                        <th>الحالة</th>
                                        <th>التفاصيل</th>
                                        <th>حل التقرير</th>


                                        {{--                                        <th>تعديل</th>--}}
                                    </tr>
                                    @foreach($model as $obj)

                                        <td>{{$counter++}}</td>
                                        <td>{{$obj->msg}}</td>
                                        <td>{{$obj->description}}</td>
                                        <td>
                                            <div class="badge <?php echo $obj->status==1?"badge-success":"badge-danger"?>">{{$obj->status==1?"تم حلها":"غير محلولة"}}</div>
                                        </td>
                                       
                                        <td><a href="{{Route('specific_app_monitor',[
                                            'id'=>$obj->id])}}" class="btn btn-primary">التفاصيل</a></td>
                                            <td><a href="{{Route('solve_app_monitor',[
                                            'id'=>$obj->id])}}" class="btn btn-primary">حل </a></td>
                                     
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

