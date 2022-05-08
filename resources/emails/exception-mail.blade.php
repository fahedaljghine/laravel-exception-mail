@if(is_object($route))
<div>
    <span>route : </span> {{$route->uri}}
    <h3>parameters</h3>
    @foreach($route->parameters as $key => $value)
        <span>{{$key}} : </span> {{$value}}
    @endforeach
</div>
@endif

<div>
    {!! $content !!}
</div>