@extends('frontend.master')
@section('frontendContent')
<div class="home" style="padding: 0 10%">
@include('frontend.pages.frontend.category')
@include('frontend.pages.frontend.banner')
@include('frontend.pages.frontend.hero')
@include('frontend.pages.frontend.cards')
@include('frontend.pages.frontend.article')
@include('frontend.pages.frontend.test')
</div>
@endsection
