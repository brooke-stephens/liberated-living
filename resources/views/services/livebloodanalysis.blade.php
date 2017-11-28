@extends('layouts.pagelayout')


	<div id="container">

		<div id="header-page">
			@include('partials.nav')
		</div>


		<main class="container">
			<div class="row">
				<div class="col-xs-12">
					<h2>Live <span class="header-orange">blood analysis</span></h2><br>
					<h3>The cells of the blood are observed on a video monitor by both the practitioner and client.</h3>
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

					<h3>Each live blood analysis session includes:</h3>
					<ul>
					<li>Health History Analysis</li>
					<li>Live Blood Analysis</li>
					<li>Stomach Acid, pH &amp; Blood Sugar Testing</li>
					<li>Muscle Testing</li>
					<li>Dietary, Lifestyle &amp; Supplement Suggestions</li>
					</ul>

					<hr>

					<div class="text-center">
						<p>
							<strong>Practitioner: Susan Stephens</strong>
							<br>$150 for 1.5 hours
						</p>
						
						
						
						<table style="margin:0px auto;">
							<tr>
								<td style="padding:0 15px 0 15px;"> 
								<form action="/#contact-me" method="post">
									<input type="hidden" name="_token" value="{{csrf_token()}}">
								    <input type="hidden" name="appointmentsubject" value="Live Blood Analysis Appointment">
								    <input type="submit" class="btn btn-primary" name="appointmentbutton" value="Email Me">
								</form>
								</td>
								<td><button class="btn btn-primary" data-toggle="modal" data-target="#acuityModal" id="appointmentButton">Book Appointment</button>
								</td>
							</tr>
						</table>

						<!-- <a href="/#contact-me" onclick="$('#contact-me').animatescroll();return false;" class="btn btn-primary">Book an appointment</a> -->
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">

					<hr>

					<h3>Live Blood Analysis can reveal:</h3>

					<ul>
					<li>vitamin/mineral deficiencies such as iron, zinc, magnesium, calcium, vitamin B12, C, folic acid and fatty acids</li>
					<li>malabsorption and slow digestion such as incomplete or delayed digestion of fats and proteins, stomach acid deficiency</li>
					<li>organ system excesses/deficiencies such as, for liver/gallbladder stress, thyroid function, adrenal fatigue, hormonal imbalance, undesirable bacteria and fungal life forms</li>
					<li>allergic reaction factors such as heavy metals, parasites, food sensitivities (eczema), candida, bowel toxicity, inflammation, leaky gut</li>
					<li>cardiovascular markers,such as high blood pressure, AGEs, blood sugar, cholesterol, uric acid, platelets and plaque</li>
					<li>immunological status such as, red blood cell coagulation, free radical damage, white blood cell profiles, viruses</li>
					</ul>

					<p>Lifestyle, dietary and supplement recommendations are given to help improve the terrain of the blood and overall health. After following the suggested protocol, repeat visits are fantastic as clients can clearly see the difference in the blood and the impact of their lifestyle and dietary choices! As Louis Pasteur stated, <strong>“The Germ is Nothing, the Terrain is Everything!”</strong></p>
				</div>
			</div>
		</main>




		<div id="footer">
			@include('partials.footer')
		</div>

@include('services.appointmentModal')


	</div>

