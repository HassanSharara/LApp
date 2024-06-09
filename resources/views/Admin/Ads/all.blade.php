

@extends('royal_layout.main_dash.index')
@section('content')
    <?php

use App\Models\SystemModels\Ads\Ads;

$counter=1;
    $model=Ads::paginate();

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
                                        <th>صورة الاعلان</th>
                                        <th>حذف</th>
                                       
                                        {{--                                        <th>تعديل</th>--}}
                                    </tr>
                                    @foreach($model as $Ads)

                                        <td>{{$Ads->t}}</td>

                                        <td>
                                        <br>   
                                        <img class="img-responsive imgcover" src="{{asset('files/images/'.$Ads->images->first()->path)}}">

                                        <br>
                                        </td>

                                        <td><a href="{{Route('deleteAds',['id'=>$Ads->id])}}" class="btn btn-danger">حذف</a></td>
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

