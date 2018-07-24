@extends('layouts.pagelayout')


	<div id="container">

		<div id="header-page">
			@include('partials.nav')
		</div>


		<main class="container">
			<div class="row">
				<div class="col-xs-12">
					<h2>Reiki <span class="header-orange">and Energy</span></h2><br>
					<h3>Reiki (ray-key) is a technique that aids the body in releasing stress and tension by creating deep relaxation.</h3>
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

					<h3>Reiki/Energy Work includes:</h3>
					<ul>
						<li>Energy Work to Improve Qi and Health</li>
						<li>Inner Child Work to Release & Transform Perception</li>	
						<li>Chakra Balancing to Bring Peace & JOY</li>					
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
								    <input type="hidden" name="appointmentsubject" value="Reiki and Energy Appointment">
								    <input type="submit" class="btn btn-primary" name="appointmentbutton" value="Email Me">
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
					<h3>What can Reiki do?</h3>
					<p>Reiki means ‘spiritually guided life force energy.’
					Because of this, Reiki promotes healing and health. The Reiki system of healing is a technique for transmitting this subtle energy to yourself and others through the hands into the human energy system. Reiki restores energy balance and vitality by relieving the physical and emotional effects of unreleased stress. It gently and effectively opens blocked meridians, nadas and chakras, and clears the energy bodies, leaving one feeling relaxed and at peace.</p>

					<h3>Reiki can:</h3>

					<ul>
						<li>Accelerate healing</li>
						<li>Assist the body in cleansing toxins</li>
						<li>Balance the flow of subtle energy by releasing blockages</li>
						<li>Help the client contact the ‘healer within.’</li>
					</ul>

					<p>Many people are practicing techniques to <strong>improve their health such as meditation, exercise and improved diet.</strong> As this is done, a deeper awareness often develops concerning the flow of subtle energies in and around the body and the connection between these subtle energies and one’s health. This developing awareness validates the ancient idea of ‘life force energy’ as the cause of health and its lack as the cause of illness. The existence of ‘life force energy’ and the necessity for it to flow freely in and around one’s body to maintain health has been studied and acknowledged by health care practitioners as well as scientists.</p>
				</div>
			</div>
		</main>





		<div id="footer">
			@include('partials.footer')
		</div>

		@include('services.appointmentModal')

	</div>
