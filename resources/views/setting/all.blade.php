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
            <h4>All Sliders</h4>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <form action="{{url('/home-slider-back-img/new')}}" method="post" enctype="multipart/form-data">{{csrf_field()}}
                <div class="form-group col-md-4">
                    <small>Upload Background Image</small>
                    <input type="file" class="form-control input-sm"  name="home_slider_back_img" id="files">
                </div>
                <div class="form-group col-md-4">
                    <small >Background Image</small>
                    <img src="{{asset('uploads/'.$home_back_img->home_slider_back_img)}}" style="width:100%:height:50%;" id="image">
                </div>
                <div class="form-group col-md-8 col-md-offset-6">
                    <input title="" type="submit" class="btn btn-success" value="Upload">
                </div>
            </form>
        </div>
        <div class="md-card-content" >
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    @include('app.alerts')
                </div>
                <div class="col-md-8 col-md-offset-2">
                     <div class="row">
                        <a href="{{url('/home-slider/new')}}"><i class="fa fa-plus" style="font-size:25px"></i></a>
                   </div>
                    <table id="dt_tableExport" class="uk-table" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>First Title</th>
                            <th>Second Title</th>
                            <th>Third Title</th>
                            <th>Fourth Title</th>
                            <th>Fifth Title</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody><?php $no=0 ?>
                        @foreach($sliders as $i)<?php $no++ ?>
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$i->h_first}}</td>
                            <td>{{$i->h_second}}</td>
                            <td>{{$i->h_third}}</td>
                            <td>{{$i->h_fourth}}</td>
                            <td>{{$i->h_fifth}}</td>
                            <td><a href="{{url('/home-slider/edit/'.$i->id)}}"><i class="fas fa-pencil-alt" style="color:#39f;padding:5px;"></i></a>
                              <a onclick="remove({{$i->id}})"><i class="far fa-trash-alt" style="color:red;padding:5px;"></i></a></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

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
        function remove(id){
            let r = confirm("Are you sure?" );
            if (r === true) {
                window.location="<?php echo url('/home-slider/delete/'); ?>"+id;
            }
        }

        document.getElementById("files").onchange = function () {
            var reader = new FileReader();

            reader.onload = function (e) {
                // get loaded data and render thumbnail.
                document.getElementById("image").src = e.target.result;
            };

            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        };
    </script>

@endsection

