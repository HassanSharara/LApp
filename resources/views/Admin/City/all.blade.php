

@extends('royal_layout.main_dash.index')
@section('content')
    <?php

use App\Models\System\City\City;

    $counter=1;
    $countries=City::where('father_model',$id)->paginate();
    ?>
    <section class="section">
        <div class="section-body">
            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>جميع المحاظفات</h4>

                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                       
                                        <th>التسلسل </th>
                                        <th>اسم المحافظة</th>
                                        <th>الحالة</th>
                                       
                                        {{--                                        <th>تعديل</th>--}}
                                    </tr>
                                    @foreach($countries as $country)

                                        <td>{{$counter++}}</td>
                                        <td>{{$country->name}}</td>

                                        <td>
                                            <div class="badge <?php echo $country->status==1?"badge-success":"badge-danger"?>">{{$country->status==1?"نشط":"غير نشط"}}</div>
                                        </td>
                                    
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

