

@extends('royal_layout.main_dash.index')
@section('content')
    <?php

use App\Models\System\Category\Category;
use App\Http\Controllers\Files\Image\ImageController;
use App\Models\System\Order\Order;




    $counter=1;
    $model=Order::orderBy('created_at')->paginate();

    
    
    ?>

        <div class="section-body">
            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>جميع الطلبات    =   {{$model->total()}}</h4>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>التسلسل </th>
                                        <th>رقم الزبون</th>
                                        <th>عنوان الزبون</th>
                                        <th>اسم الخدمة</th>
                                        <th> تكلفة الخدمة </th>
                                        <th> التاريخ بلتفصيل   </th>
                                        <th> الجي بي اس</th>
                                        <th>  الحالة  </th>
                                        <th>  تعديل  </th>
                                       

                                        {{--                                        <th>تعديل</th>--}}
                                    </tr>
                                    @foreach($model as $m)

                                        <td>{{$counter++}}</td>
                                        <td>{{$m->phone}}</td>
                                        <td>{{$m->address}}</td>
                                        <td>{{$m->s_name}}</td>
                                        <td>{{$m->s_price}}</td>
                                        <td>{{$m->created_at}}</td>
                                        
                                      
                                        @if($m->lat==null || $m->long==null)  
                                        
                                        
                                        <td> لم يقم بتحديد الموقع عبر الجي بي اس</td>

                                        @else 

                                        <td>
                                        <a href="{{ 'https://www.google.com/maps/search/?api=1&query=' . $m->lat . ',' . $m->long }}"
                                        target="_blank"
                                        class="btn btn-primary">تتبع المكان عبر الخارطة</a>


                                        @endif


                                        @if($m->status==1)  
                                        
                                        
                                        <td> تمت بنجاح</td>
                                        <td> <a href="{{Route('update_order_status',[
                                            'id'=>$m->id
                                            ])}}"
                                        target="_blank"
                                        class="btn btn-danger">الغاء</a></td>

                                        @else 

                                        <td> غير مكتملة </td>
                                        <td><a href="{{Route('update_order_status',[
                                            'id'=>$m->id
                                            ])}}"
                                        target="_blank"
                                        class="btn btn-success">اتمام</a></td>
                                        @endif
                                        
                                 
                                        
                                 

                                           
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

