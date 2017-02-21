@extends('layouts.pagelayout')


	<div id="container">

		<div id="header-page">
			@include('partials.nav')
		</div>


		<main class="container">

			<div class="row">
			
						
						<div class="col-md-7 leftpanel">

							<div class="videocontainer">

								<div class="innertopvideo">

										<!-- this is the default video to be displayed -->
										<div class='embed-container margin-bottom-15'>
											<iframe src='https://www.youtube.com/embed/bb_t4x-iCoM' frameborder='0' allowfullscreen></iframe>
										</div>
									
								</div>	<!-- end innertop -->

								<div class="innerbottomdescription">
									<h3>Beat the Bloat - Digestion Seminar with Susan Stephens </h3>
									<p>Learn about treating acid reflux, heartburn, malabsorption, bloating, constipation, loose stools, and even treating auto-immune! Susan takes an eastern approach to diet and healthy living, that is a little different than what you would read under the covers of chatelaine.</p>
								</div>	

							</div>

						</div>

						<div class="col-md-5 rightpanel">
						<!-- this is the thumbnail image link -- being used in the youtube api js -->		
							<div class="apiresults">
							Click a video to play from our playlist.
							<hr>	
							<!-- 	<div class="thumbcontainer">
									<div class="imgthumbcontainer">
																	
										<a href="sdfasf" id="youtube" class="bb_t4x-iCoM"><img src="http://img.youtube.com/vi/bb_t4x-iCoM/mqdefault.jpg" alt="" class="vidthumbnail"></a>
									</div>

									<div class="thumbdescriptioncontainer">
										<span class="descriptiontitle">Beat the Bloat - Digestion Seminar with Susan Stephens</span>
										<br><span class="subdescription">Susan Stephens</span>
									</div>
								</div>  -->


							</div>						

						</div>	<!-- end panel -->


	
 
			
								

				

				

			</div> <!-- col-md-12 -->	
			</div> <!-- end row -->

		</main>





		<div id="footer">
			@include('partials.footer')
		</div>

	</div>

