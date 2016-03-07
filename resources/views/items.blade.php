@extends ('app')

@section('content2')
    @foreach($items as $item)
        {{ $item->title }} <br/>
    @endforeach

    {{var_dump($items->toArray())}}
@endsection