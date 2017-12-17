   <div class="footer-aria">
         <div class="container">
            <div class="row">
               <p class="text-center">&copy; By Md. Ashraf Ullah Bhuiyan</p>
            </div>
         </div>
      </div>
      <div class="top">
         <i class="fa fa-arrow-up"></i>
      </div>
      <script src="Frontend-assets/js/jquery-1.11.3.min.js"></script>
 
<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
<script src="Frontend-assets/js/jquery.counterup.min.js"></script>
       <script>
           $('.counter').counterUp({
                delay: 2,
                time: 1000
            });
           
           
       </script>
      <script>
         $(document).ready(function() {
             // Show or hide the sticky footer button
             $(window).scroll(function() {
                 if ($(this).scrollTop() > 400) {
                     $('.top').fadeIn(400);
                 } else {
                     $('.top').fadeOut(400);
                 }
             });
         
             // Animate the scroll to top
             $('.top').click(function(event) {
                 event.preventDefault();
         
                 $('html, body').animate({scrollTop: 0}, 600);
             })
         });
      </script> 
      <script src="Frontend-assets/js/bootstrap.min.js"></script>
      <script src="Frontend-assets/js/jquery.sticky.js"></script>
      <script src="Frontend-assets/js/jquery.easing.1.3.js"></script>  
      <script src="Frontend-assets/js/main.js"></script>
       <script src="Frontend-assets/js/jquery.nicescroll.min.js"></script>
<script>
  $("body").niceScroll({
cursorcolor:"#456bb7",
cursorwidth:"6px",
cursorborder:"1px solid aquamarine",
cursorborderradius:2
});
</script>
   </body>
</html>