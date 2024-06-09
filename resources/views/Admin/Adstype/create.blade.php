@extends('royal_layout.main_dash.index')
@section('content')
<div class="section-body">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <form method="POST" enctype="multipart/form-data" action="{{Route('AdstypeCreate_post')}}">
                @csrf
        <div class="card">
                <div class="card-header">
                    <h4>انشاء نوع جديد</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>نسلسل الاعلان</label>
                        <input type="text" name="t" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>  اسم الاعلان</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label> مدة ايام الاعلان </label>
                        <input type="number" name="day" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>سعر الاعلان </label>
                        <input type="number" name="price" class="form-control">
                    </div>
                    

                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">انشاء نوع اعلاني</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
