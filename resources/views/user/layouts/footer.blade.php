 <!-- footer section start -->
 <div class="footer_section layout_padding ">
    <div class="container">
       <div class="footer_logo"><a href="index.html"><img src="{{asset('home/images/footer-logo.png')}}"></a></div>
       <div class="input_bt">
          <input type="text" class="mail_bt" placeholder="Your Email" name="Your Email">
          <span class="subscribe_bt" id="basic-addon2"><a href="#">Subscribe</a></span>
       </div>
       <div class="footer_menu">
          <ul>
             <li><a href="{{ route('bestseller') }}">Best Sellers</a></li>
             <li><a href="#">Gift Ideas</a></li>
             <li><a href="{{ route('newrelease') }}">New Releases</a></li>
             <li><a href="{{ route('todaysdeal') }}">Today's Deals</a></li>
             <li><a href="{{ route('customerservice') }}">Customer Service</a></li>
          </ul>
       </div>
       <div class="location_main">Help Line  Number : <a href="#">01633642539</a></div>
    </div>
 </div>
 <!-- footer section end -->
 <!-- copyright section start -->
 <div class="copyright_section">
    <div class="container">
       <p class="copyright_text">© 2023 All Rights Reserved. Design by <a href="#">Tazin Sultana</a></p>
    </div>
 </div>
 <!-- copyright section end -->
 <!-- Javascript files-->
 <script src="{{asset('home/js/jquery.min.js')}}"></script>
 <script src="{{asset('home/js/popper.min.js')}}"></script>
 <script src="{{asset('home/js/bootstrap.bundle.min.js')}}"></script>
 <script src="{{asset('home/js/jquery-3.0.0.min.js')}}"></script>
 <script src="{{asset('home/js/plugin.js')}}"></script>
 <!-- sidebar -->
 <script src="{{asset('home/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
 <script src="{{asset('home/js/custom.js')}}"></script>
 <script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
    }
    
    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
    }
 </script>
</body>
</html>