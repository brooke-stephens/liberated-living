@extends('layouts.pagelayout')


	<div id="container">

		<div id="header-page">
			@include('partials.nav')
		</div>


		<main class="container">
			<div class="row">
				<div class="col-xs-12">
					<h2>Workshops<span class="header-orange"> and Classes</span></h2><br>
					<h3>These workshops are ALL about bringing BALANCE to your BODY, Mind, WEighT & SPIRIT!</h3>
					<br>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class='embed-container margin-bottom-15'>
						<iframe src='https://www.youtube.com/embed/bb_t4x-iCoM' frameborder='0' allowfullscreen></iframe>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

					<h3>My workshops and classes include:</h3>
					<ul>
					
						<li>Family sessions</li>
						<li>Group sessions</li>
					</ul>

					<hr>

					<div class="text-center">
						<p>
							<strong>Practitioner: Susan Stephens</strong>
							<br>$100 for 1.0 hours
						</p>
						
							<table style="margin:0px auto;">
							<tr>
								<td style="padding:0 15px 0 15px;"> 
								<form action="/#contact-me" method="post">
									<input type="hidden" name="_token" value="{{csrf_token()}}">
								    <input type="hidden" name="appointmentsubject" value="Workshop Appointment">
								    <input type="submit" class="btn btn-primary" name="appointmentbutton" value="Have a Question?">
								</form>
								</td>								
								<td><button class="btn btn-primary" data-toggle="modal" data-target="#acuityModal" id="appointmentButton">Book Appointment</button>
								</td>
							</tr>
						</table>
						
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">

					<hr>
					<h3>My Workshops:</h3>
					<p>I have found out along my travels that you cannot address diet without addressing mind. The biggest reason I receive for WHY people can’t stick to a healthy eating plan is DUE to STRESS and IMBALANCE, approximately 90% of clients say this. So this class is designed to give you the tools to better deal with life’s ups and downs, to make the ride a little less bumpy and subsequently, make food choices, a little more easy! When I look at the blood, STRESS can have TWICE the negative impact that food has, so it seems RidiCuLous to ME to only FOCUS on EATING your veggieS, when <strong>our ultimate goal is to learn HOW to sTAY Calm, Cool & Collected!</strong> As they say in Chinese Medicinbce, we must nourish our heart, mind, and spirit.</p>

					<p>In these classes, we will cover:</p>

					<h3>The Fundamentals of Nutrition – Digestion Digestion Digestion</h3>

					<ul>
						<li>Learn why stomach acid is first and foremost to proper digestion. Do you have enough?</li>
						<li>Eliminate gas, bloating, weight gain, arthritis, depression, auto-immune conditions and a host of other conditions.</li>
						<li>How to get Regular and Why is it SOOOO Important!</li>
						<li>The BAsic Supplementation Probiotics, Fiber, Fish Oils Enzymes + OThers</li>
					</ul>
						<br>
						<h3>Mini Cooking Class Lunch</h3>
					<ul>
						<li>1 hr Cooking Class on Increasing ALKALINITY with diet. Learn DIPS, a vegetarian meal a simply DIVINE dessert</li>
						<li>Take home recipes!!!</li>
						<li>What to have in your kitchen to make EATING VEggies EASY!</li>
					</ul>
						<br>
						<h3>More JOY Less STRESS</h3>
					<ul>
						<li>Learn how to reduce stress instantly with Emotional Freedom Technique and Awareness</li>
						<li>Discover that SELF-LOVE and SELF-WORTH is <em>pre-requisite</em> to a BALANCED WEIGHT, HEART MIND.</li>
						<li>Learn how to make meditation easy!</li>
					</ul>
				</div>
			</div>
		</main>





		<div id="footer">
			@include('partials.footer')
		</div>

		@include('services.appointmentModal')

	</div>
