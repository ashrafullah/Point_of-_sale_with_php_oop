<footer class="footer footer-static footer-light navbar-border">
  <p class="clearfix text-muted text-sm-center mb-0 px-2"><span class="float-md-left d-xs-block d-md-inline-block">Copyright  &copy; 2017 <a href="http://imran.phpbd4.com/pos" target="_blank" class="text-bold-800 grey darken-2">Md. Ashraf Ullah Bhuiyan </a>, All rights reserved. </span><span class="float-md-right d-xs-block d-md-inline-block">
  	 <i class="icon-heart5 pink"></i></span></p>
</footer>
 
<script>
function renderTime() {
var currentTime = new Date();
var diem = "AM";
var h = currentTime.getHours();
var m = currentTime.getMinutes();
var s = currentTime.getSeconds();
setTimeout('renderTime()',1000);
if (h == 0) {
	h = 12;
} else if (h > 12) { 
	h = h - 12;
	diem="PM";
}
if (h < 10) {
	h = "0" + h;
}
if (m < 10) {
	m = "0" + m;
}
if (s < 10) {
	s = "0" + s;
}
var myClock = document.getElementById('clockDisplay');
myClock.textContent = h + ":" + m + ":" + s + " " + diem;
myClock.innerText = h + ":" + m + ":" + s + " " + diem;
}
renderTime();
</script>
<!--js -->


<div class="top">
         <i class="fa fa-arrow-up"></i>
</div>
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
 <script src="public/js/jquery.nicescroll.min.js"></script>
<script>
  $("body").niceScroll({
cursorcolor:"#456bb7",
cursorwidth:"6px",
cursorborder:"1px solid aquamarine",
cursorborderradius:2
});
</script>


        
        
  
