
	// init controller
	var controller = new ScrollMagic.Controller();
	var tweeney = TweenMax.to(".leftservicebox",3, {opacity:1, ease:Cubic.easeInOut});
	var tween = TweenMax.to(".verticalline",3, {height:"1600", opacity:1, ease:Strong.easeInOut});
  // build scene
	var scene = new ScrollMagic.Scene({
						triggerElement: "#services",offset: -600, reverse:false 
						})
						.setTween(tween) // trigger a TweenMax.to tween
						.addIndicators({name: "1 (duration: 0)"}) // add indicators (requires plugin)
						.addTo(controller);

	var scene = new ScrollMagic.Scene({
						triggerElement: "#services",offset: -600, reverse:false 
						})
						.setTween(tweeney) // trigger a TweenMax.to tween
						.addIndicators({name: "1 (duration: 0)"}) // add indicators (requires plugin)
						.addTo(controller);


// triggerElement: "#target",offset: 500,duration:150,reverse:false 
 // $(function () { // wait for document ready
 //        // init controller
 //        var controller = new ScrollMagic.Controller({loglevel: 3});

 //        // build tween
 //        var tween = TweenMax.to("#target", 0.5, {backgroundColor: "black"});

 //        // build scene
 //        var scene = new ScrollMagic.Scene({triggerElement: "#trigger", duration: 0, loglevel: 3})
 //                        .setTween(tween)
 //                        .setPin("#target")
 //                        .addIndicators() // add indicators (requires plugin)
 //                        .addTo(controller);

       
 //    });




// var elementTop = document.querySelector(".logo").offsetTop;
// var triggerOffset = 100; 
// var triggered = false;
// window.onscroll = function() {
//   triggerPos = elementTop - window.innerHeight + triggerOffset;
//   if( ( document.body.scrollTop > triggerPos || document.documentElement.scrollTop > triggerPos ) && !triggered ){
//     triggered = true;
//     TweenMax.to(".logo",2, {opacity:0.5, rotation:45});
//   }
// };




		

