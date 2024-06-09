@extends('royal_layout.main_dash.index')
@section('content')
<div class="section-body">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <form enctype="multipart/form-data" method="post"
                  action="{{Route('create_notifications_post')}}">
                @csrf
        <div class="card">
                <div class="card-header">
                    <h4>انشاء اشعار جديد</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>اسم اشعار</label>
                        <input name="title"  type="text" class="form-control">
                    </div>
                    <br>
                    <div class="form-group">
                        <label>وصف الاشعار</label>
                        <input name="body"  type="text" class="form-control">
                    </div>
            

                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">
                       انشاء اشعار


                    </button>
                </div>
            </div>

            </form>
        </div>
    </div>
</div>
@endsection
