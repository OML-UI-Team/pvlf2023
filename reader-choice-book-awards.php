<?php include('includes/header.php'); ?>

<?php
$sql = "Select * from pvlf_categories where session_year='2023' order by sort_order asc";

$sub_sql = "Select * from pvlf_sub_categories where session_year='2023' and cat_id=5 order by sort_order asc";
$sub_categories = $conn->query($sub_sql);

// Hindi Version
$hindi_sub_sql = "Select * from pvlf_sub_categories where session_year='2023' and cat_id=6 order by sort_order asc";
$hindi_sub_categories = $conn->query($hindi_sub_sql);

$count_total_vote_sql = "Select count(id) as total_vote from pvlf_vote where session_year='2023'";
$count_total_vote = $conn->query($count_total_vote_sql);
$count_total_vote = mysqli_fetch_array($count_total_vote);
$count_total_vote = $count_total_vote['total_vote'];
?>

<!-- banner start-->

<!-- <section class="hero-area author-excellence">
  <div class="banner-item" style="background-image:url('images/hero_area/banner_bg.jpg')">
     <div class="container">
        <div class="row">
           <div class="col-lg-7">
              <div class="banner-content-wrap">
                 <h1 class="banner-title">PVLF READERS' CHOICE BOOK AWARDS 2023</h1>
                 <p>These awards are meant to felicitate the most sold books. This year the award will be for English as well as Hindi books. </p>
                  
              </div>                                        
           </div>

           <div class="col-lg-5 pt-50">
              <img src="images/pvl-pratie-vichar.png" >
           </div>
           
        </div>
     </div>            
  </div>
</section> -->

<div id="page-banner-area" class="page-banner-area" style="background-image:url(images/hero_area/banner_bg.jpg)">
	   <!-- Subpage title start -->
		  <div class="page-banner-title">
				<div class="text-center">
					<h2>PVLF READERS' CHOICE BOOK AWARDS 2023</h2>			
					<h3 class="text-white">Total Votes : <?= $count_total_vote; ?></h3>			
				</div>
			</div>
		</div>


<!-- banner end-->
      
<section class="shortage-remarkable">
  <div class="container">
     <div class="row">
      <div class="col-lg-6">
         <img src="images/reader-choice-book-awards-2023.png" class="left-img">
      </div>
      <!-- col end-->
        <div class="col-lg-6">               
            <h2>ABOUT READERS' CHOICE BOOK AWARDS 2023</h2>
            <div class="author-excellence-services">
            <p>Readers come first, and their views must be heard. Keeping readers' voices in view, PVLF brings you to the Readers' Choice Book Awards, where you can come and vote for your favourite book and help them win.</p>
            <p>Shortlisting will be based on Nielsen Bookscan Data and its definition of total book copies sold in Platinum, Gold, and Silver Categories.</p>
            <p>This year, the awards will be in Hindi too and categories for Platinum, Gold, and Silver will be announced. The winners in each category will be decided based on the Nielsen BookScan data shortlist & finally, public voting.</p>
            <p>All titles in the platinum, gold & silver category will be put up for public voting, and the winner shall be announced based on public vote only.</p>
               
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
               <h2 class="section-title white wow fadeInUp">AWARD CATEGORIES ENGLISH</h2>
            </div><!-- col end-->
         </div><!-- row end-->
         <div class="row">
            <?php $i = 1; ?>
            <?php while ($category = mysqli_fetch_object($sub_categories)) { ?>
               <?php $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $category->title))); ?>
               <div class="col-lg-4 col-md-6 mb-30 wow fadeInUp text-center" data-wow-delay="<?= 200*$i ?>ms" data-wow-duration="<?= 1000*$i ?>ms">
                  <a class="categories-item" href="<?= "reader-choice-book-awards/$slug/books/".$category->id ?>">
                     <img class="pvlf-award-img" src="<?= $site_path.'/'.$category->icon; ?>" alt="<?= $category->title; ?>">
                  </a>
                  <a class="categories-item" href="<?= "reader-choice-book-awards/$slug/books/".$category->id ?>"> Know More</a>
               </div>
               <?php $i++; ?>
            <?php } ?>


                   
         </div>

         <div class="row"><div class="col-lg-12"><hr></div></div>
         
         <div class="row">
            <div class="col-lg-12">
               <h2 class="section-title white pt85 wow fadeInUp">AWARD CATEGORIES HINDI</h2>
            </div><!-- col end-->
         </div><!-- row end-->
         <div class="row">
            <?php $i = 1; ?>
            <?php while ($category = mysqli_fetch_object($hindi_sub_categories)) { ?>
               <?php $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $category->title))); ?>
               <div class="col-lg-4 col-md-6 mb-30 wow fadeInUp text-center" data-wow-delay="<?= 200*$i ?>ms" data-wow-duration="<?= 1000*$i ?>ms">
                  <a class="categories-item" href="<?= "reader-choice-book-awards/$slug/books/".$category->id ?>">
                     <img class="pvlf-award-img" src="<?= $site_path.'/'.$category->icon; ?>" alt="<?= $category->title; ?>">
                  </a>
                  <a class="categories-item" href="<?= "reader-choice-book-awards/$slug/books/".$category->id ?>"> Know More</a>
               </div>
               <?php $i++; ?>
            <?php } ?>

                   
         </div>
      </div>
      <!-- shap image-->
    
   </section>



 <!-- ts sponsors start-->
    <section class="ts-intro-sponsors our-sponrs">
    <?php include('includes/partner.php'); ?>
      </section>
      <!-- ts sponsors end-->

<?php include('includes/footer.php'); ?>