
   <!--  <link rel="shortcut icon" href="images/favicon.ico" />  
     <link rel="stylesheet" href="css/style.css">-->
     <link rel="stylesheet" href="css/slider.css">
     <script src="js/jquery.js"></script>
     <script src="js/jquery.easing.1.3.js"></script>
     <script src="js/jquery-migrate-1.1.1.js"></script>
     <script src="js/superfish.js"></script>
     <script src="js/jquery.equalheights.js"></script> 
     <script src="js/tms-0.4.1.js"></script>             <!-- este sirve-->
 <!--     <script src="js/jquery.carouFredSel-6.1.0-packed.js"></script>-->
     <script src="js/jquery.ui.totop.js"> 
	 </script>
     <script>
      $(window).load(function(){
		  $('.slider')._TMS({
			show:0,
			pauseOnHover:false,
			prevBu:'.prev',
			nextBu:'.next',
			playBu:false,
			duration:800,
			preset:'fade',
			easing:'easeOutQuad', 
			pagination:true,//'.pagination',true,'<ul></ul>'
			pagNums:false,
			slideshow:8000,
			numStatus:false,
			banners:'fade',
			waitBannerAnimation:false,
			progressBar:false
		  })  
      });
      
	  $(window).load (
		 function(){$('.carousel1').carouFredSel({auto: false,prev: '.prev1',next: '.next1', width: 960, items: {
			 visible : {min: 4, max: 4},
		  }, 
		  responsive: false, 
		  scroll: 1, 
		  mousewheel: false,
		  swipe: {onMouse: false, onTouch: false}});
	  });      

     </script>


<!--=======content================================-->

	
        
            <div class="slider">
                <ul class="items">
                    <li><img src="images/slider-1.jpg" alt="">
                        <div class="banner">Our Customers are Our Priority</div>
                    </li>
                    <li><img src="images/slider-2.jpg" alt="">
                        <div class="banner">Creative Problem-Solving</div>
                    </li>
                    <li><img src="images/slider-3.jpg" alt="">
                        <div class="banner">Imagination is Our Power</div>
                    </li>
                    <li><img src="images/slider-4.jpg" alt="">
                        <div class="banner">The World of Opportunities</div>
                    </li>
                </ul>
            </div>
        
    
	