@extends('layouts.homepagelayout')


	<div id="container">

		<div id="header">
			@include('homepage.header')
		</div>

		<div id="about">
			@include('homepage.about')
		</div>

		<div id="services">
			@include('homepage.services')
		</div>

		<div id="testimonials">
			@include('homepage.testimonials')
		</div>

		<div id="contact">
			@include('homepage.contact')
		</div>

		<div id="footer">
			@include('partials.footer')
		</div>

	</div>
	

@end