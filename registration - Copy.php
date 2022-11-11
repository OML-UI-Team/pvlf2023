 <?php include('includes/header.php'); ?>

      <div id="page-banner-area" class="page-banner-area" style="background-image:url(images/hero_area/banner_bg.jpg)">
         <!-- Subpage title start -->
         <div class="page-banner-title">
            <div class="text-center">
               <h2>Registration</h2>               
            </div>
         </div><!-- Subpage title end -->
      </div><!-- Page Banner end -->
    

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

		</section>

      <section class="registration_form">
         <div class="container-fluid">
         <div class="row" style="display: flex; align-items: center; text-align: center;">
            <div class="col-lg-6" style="
            background-image: url(images/registration-img.jpg);
            background-size: cover;
            background-position: center center;
            height:710px;">
               
            </div>

            <div class="col-lg-6">

               <form id="contact-form" class="contact-form">
                  <div class="error-container"></div>                  
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label>Name</label>
                           <input class="form-control form-control-name" placeholder="enter your name" name="name" id="f-name" type="text" required>
                        </div>
                     </div>

                     <div class="col-md-12">
                        <div class="form-group">
                           <label>Email</label>
                           <input class="form-control form-control-email" placeholder="enter your email" name="email" id="email" type="email" required>
                        </div>
                     </div>

                     <div class="col-md-12">
                        <div class="form-group">
                           <label>Phone</label>
                           <input class="form-control form-control-email" placeholder="enter your phone" name="phone" id="phone" type="tel" required>
                        </div>
                     </div>

                     <div class="col-md-12">
                        <div class="form-group">
                           <label>Type of Insurance</label>
                           <span class="select-option">
                           <select required="">
                                    <option value="">---</option>
                                    <option value="Health Insurance">Health Insurance</option>
                                    <option value="Car Insurance">Car Insurance</option>
                                    <option value="Home Insurance">Home Insurance</option>
                                    <option value="Business Insurance">Business Insurance</option>
                                    <option value="Life Insurance">Life Insurance</option>
                                    <option value="Travel Insurance">Travel Insurance</option>
                              </select>
                           </span>   
                        </div>
                     </div>                                        

                     <div class="col-md-12">
                     <div class="form-group">
                       <label>Your Message</label>
                        <textarea class="form-control form-control-message" name="message" id="message" placeholder="enter your message...*" rows="" required></textarea>
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