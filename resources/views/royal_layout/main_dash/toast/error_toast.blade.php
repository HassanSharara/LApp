@if(session('error'))

    <div class="alert">



                      <span class="alert alert-danger">
                                  {{session('error')}}

                                </span>


    </div>

@endif
