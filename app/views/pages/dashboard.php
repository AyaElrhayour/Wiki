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
              <ion-icon name="logo-apple"></ion-icon>
            </span>
            <span class="title">Brand Name</span>
          </a>
        </li>

        <li>
          <a href="#">
            <span class="icon">
              <ion-icon name="home-outline"></ion-icon>
            </span>
            <span class="title">Dashboard</span>
          </a>
        </li>

        <li>
          <a href="#">
            <span class="icon">
              <ion-icon name="people-outline"></ion-icon>
            </span>
            <span class="title">Customers</span>
          </a>
        </li>

        <li>
          <a href="#">
            <span class="icon">
              <ion-icon name="chatbubble-outline"></ion-icon>
            </span>
            <span class="title">Messages</span>
          </a>
        </li>

        <li>
          <a href="#">
            <span class="icon">
              <ion-icon name="help-outline"></ion-icon>
            </span>
            <span class="title">Help</span>
          </a>
        </li>

        <li>
          <a href="#">
            <span class="icon">
              <ion-icon name="settings-outline"></ion-icon>
            </span>
            <span class="title">Settings</span>
          </a>
        </li>

        <li>
          <a href="#">
            <span class="icon">
              <ion-icon name="lock-closed-outline"></ion-icon>
            </span>
            <span class="title">Password</span>
          </a>
        </li>

        <li>
          <a href="#">
            <span class="icon">
              <ion-icon name="log-out-outline"></ion-icon>
            </span>
            <span class="title">Sign Out</span>
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
            <div class="numbers">1,504</div>
            <div class="cardName">Daily Views</div>
          </div>

          <div class="iconBx">
            <ion-icon name="eye-outline"></ion-icon>
          </div>
        </div>

        <div class="card">
          <div>
            <div class="numbers">80</div>
            <div class="cardName">Sales</div>
          </div>

          <div class="iconBx">
            <ion-icon name="cart-outline"></ion-icon>
          </div>
        </div>

        <div class="card">
          <div>
            <div class="numbers">284</div>
            <div class="cardName">Comments</div>
          </div>

          <div class="iconBx">
            <ion-icon name="chatbubbles-outline"></ion-icon>
          </div>
        </div>

        <div class="card">
          <div>
            <div class="numbers">$7,842</div>
            <div class="cardName">Earning</div>
          </div>

          <div class="iconBx">
            <ion-icon name="cash-outline"></ion-icon>
          </div>
        </div>
      </div>

      <!-- ========================= List ========================= -->
      <div class="details">
        <div class="categoryTable">
          <div class="cardHeader">
            <h2>Categories</h2>
            <a href="#" class="btn">Add Category</a>
          </div>

          <table>
            <thead>
              <tr>
                <td>Category</td>
                <td>Operations</td>

              </tr>
            </thead>

            <tbody>
              <?php foreach ($data["categories"] as $category) { ?>
                <tr>
                  <td><?php echo $category->name; ?></td>
                  <td class="btns">
                    <input type="hidden" value="<?php //echo $category["category_id"]; 
                                                      ?>">
                    <button name="modifyCategory" class="btn update_btn"><ion-icon name="create"></ion-icon></button>
                    <form action="<?php //echo $_SERVER['PHP_SELF']; 
                                  ?>" method="post">
                      <input id="updateCategoryName" name="category_id" type="hidden" value="">
                      <button name="deleteCategory" class="btn delete_btn" type="submit"><ion-icon name="trash-sharp"></ion-icon></button>
                    </form>

                  </td>

                </tr>

              <?php

              }  ?>



            </tbody>
          </table>
        </div>

        <!-- ========================= New Customers ========================= -->
        <div class="tagTable">
          <div class="cardHeader">
            <h2>Tags</h2>
            <a href="#" class="btn">Add Tag</a>
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
                <td>
                  <h4><?php echo $tag->name; ?></h4>
                </td>
                <td class="btns">
                    <input type="hidden" value="<?php //echo $category["category_id"]; 
                                                      ?>">
                    <button name="modifyCategory" class="btn update_btn"><ion-icon name="create"></ion-icon></button>
                    <form action="<?php //echo $_SERVER['PHP_SELF']; 
                                  ?>" method="post">
                      <input id="updateCategoryName" name="category_id" type="hidden" value="">
                      <button name="deleteCategory" class="btn delete_btn" type="submit"><ion-icon name="trash-sharp"></ion-icon></button>
                    </form>

                  </td>
              </tr>

            <?php

            }

            ?>



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