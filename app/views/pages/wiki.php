
<!doctype html>
<html lang="en">
<?php require APPROOT . '/views/inc/header.php'; ?>

<body>


  <div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('images/hero_5.jpg');">
    <div class="container">
      <div class="row same-height justify-content-center">
        <div class="col-md-6">
          <div class="post-entry text-center">
            <h1 class="mb-4"><?php echo $data["wiki"]->title; ?></h1>
            <div class="post-meta align-items-center text-center">
              <span><?php echo $data["wiki"]->date; ?></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section class="section">
    <div class="container">

      <div class="row blog-entries element-animate">

        <div class="col-md-12 col-lg-8 main-content">

          <div class="post-content-body">
          <?php echo $data["wiki"]->content; ?>

          </div>


          <div class="pt-5">
            <p>Categories:  <a href="#">NOTE TO FUTURE AYA: ZIDI CATEGORY NAME HNA RANI BDLT DESIGN</a> Tags: <a href="#">O TAGS HNA </a></p>
          </div>

        </div>

      </div>
    </div>
  </section>

  <?php require APPROOT . '/views/inc/footer.php'; ?>
  </body>
  </html>
