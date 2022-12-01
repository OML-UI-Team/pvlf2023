<?php include('includes/header.php'); ?>

<?php
$sql = "Select * from pvlf_categories where session_year='2023' order by sort_order asc";

$sub_sql = "Select * from pvlf_sub_categories where session_year='2023' and cat_id=4 order by sort_order asc";
$sub_categories = $conn->query($sub_sql);

?>

      <!-- banner start-->



     <div id="page-banner-area" class="page-banner-area" style="background-image:url(images/hero_area/banner_bg.jpg)">
	   <!-- Subpage title start -->
		  <div class="page-banner-title">
				<div class="text-center">
					<h2>PVLF Author Excellence Awards</h2>					
				</div>
			</div><!-- Subpage title end -->
		</div><!-- Page Banner end -->


      <!-- banner end-->
            
      <section class="shortage-remarkable">
        <div class="container">
           <div class="row">
            <div class="col-lg-6">
               <img src="images/author-excellence-awarads.png" class="left-img"><br>If you think you have poured your heart out and written a masterpiece, you are eligible for the PVLF Author Excellence Award. This year the awards will be in English as well as Hindi Authors.


            </div>
            <!-- col end-->
              <div class="col-lg-6">               
                  <h2>PVLF AUTHOR EXCELLENCE AWARDS 2023</h2>
                  <div class="author-excellence-services">
                  <ul>
                        <li>
                        
                           <p>The Authors can nominate themselves or the Publisher can nominate on their behalf. Every entry can be done into a maximum of 3 categories and the winner of each category shall be decided based on Jury shortlisting & finally a transparent online public voting.</p>
                        </li>

                        <li>                           
                           <p>Jury will shortlist 5 Authors in each category who will be put for voting on the Frontlist Platform. Public voting will decide the final winner.</p>
                        </li>

                        <li>                           
                           <p>Author nominations shall begin from June 1st. Voting lines after jury selection shall begin afterwards, we will keep updating here and on our social channels. </p>
                        </li>
                     </ul>
                     
                     <!-- <ul>
                        <li>
                           <div class="service_icon"><img src="images/1.png"></div>
                           <h5>Development</h5>
                           <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium.</p>
                        </li>

                        <li>
                           <div class="service_icon"><img src="images/2.png"></div>
                           <h5>Integration</h5>
                           <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium.</p>
                        </li>

                        <li>
                           <div class="service_icon"><img src="images/3.png"></div>
                           <h5>Responsibility</h5>
                           <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium.</p>
                        </li>
                     </ul> -->
                  </div>
                  
                  
              </div>
           </div><!-- row end-->
        </div><!-- container end-->
     </section>

      <!-- ts intro start -->
    
      <section class="ts-blog section-bg award-cate" style="background-image: url(./images/awards_bg.jpg);">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <h2 class="section-title white wow fadeInUp">Award Categories [in English and Hindi]</h2>
            </div><!-- col end-->
         </div><!-- row end-->
         <div class="row">
         <?php $i = 1; ?>
         <?php while ($category = mysqli_fetch_object($sub_categories)) { ?>
            <?php $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $category->title))); ?>
            <?php $type =  ($category->title == "Most Celebrated Author")?"authors":"books"; ?>
            <?php $url = "author-excellence-awards/$slug/$type/".$category->id; ?>
            <div class="col-lg-3 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="<?= 200*$i ?>ms">
               <div class="post">

                  <div class="post-body">
                     <div class="post-media post-image">
                        <a href="<?= $url ?>">
                           <img src="<?= $category->icon; ?>" class="img-fluid" alt="<?= $category->title; ?>"></a>
                     </div>
                     <div class="entry-header">
                        <h2 class="entry-title">
                           <a href="<?= $url ?>"><?= $category->title; ?></a>
                           <?php if($category->title == "Most Celebrated Author") { ?> <span class="sml-txt">(Based on Nielsen Bookscan Data)</span> <?php } ?>
                        </h2>
                     </div>
                  </div>
               </div>
            </div>
            <?php $i++; ?>
         <?php } ?>
<!-- 
            <div class="col-lg-3 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="800ms">
               <div class="post">                  
                  <div class="post-body">

                     <div class="post-media post-image">
                     <a href="<?= $site_path.'/most-celebrated-author.php' ?>"><img src="<?= $site_path ?>/images/best-debut-fiction-icon.png" class="img-fluid" alt=""></a>
                     </div>
                    
                     <div class="entry-header">
                        <h2 class="entry-title">
                           <a href="<?= $site_path.'/most-celebrated-author.php' ?>">Most Celebrated Author</a>
                           <span class="sml-txt">(Based on Nielsen Bookscan Data)</span>
                        </h2>
                     </div>
                  </div>
               </div>
            </div> -->

            <div class="col-lg-3 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1000ms">
               <div class="post">                  
                  <div class="post-body">

                     <div class="post-media post-image">
                     <a href="<?= $site_path.'/author-excellence-awards/hindi/books/33' ?>"><img src="<?= $site_path ?>/images/awards-2023/author-excellence-awards-hindi.jpg" class="img-fluid" alt=""></a>
                     </div>
                    
                     <div class="entry-header">
                        <h2 class="entry-title">
                           <a href="<?= $site_path.'/author-excellence-awards/hindi/books/33' ?>">AWARD CATEGORIES <br> [IN HINDI]</a>
                        </h2>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- shap image-->
    
   </section>


         <!-- ts sponsors start-->
      <section class="ts-intro-sponsors" style="background: url(images/sponsors/sponsor_img.jpg);">
      <?php include('includes/partner.php'); ?>
      </section>
      <!-- ts sponsors end-->

   <?php include('includes/footer.php'); ?>