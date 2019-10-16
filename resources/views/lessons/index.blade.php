@extends('layouts.app')

@section('title', 'Index')

@section('content')
<div class="col-xs-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3">
    <div class="list-group">
        
        <a href="#" class="list-group-item list-group-item-action active">
        Index
        </a>
        @foreach($lessons as $index => $lesson)
        @if($lesson['label'] != 'index')

        <a href="{{ url('/lessons/' .  $lesson['view']) }}" class="list-group-item list-group-item-action">
            <span class="badge badge-info badge-pill">{{ $index + 1 }}</span>
            {{ $lesson['label'] }}
        </a>
        @endif
        @endforeach
    </div>
</div>
@endsection
