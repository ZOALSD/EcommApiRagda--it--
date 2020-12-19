@extends('admin.index')
@section('content')

    @livewire('manger-controller')

@endsection

<style>
    .page-footer {
        bottom: 0px;
        position: absolute;
        right: 20px;
    }

</style>
