@extends ('app')

@section('content')
    @foreach($items as $item)
        {{ $item->title }} <br/>
    @endforeach

    {{var_dump($items->toArray())}}
@endsection