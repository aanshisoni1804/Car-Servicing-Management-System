<?php
  include("header.php");
 ?>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="images/logo2.jpg" alt="Image">
        <div class="carousel-caption">
          <h3>Welcome to Premier Car Services!</h3>
          <p>Reviving Your Ride with Expert Precision.</p>
        </div>      
      </div>

      <div class="item">
        <img src="images/logo.jpg" alt="Image">
        <div class="carousel-caption">
          <h3>Your Car, Our Care!</h3>
          <p>Trusted Hands, Valued Service</p>
        </div>      
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
  
<div class="container text-center">    
  <h3>Excellence in Automotive Service, from Routine Maintenance to Major Repairs.</h3><br>
  <div class="row">
    <div class="col-sm-6">
      <div>
        <img src="images/new.jpg" class="img-responsive" style="width:100%" alt="Image">
      </div>
      <div class="well mt-3">
        <p>We offer a comprehensive range of automotive solutions tailored to meet your needs. Our services include routine maintenance such as oil changes, tire rotations, and fluid checks to keep your vehicle running smoothly. We specialize in diagnostic services, ensuring accurate problem identification through advanced tools. Additionally, our expert technicians provide quality repairs for brakes, engines, and electrical systems, ensuring your vehicle's reliability and safety. With a commitment to exceptional service and customer satisfaction, Premier Car Services is your trusted partner in automotive care.</p>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="well mb-3">
        <p>At Premier Car Services, we pride ourselves on providing top-notch automotive care tailored to your needs. Whether it's routine maintenance like oil changes and tire rotations or complex repairs, our experienced technicians are here to ensure your vehicle performs at its best. We use the latest diagnostic tools and genuine parts to guarantee quality service and peace of mind.</p>
      </div> 
      <div class="mt-3">
        <img src="images/new2.jpeg" class="img-responsive" style="width:100%" alt="Image">
      </div>
    </div>
  </div>
</div><br>

<?php 
 include("footer.php");
  ?>
