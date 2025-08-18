@extends('layouts.web')
@section('content')

    @include('components.hero-section')



    @include('components.trusted-clients-section')




    @include('components.our-services-section')

    @include('components.our-work-section', ['portfolios' => $response['portfolios']])

    @include('components.creative-tools-section')

    @include('components.how-it-work-section')

    @include('components.our-achievements-section')

    @include('components.cta-section')

   

    @include('components.testimonials-section')

    



@endsection