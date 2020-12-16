<!DOCTYPE html>
<html lang="en">
<head>
	<title>HectarebyHectare: signup</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Business: Business Multipurpose HTML template">
    <meta name="keywords" content="bootweb, multipurpose, portfolio, personal, developer, designer, onepage, clean, minimal, modern, tdrana, me">
    <meta name="author" content="Tanmoy Dhar">

	 <!-- All CSS Files -->
    <link rel="shortcut icon" href="#" type="image/png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.lineProgressbar.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
      <!-- slick carosel css -->
     <link href="assets/css/slick.css" rel="stylesheet">
     <!-- Slick carosel theme -->
     <link href="assets/css/slick-theme.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/icofont.css">
    <link rel="stylesheet" type="text/css" href="assets/css/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slicknav.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link id="colors" rel="stylesheet" href="assets/css/colors/defaults-color.css">
</head>
<body>
     <!-- ==== Preloader start ==== -->
   <div id="loader-wrapper">
         <div id="loader"></div>
         <div class="loader-section section-left"></div>
         <div class="loader-section section-right"></div>
   </div>
   <!-- ==== Preloader end ==== -->
      <!-- Header start -->
    <header>
       <div class="menu-area">
          <div class="container">
              <div class="row">
                  <div class="col-sm-12-3 text-center">
                      <div class="logo">
                          <!--== change the logo name ==-->
                          <a href="home">
                             <h3><img src="/asset/img/hbh-logo.png" alt=""></h3>
                          </a>
                      </div>
                      <!-- Responsive Menu Start -->
                      <div class="responsive-menu"></div>
                      <!-- Responsive Menu End -->
                  </div>
              </div>
          </div>
      </div>
    </header>
    <!-- Header End -->
     <!-- == /Color schemes == -->
    <section class="">
    	<div class="container">
    		<div class="row padding-60">
          <div id="memberShip" class="col-md-12 contact-team">
            <p class="authentic text-center">Already a member? <a href="login">Login Here</a></p>
            <h2 class="text-center">Signup</h2>
            <h3 class="text-center"><span>become a bonafide member</span></h3>
            <div class="contact-send-message">
                              <!--modal-->
              <div v-if="isActive" class="modal-container">
                 <div class="modal-inner">
                   <h3>Welcome, Pls Read Below Caveat!</h3>
                   <p>Dear! User, This Membership Option Attracts Registration Payment Of N3,500 If You Are Paying now. However, You may Wish To Pay later By Choosing (Credit Payment) Option of N6,000 Payable Installmentally By Forfeiting 20% Of Your Profit for Each Transaction You Participate in Under The Program Until Entire Payment is Fully Paid</p>
                 <div class="text-center">
                  <button type="button" v-on:click="close" class="btn btn-success">Ok, Understood</button>
                 </div>
              </div>
            </div>
                <form class="contact-form row" method="post">
                   <div class="col col-sm-12">
						<?php $ve = validation_errors(); if(!empty($ve)){
                                                  echo '<div class="alert alert-danger">';

                                                        echo $ve;
                                                  echo '</div>';
                                            }
                                            ?>

                                            <?php if(!empty($m)){
                                                  echo '<div class="alert alert-success">';

                                                        echo $m;
                                                  echo '</div>';
                                            }
                     ?>

                  </div>

                   <div class="col col-sm-6 selec">
                    <label for="membership">Select membership Type</label>
                    <select v-on:change="getMenber" v-model="selected" class="form-control" name="membership_type" value="" required>
                      <option value="" disabled selected>Select Membership Type*</option>
                      <option value="AA" <?php if(isset($_GET['mvalue']) &&  ($_GET['mvalue'] == 'AA')) { echo 'selected'; }?>>A Farm To Home Agent (FTHA)</option>
                      <option value="PB" <?php if(isset($_GET['mvalue']) &&  ($_GET['mvalue'] == 'PB')) { echo 'selected'; }?>>Secondary Off-Taker (SOT)</option>
                      <option value="VA" <?php if(isset($_GET['mvalue']) &&  ($_GET['mvalue'] == 'VA')) { echo 'selected'; }?>>Value Partner (VP)</option>
                       <option value="SA" <?php if(isset($_GET['mvalue']) &&  ($_GET['mvalue'] == 'SA')) { echo 'selected'; }?>>
                     A Sub-Aggregator(SA)</option>
                     <option value="SC">Sub-Consolidator (SC)</option>
                     <option value="OG">Out-Grower (OG)</option>
                     <option value="PF">Proxy-Farmer (PF)</option>
                     <option value="FP">Food-Processor (FP)</option>
                     <option value="PA">Produce-Aggregator (PA)</option>
                    </select>
                  </div>
                  <div class="col col-sm-6">
                    <label for="name">Name</label>
                    <input type="text" name="fname" class="form-control" placeholder="Your FullName*" required>
                  </div>
                  <!--<div class="col col-sm-6">-->
                  <!--  <label for="lname">Last Name</label>-->
                  <!--  <input type="text" name="lname" class="form-control" placeholder="Last Name*" required>-->
                  <!--</div>-->
                  <div class="col col-sm-6">
                    <label for="phone">Phone Number</label>
                    <input type="tel" name="phone" class="form-control" placeholder="Phone Number*" required>
                  </div>
                  <div class="col col-sm-6">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter email*" required>
                  </div>
                  <div class="col col-sm-6" v-if="premiumMember">
                    <label for="pwd">Password</label>
                    <input type="Password" name="password" class="form-control" placeholder="At least 8 characters*" minlength="8" required>
                  </div>
                  <div class="col col-sm-6" v-if="premiumMember">
                    <label for="C-pwd"> Confirm Password</label>
                    <input type="Password" name="passconf" class="form-control" placeholder="Confirm Password*" minlength="8" required>
                  </div>

                  <div class="col col-sm-6">
                    <label for="adr">Address</label>
                    <input type="text" name="address" class="form-control" placeholder="Address*" required>
                  </div>

                  <div class="col col-sm-6 selec" v-if="payment">
                    <label for="payment_option">Payment Option</label>
                    <select class="form-control" name="payment_option" value="" required>
                        <option value="" disabled selected>Select Payment Option*</option>
                        <option value="PN">Pay Now</option>
                        <option value="CP">Credit Payment</option>
                    </select>
                  </div>

                  <!--<div class="col col-sm-6">-->
                  <!--  <label for="city">City</label>-->
                  <!--  <input type="text" name="city" class="form-control" placeholder="City*" required>-->
                  <!--</div>-->

                  <!--<div class="col col-sm-6">-->
                  <!--  <label for="state">State of Origin</label>-->
                  <!--  <input type="text" name="state" class="form-control" placeholder="State of Origin*" required>-->
                  <!--</div>-->
                  <!--<div class="col col-sm-6 selec">-->
                  <!--  <label for="Idt">Identification Type</label>-->
                  <!--    <select class="form-control" id="Idt" name="id_type" required>-->
                  <!--      <option value="" disabled selected>Select ID type*</option>-->
                  <!--      <option value="Ncard">National Id Card</option>-->
                  <!--      <option value="Vcard">Voter Card</option>-->
                  <!--      <option value="Dl">Drivers License</option>-->
                  <!--      <option value="Passport">Passport</option>-->
                  <!--    </select>-->
                  <!--  </div>-->

                  <!--<div class="col col-sm-6">-->
                  <!--  <label for="Identification"> Identification Number</label>-->
                  <!--  <input type="text" name="id_no" class="form-control" placeholder="Identification Number*" required>-->
                  <!--</div>-->
                  <!--<div class="col col-sm-12">-->
                  <!--  <label style="font-size: 13px;color: #055DB6;">Email of Person Who Introduced You. If none, please enter this code: PMT0008 (required) </label>-->
                  <!--</div>-->
                  <div class="col col-sm-6" v-if="premiumMember">
                    <label for="RefererName">Referrer Email</label>
                    <input type="email" value="<?php if(isset($_GET['ref'])) { echo $_GET['ref']; }  ?>" name="referrer" class="form-control" placeholder="Referrer Email*">
                  </div>

                  <!--<div class="col col-sm-6">-->
                  <!--  <label for="security">Attempt this question if not a robot</label>-->
                  <!--  <input type="number" name="robot" class="form-control" placeholder="What is 4 X 4 = ?*" required>-->
                  <!--</div>-->
                  <div class="col col-sm-12 text-center">
                    <button type="submit" name="submit" class="btn btn-default btn-style hvr-shutter-out-vertical">Submit</button>
                  </div>
                </form>
            </div>
          </div>
    		</div>
    	</div>
    </section>
    <!-- sing up section -->

    <!-- All JS Here -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
      <!-- jquery paralax -->
    <script src="assets/js/jquery.parallax-1.1.3.js"></script>
    <!-- slick carosel js -->
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
     <script src="assets/js/jquery.slicknav.min.js"></script>
    <script src="assets/js/jquery.lineProgressbar.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/tweetie.js"></script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZtTj2tvwsorp_DNPh3ZN_pMlSniet5h4&callback=initMap">
    </script>
     <script>

      var marker;

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: {lat: 22.362561, lng: 91.819757}
        });

        marker = new google.maps.Marker({
          map: map,
          draggable: true,
          animation: google.maps.Animation.DROP,
          /* Change your location here*/
          position: {lat: 22.362561, lng: 91.819757}
          /* Change your location here*/
        });
        marker.addListener('click', toggleBounce);
      }

      function toggleBounce() {
        if (marker.getAnimation() !== null) {
          marker.setAnimation(null);
        } else {
          marker.setAnimation(google.maps.Animation.BOUNCE);
        }
      }

    </script>

    <!--vue js code-->
    <script src="assets/js/main.js"></script>
    <!--vue js cdn-->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script>
        var app = new Vue({
          el: '#memberShip',
          data: {
            selected: '',
            premiumMember: false,
            isActive: false,
            payment: false,
            isActive: false,
        },
        methods: {
            getMenber: function() {
              if(this.selected === 'AA') {
              this.premiumMember = true;
              this.payment = true;
              this.isActive = true;
            }else if (this.selected === 'VA'){
              this.premiumMember = true;
              this.payment = false;
            }else{
              this.premiumMember = false;
              this.isActive = false;
              this.payment = false;
            }
           },
            close: function() {
              this.isActive = false;
           }
         },
        })
    </script>

</body>
</html>
