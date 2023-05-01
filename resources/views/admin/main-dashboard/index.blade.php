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
    <x-dash-base.content-card icon="feather-bar-chart-2" headline="Alguma coisa">
        <div>
            <h3>sdsdf</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id facere deleniti sint iusto explicabo, rerum itaque ducimus impedit ad
                vel quae aut fuga eligendi eum nobis, praesentium numquam autem dicta voluptatem sapiente ipsum quia incidunt harum minus?
                Dolorum debitis, neque esse autem ratione ex. Debitis animi nostrum cumque velit perferendis.</p>
        </div>
    </x-dash-base.content-card>
@endsection
