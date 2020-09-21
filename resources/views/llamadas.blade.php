@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row_justify-content-center">
        <div class="col-md-8">
        @foreach($llamadas as $llamada)
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                   <h5 class="card-title">{{$llamada -> nombre_cliente}}</h5>
                   <p class="class">
                    {{$llamada -> asunto}}
                   </p>
                </div>
            </div>
            @endforeach
            {{ $llamadas -> links() }}
        </div>
    </div>
</div>
@endsection