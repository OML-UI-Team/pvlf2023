 <?php include('includes/header.php'); ?>

      <div id="page-banner-area" class="page-banner-area" style="background-image:url(images/hero_area/banner_bg.jpg)">
         <!-- Subpage title start -->
         <div class="page-banner-title">
            <div class="text-center">
               <h2>Contact Us</h2>               
            </div>
         </div><!-- Subpage title end -->
      </div><!-- Page Banner end -->
    
<!-- 
      <section class="ts-contact-form">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 col-md-12">
                  <div class="title_section">
                     <div class="first-half">
                        <span>FREE QUOTE</span>
                        <h2>Get a free quote to create your desired insurance.</h2>
                     </div>
                     <div class="last-half">
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old working with clients with better services.</p>
                     </div>
                  </div>                 
               </div>
            </div>          
         </div>
         <div class="speaker-shap">
            <img class="shap1" src="images/shap/home_schedule_memphis2.png" alt="">
         </div>
		</section> -->

      <section class="registration_form">
         <div class="container">
         <div class="row" style="display: flex; align-items: center;">
            <div class="col-lg-6 reg_left_cont">               
               <div class="aobut_right">
                  <h5 style="font-size:24px;">Contact Us</h5>                  
                  <div class="block-text">                     
                     <h4>We hope you are as excited about being a part of PragatiE Vichaar Literature Festival 2023 as we are about organizing it.</h4>
                      <p>The nominations for PVLF Excellence Awards and the opportunity to nominate yourself for speaking at PVLF Author's Marathon have begun. For any queries, you can use the form in the right to reach us. </p>

                     <h4>You can connect with us for sponsorship opportunities as well, both to support the industry as well as to put yourself in front of the right audience.</h4>

                     <ul>
                        <li class="lst-sty-none"><i class="fa fa-phone" aria-hidden="true"></i>
<a href="mailto:media@frontlist.in">media@frontlist.in</a></li>
                        <li class="lst-sty-none"><i class="fa fa-envelope-o" aria-hidden="true"></i>
<a href="tel:8076099881">+91-8076099881</a></li>
                     </ul>
                     
                  </div>
               </div>
            </div>

            <div class="col-lg-6">

               <form id="contact-form" class="contact-form" method="POST" action="thank-you.php">
                  <div class="error-container"></div>                  
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label>Name</label>
                           <input class="form-control form-control-name" placeholder="Enter your name" name="name" id="f-name" type="text" required>
                        </div>
                     </div>

                     <div class="col-md-12">
                        <div class="form-group">
                           <label>Email</label>
                           <input class="form-control form-control-email" placeholder="Enter your email" name="email" id="email" type="email" required>
                        </div>
                     </div>

                     <div class="col-md-12">
                        <div class="form-group">
                           <label>Phone</label>
                           <input class="form-control form-control-email" placeholder="Enter your phone" name="phone" id="phone" type="tel" required>
                        </div>
                     </div>

                     <div class="col-md-12">
                        <div class="form-group">
                           <label>Query Type</label>
                           <span class="select-option">
                           <select name="subject" required="">
                                    <option value="Award Related">Award Related</option>
                                    <option value="Sponsorship Related">Sponsorship Related</option>
                                    <option value="I am an Author">I am an Author</option>
                                    <option value="Media">Media</option>
                                    <option value="Others">Others</option>                                    
                              </select>
                           </span>   
                        </div>
                     </div>                                        

                     <div class="col-md-12">
                     <div class="form-group">
                       <label>Your Message</label>
                        <textarea class="form-control form-control-message" name="message" id="message" placeholder="Enter your message...*" rows="" required></textarea>
                     </div>

                     <div class="text-center">
                        <button class="btn btn-bg" type="submit"> Submit</button>
                     </div>
                   </div>
                  </div>

               </form><!-- Contact form end -->
            </div>
          </div>
         </div>
      </section>
		
		<?php include('includes/footer.php'); ?>