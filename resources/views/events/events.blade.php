<style type="text/css">
<!--
.display_archive {font-family: arial,verdana; font-size: 12px;}
.campaign {line-height: 125%; margin: 5px;}
//-->
</style>
<!-- <script language="javascript" src="//webchef.us15.list-manage.com/generate-js/?u=179e9d4027c1da31e57b91c87&fid=1427&show=10" type="text/javascript"></script> -->


@extends('layouts.pagelayout')


	<div id="container">

		<div id="header-page">
			@include('partials.nav')
		</div>


		<main class="container">
			
			<div id="list">
			<?php


			$ch = curl_init();
			$url = "http://us7.campaign-archive1.com/?u=d2b3969cfcfb8355ef46a41e5&id=5719a337fe";
			$listurls = "http://us7.campaign-archive2.com/home/?u=d2b3969cfcfb8355ef46a41e5&id=8a1fd5b0c4";
			// $listurls = "Email Campaign Archive";

			curl_setopt($ch, CURLOPT_URL, $listurls);
			//return the transfer as a string 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	
			// $output contains the output string 
           $output = curl_exec($ch); 
           $list = strstr($output, '<ul id="archive-list">');
           print_r($list);
         

		
			curl_close($ch);

			$homepage = @file_get_contents($url);
			// ---------this checks the 2 different formats of mailchimp and if it finds the following snippet will display the page. --------
			
			$croppedcontent3 = strstr($homepage, '<!-- // Begin Module: Standard Preheader \ -->');
			$croppedcontent4 = strstr($homepage, '<!-- BEGIN TEMPLATE // -->');

			// echo $croppedcontent4;




			?>
			</div>

			<div id="insert"></div>

		</main>

		<div class="tst">asdf</div>
		


		<div id="footer">
			@include('partials.footer')
		</div>




<script type="text/javascript">			
			

			let container = document.querySelector('#insert')	

			let dateArray = [];
			let urlArray =[];
			let titleArray =[];
					
			var arr = document.querySelectorAll('#archive-list li');
			var arrUrl = document.querySelectorAll('#archive-list li a');
			var titleArr = document.querySelectorAll('#archive-list li a');

			for (var i = 0; i < arr.length; i++) {
			     // container.innerHTML += '<li>' + arr[i].textContent.substring(0,10) + '</li>';
			     dateArray.push(arr[i].textContent.substring(0,10));
			     urlArray.push(arrUrl[i].getAttribute('href'));
			     titleArray.push(titleArr[i].textContent);


			     container.innerHTML += '<li>' + dateArray[i] +  urlArray[i] + titleArray[i] +'</li>';	

			}

			  


		
</script>




	</div>
