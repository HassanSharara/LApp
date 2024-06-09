@extends('royal_layout.main_dash.index')
@section('content')
    
                  <div class="card-body">
                    <div id="wizard_horizontal">
                      <h2>The Message from The App</h2>
                      <section>
                        <p>{{$model->msg}}
                        </p>
                      </section>
                      <h2>Rhe Description</h2>
                      <section>
                        <p>{{$model->description}}</p>
                      </section>
                      <h2>The Device information</h2>
                      <section>
                        <p> {{$model->device_info}}</p>
                      </section>
                      <h2>The Date Of Issue</h2>
                      <section>
                        <p>{{$model->created_at}}</p>
                      </section>
                    </div>
                  </div>
           
           
@endsection
