<section >
	
<div id="about">
   	<div class="container">

   		<div class="row">

   			<div class="col-md-12 text-center">

   				

   				<h1 id="section-4">Contact</h1>	
   				<br>
   				<h2>Contact me if you have any questions or would like to book an appointment. </h2>				
   				<br>
   				<p class="firstparagraph text-center">
   					Thanks, Ill get back to you as soon possible.
   				</p>
   				<br>
   				
   				
				
   				

			


   			</div> <!-- end col 12 -->

   			
   		</div> <!-- end row -->

   			
   		@if (count($errors))
   			<div class="row">
   			
   				<div class="col-md-12">
   				
   					<div class="contacterrors center-block">

						@foreach ($errors->all() as $error)
							
							{{ $error }} <br>

						@endforeach

							<!-- {{ $errors->first('name') }} -->
					
   				</div>
   			
   			</div>
   		@endif	
   	
   			


 	<div class="row">

   			<div class="col-md-8 col-md-offset-2"  >
			
   				<div class="centerform">

	   				<br>
					<form action="/" method="POST">

					<div class="block">
						<label for="name"><p>Name:</p>
						<input type="text" name="name" value="{{ old('name') }}"></label>
					</div>

					

					
					
					<div class="block">
						<label for="name"><p>Email:</p>
						<input type="text" name="email" value="{{ old('email')}}"></label>
					</div>

					

					<div class="block">
						<label for="message"><p>Message:</p>
						<textarea rows="4" cols="50" name="message">{{ old('message')}}</textarea></label>
						
					</div>

					

					<div class="block">
						<label for="question"><p>Question: {{ $question }}</p>
						<input type="text" name="questioninput"></label>
					</div>	
					

					<div class="block">
						<label for="submit"></label>
						<button type="submit" name="submit" value="Send" class="btn btn-default">Send</button>
					</div>

					<input type="hidden" name="question" value="{{ $question }}">
					<input type="hidden" name="_token" value="{{csrf_token()}}">

				</form>

   				</div>		
   			</div><!--  end col -->

   			
   		</div>


 	</div> <!-- end container -->

 </section>	