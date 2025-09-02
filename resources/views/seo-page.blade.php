@extends('layouts.web')

@section('content')
	<!-- Page Header Start -->
	<div class="page-header bg-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<!-- Page Header Box Start -->
					<div class="page-header-box">
						<h1 class="text-anime-style-2" data-cursor="-opaque">{{ $response['seoPage']->title }}</h1>
						<nav class="wow fadeInUp" data-wow-delay="0.25s">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('home') }}">home</a></li>
								<li class="breadcrumb-item active" aria-current="page">{{ $response['seoPage']->title }}</li>
							</ol>
						</nav>
					</div>
					<!-- Page Header Box End -->
				</div>
			</div>
		</div>
	</div>
	<!-- Page Header End -->

	<!-- Page Single Post Start -->
	<div class="page-single-post">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<!-- Post Featured Image Start -->
					@if($response['seoPage']->featured_image)
					<div class="post-image">
						<figure class="image-anime reveal">
							<img src="{{ asset($response['seoPage']->featured_image) }}" alt="{{ $response['seoPage']->title }}">
						</figure>
					</div>
					@endif
					<!-- Post Featured Image End -->

					

					<!-- Post Single Content Start -->
					<div class="post-content">
						<!-- Post Entry Start -->
						<div class="post-entry">
							{!! $response['seoPage']->content !!}
						</div>
						<!-- Post Entry End -->

						<!-- Post Tag Links Start -->
						<div class="post-tag-links">
							<div class="row align-items-center">
								<div class="col-lg-8">
									<!-- left side reserved for future tags/links -->
								</div>

								<div class="col-lg-4">
									<!-- Post Social Links Start -->
									<div class="post-social-sharing wow fadeInUp" data-wow-delay="0.5s">
										<ul>
											<li><a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" rel="noopener"><i class="fa-brands fa-facebook-f"></i></a></li>
											<li><a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->url()) }}" target="_blank" rel="noopener"><i class="fa-brands fa-linkedin-in"></i></a></li>
											<li><a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($response['seoPage']->title) }}" target="_blank" rel="noopener"><i class="fa-brands fa-x-twitter"></i></a></li>
											<li><a href="https://wa.me/?text={{ urlencode($response['seoPage']->title . ' ' . request()->url()) }}" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp"></i></a></li>
										</ul>
									</div>
									<!-- Post Social Links End -->
								</div>
							</div>
						</div>
						<!-- Post Tag Links End -->
					</div>
					<!-- Post Single Content End -->
				</div>
			</div>
		</div>
	</div>
	<!-- Page Single Post End -->
@endsection


