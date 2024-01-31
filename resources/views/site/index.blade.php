@extends("site.layouts.app")

@section('title', "Felipe Peretta")

@section("content")
	@include("site.layouts.partials.home.slidebanners")
	@include("site.layouts.partials.home.services")
	@include("site.layouts.partials.home.latest")
	@include("site.layouts.partials.home.testimonials")
@endsection