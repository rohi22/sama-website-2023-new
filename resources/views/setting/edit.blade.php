@if(session('role') == 2)
   <script type="text/javascript">window.location = "<?php echo asset('/dashboard'); ?>"</script>
@endif
@extends('app.app')

@section('content')
   <div class="md-card light-bg" style="overflow: hidden">
        <div class="md-card-toolbar" >
            <div class="md-card-toolbar-actions">
                <a href="{{url('/home-slider-list')}}"><i class="md-icon material-icons ">list</i></a>
            </div>
            <h4>Update Home Slider</h4>
        </div>
        <div class="md-card-content" >
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    @include('app.alerts')
                </div>
                <div class="col-md-8 col-md-offset-2">
                    <form action="{{url('/home-slider/edit/'.$data->id)}}" method="post" enctype="multipart/form-data">{{csrf_field()}}
                        <div class="form-group">
                            <small >First Title</small>
                            <textarea class="form-control input-sm"  name="h_first" value="{{ $data->h_first }}">{{ $data->h_first }}</textarea>
                        </div>
                        <div class="form-group">
                            <small >Second Title</small>
                            <textarea class="form-control input-sm"  name="h_second" value="{{ $data->h_second }}">{{ $data->h_second }}</textarea>
                        </div>
                        <div class="form-group">
                            <small >Third Title</small>
                            <textarea class="form-control input-sm"  name="h_third" value="{{ $data->h_third }}">{{ $data->h_third }}</textarea>
                        </div>
                        <div class="form-group">
                            <small >Fourth Title</small>
                            <textarea class="form-control input-sm"  name="h_fourth" value="{{ $data->h_fourth }}">{{ $data->h_fourth }}</textarea>
                        </div>
                        <div class="form-group">
                            <small >Fifth Title</small>
                            <textarea class="form-control input-sm"  name="h_fifth" value="{{ $data->h_fifth }}">{{ $data->h_fifth }}</textarea>
                        </div>
                        <div class="form-group">
                            <a href="{{url('/home-slider-list')}}" class="btn btn-default" >Cancel</a>
                            <input title="" type="submit" class="btn btn-success" value="Update">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('page-scripts')
    <script>
        $(document).ready(function() {
            $("select").select2();
        });
        
    </script>
@endsection

