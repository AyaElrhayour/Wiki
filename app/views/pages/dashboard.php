<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <!-- ======= Styles ====== -->
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/dashboard.css">

<body>
  <!-- =============== Navigation ================ -->
  <div class="container">
    <div class="navigation">
      <ul>
        <li>
          <a href="#">
            <span class="icon">
              <ion-icon name="globe-outline"></ion-icon>
            </span>
            <span class="title"><b>Wiki<sup>TM</sup></b></span>
          </a>
        </li>

        <li>
          <a href="#">
            <span class="icon">
              <ion-icon name="file-tray-stacked"></ion-icon>
            </span>
            <span class="title">Dashboard</span>
          </a>
        </li>

        <li>
          <a href="#">
            <span class="icon">
              <ion-icon name="person"></ion-icon>
            </span>
            <span class="title">Account</span>
          </a>
        </li>

        <li>
          <a href="#">
            <span class="icon">
              <ion-icon name="archive"></ion-icon>
            </span>
            <span class="title">Archived wikis</span>
          </a>
        </li>

        <li>
          <a href="#">
            <span class="icon">
              <ion-icon name="log-out"></ion-icon>
            </span>
            <span class="title">Log Out</span>
          </a>
        </li>
      </ul>
    </div>

    <!-- ========================= Main ========================= -->
    <div class="main">
      <div class="topbar">
        <div class="toggle">
          <ion-icon name="menu-outline"></ion-icon>
        </div>
      </div>

      <!-- ========================= Cards ========================= -->
      <div class="cardBox">
        <div class="card">
          <div>
            <div class="numbers">7</div>
            <div class="cardName">Categories</div>
          </div>

          <div class="iconBx">
            <ion-icon name="albums"></ion-icon>
          </div>
        </div>

        <div class="card">
          <div>
            <div class="numbers">80</div>
            <div class="cardName">Tags</div>
          </div>

          <div class="iconBx">
            <ion-icon name="pricetag"></ion-icon>
          </div>
        </div>

        <div class="card">
          <div>
            <div class="numbers">284</div>
            <div class="cardName">writers</div>
          </div>

          <div class="iconBx">
            <ion-icon name="people"></ion-icon>
          </div>
        </div>

        <div class="card">
          <div>
            <div class="numbers">7</div>
            <div class="cardName">Archived wikis</div>
          </div>

          <div class="iconBx">
            <ion-icon name="newspaper"></ion-icon>
          </div>
        </div>
      </div>

      <!-- ========================= Category ========================= -->
      <div class="details">
        <div class="categoryTable">
          <div class="cardHeader">
            <h2>Categories</h2>
            <button class="btn" id="show-category">Add Category</button>
          </div>
          <div class="popup catpopup">
            <div class="close-btn catclose-btn"><ion-icon name="close-circle-outline"></ion-icon></div>
            <form method="post" enctype="multipart/form-data" action="<?php echo URLROOT; ?>/dashboard/addCategory">
              <h2>Add Category</h2>
              <div class="form-element">
                <input name="name" type="text" placeholder="New Category Name">
                <input name="img" type="file">
              </div>
              <div class="form-element">
                <button>Add</button>
              </div>
            </form>
          </div>
          <table>
            <thead>
              <tr>
                <td>Image</td>
                <td>Category</td>
                <td>Operations</td>

              </tr>
            </thead>

            <tbody>
              <?php foreach ($data["categories"] as $category) { ?>
                <tr>
                  <td><img src="<?php echo URLROOT; ?>/img/<?php echo $category->__get("image"); ?>" alt=""></td>
                  <td><?php echo $category->__get("name"); ?></td>
                  <td class="btns">
                    <input type="hidden" value="<?= $category->__get("id"); ?>">
                    <button name="modifyCategory" class="btn update_category_btn"><ion-icon name="create"></ion-icon></button>

                    <!-- delete -->
                    <form action="<?php echo URLROOT; ?>/dashboard/deleteCategory" method="post">
                      <input class="categoryId" name="id" type="hidden" value="<?= $category->__get("id"); ?>">
                      <button name="deleteCategory" class="btn delete_btn" type="submit"><ion-icon name="trash-sharp"></ion-icon></button>
                    </form>
                  </td>
                </tr>
              <?php
              }  ?>
              <div class="popup categorymodifypopup">
                <div class="close-btn categorymodifyclose-btn"><ion-icon name="close-circle-outline"></ion-icon></div>
                <form method="post" action="<?php echo URLROOT; ?>/dashboard/modifyCategory">
                  <h2>Update Category</h2>
                  <div class="form-element">
                    <input id="categoryID" name="id" type="hidden">
                    <input name="name" id="categoryName" type="text" placeholder="New Category Name">
                  </div>
                  <div class="form-element">
                    <button>Update</button>
                  </div>
                </form>
              </div>


            </tbody>
          </table>
        </div>

        <!-- ========================= Tag ========================= -->
        <div class="tagTable">
          <div class="cardHeader">
            <h2>Tags</h2>
            <button class="btn" id="show-tag">Add Tag</button>
          </div>
          <div class="popup tagpopup">
            <div class="close-btn tagclose-btn"><ion-icon name="close-circle-outline"></ion-icon></div>
            <form method="post" action="<?php echo URLROOT; ?>/dashboard/addTag">
              <h2>Add Tag</h2>
              <div class="form-element">
                <input name="name" type="text" placeholder="New Tag Name">
              </div>
              <div class="form-element">
                <button>Add</button>
              </div>
            </form>
          </div>
          <table>
            <thead>
              <tr>
                <td>Tag</td>
                <td style="text-align: end;">Operations</td>
              </tr>
            </thead>

            <?php foreach ($data["tags"] as $tag) { ?>

              <tr>
                <td><?php echo $tag->__get("name"); ?></td>
                <td class="btns">
                  <input type="hidden" value="<?= $tag->__get("id"); ?>">
                  <button name="modifyTag" class="btn tagupdate_btn update_btn" id="show-modifytag"><ion-icon name="create"></ion-icon></button>

                  <!-- delete -->
                  <form action="<?php echo URLROOT; ?>/dashboard/deleteTag" method="post">
                    <input id="deleteTag" name="id" type="hidden" value="<?php echo $tag->__get("id"); ?>">
                    <button name="deleteTag" class="btn delete_btn" type="submit"><ion-icon name="trash-sharp"></ion-icon></button>
                  </form>
                </td>
              </tr>
            <?php } ?>
            <div class="popup tagmodifypopup">
              <div class="close-btn tagmodifyclose-btn"><ion-icon name="close-circle-outline"></ion-icon></div>
              <form method="post" action="<?php echo URLROOT; ?>/dashboard/modifyTag">
                <h2>Update Tag</h2>
                <div class="form-element">
                  <input id="tagID" name="id" type="hidden">
                  <input name="name" id="tagName" type="text" placeholder="New Tag Name">
                </div>
                <div class="form-element">
                  <button>Update</button>
                </div>
              </form>
            </div>


          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- ========================= Scripts =========================  -->
  <script src="<?php echo URLROOT; ?>/js/dashboard.js"></script>

  <!-- ====== ionicons ======= -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>