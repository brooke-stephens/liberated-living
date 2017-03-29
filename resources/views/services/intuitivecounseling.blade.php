@extends('layouts.pagelayout')


	<div id="container">

		<div id="header-page">
			@include('partials.nav')
		</div>


		<main class="container">
			<div class="row">
				<div class="col-xs-12">
					<h2>Intuitive <span class="header-orange">Counseling</span></h2><br>
					<h3>I like to say that I was KICKED into spirituality or self-awareness from a lifetime of self-sabotage, guilting, minimiZing and shaming myself.</h3>
					<p>At my crossroads, it was as if the universe presented me the choice of 1) continuing with a familiar painful life that was no longer bringing me happiness but rather was destroying my relationships, my work and most notably, my self-worth or 2) giving up the life I knew, the person I knew myself as, and confronting my deepest, darkest fears, to hopefully create a life and a person that was more resilient and radiant than the woman I left behind. Having the courage to look within and explore the seemingly, scary unknown, triggered an awakening that brought more peace, balance and bliss, than I could have ever imagined. Since that moment, I’ve wanted everyone to experience that sense of liberation and empowerment for themselves.</p>
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

					<h3>My Coaching and Intuitive counseling includes:</h3>
					<ul>
						<li>Empowerment, Relationship & Breakthrough Coaching</li>
						<li>Eradicate limiting and self-sabotaging beliefs</li>
					
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
								    <input type="hidden" name="appointmentsubject" value="Intuitive Counseling Appointment">
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

					<h3>There are many who would benefit from Intuitive Counseling, including those that experience:</h3>
					<ul>
						<li>The longing for something more</li>
						<li>Unfulfilled expectations</li>
						<li>Grief, depression or sadness</li>
						<li>Feelings of low self-worth, abandonment or rejection</li>
						<li>Stressful living</li>
						<li>Anxiety, fears and phobias</li>
						<li>Repeating destructive habits or addictions</li>
						<li>Mental health issues or trauma</li>
						<li>Sexual abuse</li>
						<li>Quest for personal growth and overcoming limitations</li>
						<li>Body image issues and dieting</li>
						<li>Life changes (work, divorce, death)</li>
					</ul>
					<p>Awareness is to have consciousness over ones emotions, thoughts and feelings and to recognize oneself as the observer of these. In being aware, one can see the origin of their own suffering and when seeing clearly, negative patterns fall away. Awareness helps you KNOW yourself.</p>
					<h3>Therapeutic methods and areas of focus include:</h3>
					<ul>
						<li>Developing presence and awareness</li>
						<li>Coping skills and harm reduction with addiction</li>
						<li>Voice dialoguing and role-play</li>
						<li>Identification of needs and moment to moment self-expression</li>
						<li>Inner child work</li>
						<li>Understanding your archetypes</li>
						<li>Embracing your shadow-self to cultivate self-acceptance and love.</li>
						<li>Cognitive Behavioral Therapy</li>
						<li>Meditation</li>
						<li>The importance of nutrition exercise in well-being</li>
						<li>Reiki/Energy Work</li>
						<li>Chakra balancing</li>
						<li>Experiential Intuitive Counseling</li>
						<li>Identifying EGO, voice recognition therapy, separating EGO from SELF</li>
						<li>Working with fear and guilt</li>
						<li>Knowing when to surrender when to step up</li>
						<li>Developing empowering habits and work-life balance</li>
						<li>Discovering resentments and working towards forgiveness</li>
						<li>Support groups</li>
						<li>Resolving issues with parents – family sculpting</li>
						<li>Breathwork</li>
						<li>Taking personal responsibility and overcoming blame</li>
						<li>The Work (questioning beliefs/story)</li>
						<li>Boundary setting to establish self-worth</li>
					</ul>
					<p>Come and work symbiotically with me to explore your authentic radiant self and true nature.</p>

				</div>
			</div>
		</main>





		<div id="footer">
			@include('partials.footer')
		</div>

		@include('services.appointmentModal')

	</div>
