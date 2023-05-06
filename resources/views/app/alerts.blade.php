@if(session()->has('message'))
        <div class="uk-alert uk-alert-success" data-uk-alert="">
            <a href="#" class="uk-alert-close uk-close"></a>
            {{ session()->get('message') }}
        </div>
@endif
@if(session()->has('message_danger'))
        <div class="uk-alert uk-alert-danger" data-uk-alert="">
            <a href="#" class="uk-alert-close uk-close"></a>
            {{ session()->get('message_danger') }}
        </div>
@endif

@if(session()->has('alert'))
    <div class="uk-alert uk-alert-danger" data-uk-alert="">
        <a href="#" class="uk-alert-close uk-close"></a>
        {{ session()->get('alert') }}
    </div>
@endif

@if(count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="uk-alert uk-alert-danger" data-uk-alert="">
            <a href="#" class="uk-alert-close uk-close"></a>
            {{$error}}
        </div>
    @endforeach
@endif