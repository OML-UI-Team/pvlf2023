<?php include('includes/header.php'); ?>

<?php

if(!isset($_GET['id']) || empty($_GET['id'])) {
    header('location:../index.php');
}


$sub_cat_sql = "Select * from pvlf_sub_categories where session_year='2023' AND id=".$_GET['id']."";
$sub_category = $conn->query($sub_cat_sql);
$sub_category = mysqli_fetch_object($sub_category);

if(empty($sub_category)) {
    header('location:../index.php');
}


$main_cat = "SELECT `title`, id, url FROM `pvlf_categories` WHERE session_year='2023' AND `id` = ".$sub_category->cat_id;
$main_cat = $conn->query($main_cat);
$main_cat = mysqli_fetch_object($main_cat);
$main_cat_slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $main_cat->title)));

$all_subcat_sql = "Select * from pvlf_sub_categories where session_year='2023' AND cat_id=".$main_cat->id." order by sort_order asc";
$all_subcat = $conn->query($all_subcat_sql);

$all_subcat_sql2 = "Select id from pvlf_sub_categories where session_year='2023' AND cat_id=".$main_cat->id." order by sort_order asc";
$all_subcat2 = $conn->query($all_subcat_sql2);
$subCat_list_only = "";
$cnt = 1;
while ($subcat = mysqli_fetch_object($all_subcat2)) {

   if($cnt == 1){
      $subCat_list_only .= $subcat->id;   
   }else{
      $subCat_list_only .= ", ".$subcat->id;   
   }
   $cnt++;
}


$p_sql = "Select * from pvlf_product where session_year='2023' AND sub_cat_id=".$_GET['id']." order by title asc";
$products = $conn->query($p_sql);

//whether ip is from share internet
if (!empty($_SERVER['HTTP_CLIENT_IP']))   
{
    $ip_address = $_SERVER['HTTP_CLIENT_IP'];
}
//whether ip is from proxy
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
{
    $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
}
//whether ip is from remote address
else
{
    $ip_address = $_SERVER['REMOTE_ADDR'];
}

$vote_sql = "Select * from pvlf_vote where session_year='2023' AND ip='". $ip_address ."' and category_id=". $sub_category->id ."";
$vote_status = $conn->query($vote_sql);
$vote_status = $vote_status->num_rows;

$count_cur_cat_total_vote_sql = "Select count(id) as total_vote from pvlf_vote where session_year='2023' and category_id=". $sub_category->id ."";
$count_cur_cat_total_vote = $conn->query($count_cur_cat_total_vote_sql);
$count_cur_cat_total_vote = mysqli_fetch_array($count_cur_cat_total_vote);
$count_cur_cat_total_vote = $count_cur_cat_total_vote['total_vote'];

// $count_total_vote_sql = "Select count(id) as total_vote from pvlf_vote where session_year='2023' and `category_id` IN (".$subCat_list_only.");";
$count_total_vote_sql = "Select count(id) as total_vote from pvlf_vote where session_year='2023'";
$count_total_vote = $conn->query($count_total_vote_sql);
$count_total_vote = mysqli_fetch_array($count_total_vote);
$count_total_vote = $count_total_vote['total_vote'];

$sql = "Select * from pvlf_categories where session_year='2023' order by sort_order asc";

?>

<div id="page-banner-area" class="page-banner-area pba" style="background-image:url(<?=  $site_path ?>/images/hero_area/banner_bg.jpg)">
   <!-- Subpage title start -->
   <div class="page-banner-title">
      <div class="text-center">
         <!-- <ul>
            <li>
                  <a href="<?= $site_path ?>">Home</a>
            </li>
            <li>
                  <a class="active" href="<?= $site_path.'/'.$main_cat->url ?>"><?= $sub_category->title; ?></a>
            </li>
            <li><?= $sub_category->title ?></li>
         </ul> -->
         <h2><?= $sub_category->description??""; ?></h2>
         <!-- <h3 class="text-white">Total Votes : <?= $count_cur_cat_total_vote; ?></h3> -->
         <h3 class="text-white">Total Votes : <?= $count_total_vote; ?></h3>
         <div class="banner-btn yellow-btn" data-wow-duration="1.5s" data-wow-delay="800ms">
               <!--<a href="nomination" class="btn">Submit Your Entry </a>-->
               <?php if (strpos($sub_category->description, "READERS")) { ?>
                  <a href="<?= $site_path ?>/author-excellence-awards/best-debut-fiction/books/20" class="btn call-nominate">Vote for PVLF Author Excellence Awards 2023</a>
               <?php }else{ ?>
                  <a href="<?= $site_path ?>/reader-s-choice-book-awards/platinum-awards/books/27" class="btn call-nominate">Vote for PVLF Readers' Choice Book Awards 2023</a>
               <?php } ?>
         </div>
      </div>
   </div><!-- Subpage title end -->
</div><!-- Page Banner end -->


 <section class="ts-schedule" style="background-image:url(<?=  $site_path ?>/images/speakers/speaker_bg.png)">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-12 mx-auto">
            <div class="ts-schedule-nav">
            <ul class="nav nav-tabs justify-content-center" role="tablist">
                  <?php while ($subcat = mysqli_fetch_object($all_subcat)) { ?>
                        <?php
                           $sub_cat_slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $subcat->title)));
                           $check_vote_sql = "Select * from pvlf_vote where session_year='2023' and category_id='".$subcat->id."' and ip='".$ip_address."'";
                           $sub_cat_vote_status = $conn->query($check_vote_sql);
                           $sub_cat_vote_status = (array)mysqli_fetch_object($sub_cat_vote_status);
                          
                        ?>
                        <?php //if($subcat->id != $_GET['id']) { ?>
                           <li class="nav-item">
                              <a class="<?= ($subcat->id == $_GET['id'])?"active":"" ?> <?= ($subcat->id == (!empty($sub_cat_vote_status))?$sub_cat_vote_status['category_id']:null)?"voted-tab":""; ?>" href="<?= "$site_path/$main_cat_slug/$sub_cat_slug/books/".$subcat->id ?>" title="<?= $subcat->title; ?>">
                                 <h3><?= $subcat->title; ?></h3>
                              </a>
                                 <span class="voting-title"><?= ($subcat->id == (!empty($sub_cat_vote_status))?$sub_cat_vote_status['category_id']:null)?"Already voted":"Vote now"; ?></span>
                           </li>
                        <?php //} ?>
                  <?php }
                  if(strpos(" 30, 31, 32", $_GET['id'])){ ?>
                     <li class="nav-item">
                        <a class="" href="<?= $site_path ?>/reader-s-choice-book-awards/gold-awards/books/27" title="AWARD CATEGORIES HINDI">
                           <h3>AWARD CATEGORIES ENGLISH</h3>
                        </a>
                        <span class="voting-title">Vote now</span>
                     </li>
                  <?php }
                  if(strpos(" 27, 28, 29", $_GET['id'])){ ?>
                                 <li class="nav-item">
                                    <a class="" href="<?= $site_path ?>/reader-s-choice-book-awards/gold-awards/books/31" title="AWARD CATEGORIES HINDI">
                                       <h3>AWARD CATEGORIES HINDI</h3>
                                    </a>
                                       <span class="voting-title">Vote now</span>
                                 </li>
                  <?php }  ?>
                  
            </ul>

              


               <!-- Tab panes -->
            </div>
         </div><!-- col end-->

      </div><!-- row end-->
<div class="container">
   <div class="row">
      <div class="col-lg-12">
         <div class="tab-content schedule-tabs schedule-tabs-item">
            <!--data1 start-->
               <form action="" method="post" id="product_form">
                  <div role="tabpanel" class="tab-pane active" id="date1">

                     <div class="row"><!--row start-->
                     <?php while ($product = mysqli_fetch_object($products)) { ?>
                           <?php 
                              $vote_sql = "Select * from pvlf_vote where session_year='2023' and ip='". $ip_address ."' and category_id=". $sub_category->id ."";
                              $vote_progress = $conn->query($vote_sql);

                              $voted = false;
                              while ($progress = mysqli_fetch_object($vote_progress)) {
                                    if($progress->product_id == $product->id) {
                                       $voted = true;
                                    }
                              }

                              $cnt_sql = "SELECT * FROM `pvlf_vote` WHERE session_year='2023' AND category_id='". $sub_category->id ."' and product_id='". $product->id ."'";
                              $cnt_vote = $conn->query($cnt_sql);
                              
                           ?>

                           <div class="col-lg-3 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="400ms">
                              <div class="post <?=($voted)?"voted-div":""; ?>">
                                 <div class="post-body">
                                    <figure class="small"><picture><img src="<?= $site_path.'/'.$product->image ?>" alt="" height="363" width="242"></picture></figure>
                                    <div class="txt-wp">
                                       <h2>Author</h2>
                                       <p><?= $product->author ?></p>
                                       <hr>
                                       <h2>Book</h2>
                                       <p><?= (strlen($product->title) > 60) ?substr($product->title, 0, 60).'...':$product->title; ?></p>
                                       <hr>
                                       <h2>Publisher</h2>
                                       <p><?= $product->publisher ?></p>
                                    </div>
                                    <div class="text-center voting-area">
                                       <?php if( $sub_category->type == 2 && empty($vote_status)) { ?>
                                          <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="<?php echo $product->id ?>" name="product_vote[]" id="flexCheckDefault_<?php echo $product->id ?>" <?php echo ($voted)?"checked":""; ?> >
                                                <label class="form-check-label" for="flexCheckDefault_<?php echo $product->id ?>">Select for Vote</label>
                                          </div>
                                       <?php } else { ?>
                                          <?php if($voted || empty($vote_status)) { ?>
                                          <button type="button"
                                                <?php if($voted == false && empty($vote_status)) { ?>
                                                   data-product-id="<?php echo $product->id ?>"
                                                   data-category-id="<?php echo $sub_category->id ?>"
                                                <?php } ?>
                                                class="vote-btn btn btn-block <?php echo ($voted == true && !empty($vote_status))?"green-btn":(($voted == false && !empty($vote_status))?"disabled":"vote-active-btn single-product-vote"); ?>">
                                                <?php echo ($voted)?"Voted":"Vote"; ?>
                                          </button>
                                          <?php } ?>
                                       <?php } ?>
                                             
                                       <button type="button" class="vote-count" id="product-<?php echo $product->id ?>-vote">
                                          <?= $cnt_vote->num_rows; ?> <?= ($cnt_vote->num_rows > 1)?"Votes":"Vote" ?>
                                       </button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                     <?php }  ?>
                     </div><!--row end-->

                        <div class="container">
                            <div class="alert alert-dismissible alert-success response_div" style="display:none" role="alert">
                                <span id="response_message"></span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                 </button>
                            </div>
                        </div>

                        <?php if( $sub_category->type == 2 && empty($vote_status)) { ?>
                            <div class="row multiple-vote-area">
                                <div class="col-md-12 text-center">
                                    <input type="hidden" name="status" value="multiple">
                                    <input type="hidden" name="category_id" value="<?php echo $category->id; ?>">
                                    <button type="submit" class="readon yellow-btn multi-product-vote">Vote</button>
                                </div>
                            </div>
                        <?php } ?>

                  </div>
               </form>
            <!--data1 end-->
         </div>
      </div>






   <div class="speaker-shap">
   <img class="shap1" src="images/shap/home_speaker_memphis1.png" alt="">
   <img class="shap2" src="images/shap/home_speaker_memphis2.png" alt="">
   <img class="shap3" src="images/shap/home_speaker_memphis3.png" alt="">
   </div>
</section>
  
<?php include('includes/footer.php'); ?>