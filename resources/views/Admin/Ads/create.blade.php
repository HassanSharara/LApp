@extends('royal_layout.main_dash.index')
@section('content')
<div class="section-body">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <form method="POST" enctype="multipart/form-data" action="{{Route('AdsCreate_post')}}">
                @csrf
        <div class="card">
                <div class="card-header">
                    <h4>انشاء اعلان جديد</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>نسلسل الاعلان</label>
                        <input type="text" name="t" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>البريد الالكتروني للزبون</label>
                        <input type="text" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>File</label>
                        <input type="file" name="royal_image" class="form-control">
                    </div>
                    

                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">انشاء اعلان</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
