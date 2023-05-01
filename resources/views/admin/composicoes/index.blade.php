@extends('layouts.admin-base')

{{--
@section('fun_facts')
<x-dash-base.fun-fact color="#36bd78" icon="feather-trending-up">
    <span>Images Used</span>
    <h4> 2,611 <small>/ 5,000</small></h4>
</x-dash-base.fun-fact>

<x-dash-base.fun-fact color="#22b8c8" icon="feather-bar-chart-2">
        <span>Images Used</span>
        <h4> 2,611 <small>/ 5,000</small></h4>
</x-dash-base.fun-fact>

<x-dash-base.fun-fact color="#efa80f" icon="feather-headphones">
        <span>Speech to Text</span>
        <h4> 5 <small>/ 10</small></h4>
</x-dash-base.fun-fact>
@endsection
--}}

@section('content')
    {{-- @include('admin.main-dashboard.chart') --}}
    <x-dash-base.content-card icon="feather-bar-chart-2" headline="Composicoes">
        <div>
            <h3>Composicoes</h3>

            <ul>
                @foreach ($composicoes as $composicao)
                    <li>{{ $composicao->id }}</li>
                @endforeach
            </ul>
        </div>
    </x-dash-base.content-card>
@endsection
