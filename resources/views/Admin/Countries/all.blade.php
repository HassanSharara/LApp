

@extends('royal_layout.main_dash.index')
@section('content')
    <?php

use App\Models\System\Country\Country;

    $counter=1;
    $countries=Country::paginate();

    ?>
        <div class="section-body">
            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>جميع البلدان</h4>

                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>التسلسل </th>
                                        <th>اسم البلد</th>
                                        <th>الحالة</th>
                                        <th>عدد المحافظات</th>
                                        <th> المحافظات</th>
                                        <th>تعديل</th>
                                        {{--                                        <th>تعديل</th>--}}
                                    </tr>
                                    @foreach($countries as $country)

                                        <td>{{$counter++}}</td>
                                        <td>{{$country->name}}</td>



                                        <td>
                                            <div class="badge <?php echo $country->status==1?"badge-success":"badge-danger"?>">{{$country->status==1?"نشط":"غير نشط"}}</div>
                                        </td>
                                        <td>{{count($country->childs)}}</td>

                                        <td><a href="{{Route('cities',[
                                            'id'=>$country->id
                                            ])}}" class="btn btn-primary"> المحافظات </a></td>
                                        <td><a href="" class="btn btn-primary">تعديل</a></td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{$countries->links()}}

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

