@extends('royal_layout.main_dash.index')
@section('content')
<div class="section-body">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div class="card">
                <div class="card-header">
                    <h4>{{}}</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Text</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>File</label>
                        <input type="file" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="d-block">Checkbox</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                Checkbox 1
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="defaultCheck3">
                            <label class="form-check-label" for="defaultCheck3">
                                Checkbox 2
                            </label>
                        </div>
                    </div>

                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                    <button class="btn btn-secondary" type="reset">Reset</button>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection
