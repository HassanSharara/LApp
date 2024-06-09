@extends('royal_layout.main_dash.index')
@section('content')
<div class="section-body">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<form action="{{Route('create_country_post')}}" method="post">
    @csrf
        <div class="card">
                <div class="card-header">
                    <h4>انشاء دولة جديدة</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>اسم الدولة</label>
                        <input type="text" value="{{$country->name??""}}" name="name" class="form-control">
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">
                        @if(isset($country))
                            تعديل الدولة
                        @else
                            انشاء دولة
                        @endif
                    </button>
                </div>
            </div>
</form>
        </div>
    </div>
</div>
@endsection
