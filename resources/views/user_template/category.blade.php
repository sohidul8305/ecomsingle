@extends('user_template.layouts.template')
@section('main-content')
<h2>{{ $category->category_name }} - {{ $category->product_count }}</h2>
@endsection()