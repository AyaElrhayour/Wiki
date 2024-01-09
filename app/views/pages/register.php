<?php

?>


<!-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <form action="<?php echo URLROOT; ?>/users/signUp" method="post">
    <input type="text" name="name" placeholder="name">
    <input type="text" name="last_name" placeholder="last name">
    <input type="text" name="email" placeholder="email">
    <input type="password" name="password" placeholder="password">
    <select name="role">
      <option value="1">Admin</option>
      <option value="2">User</option>
    </select>
    <button name="signup">submit</button>
  </form>


  <form action="<?php //echo URLROOT; 
                ?>/users/logIn" method="post">
    <input type="input" name="email" placeholder="email">
    <input type="input" name="password" placeholder="password">
    <button name="login">submit</button>
  </form>
</body>

</html> -->




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/register.css">
  <title>Document</title>
</head>

<body>

  <div class="main">
    <input type="checkbox" aria-hidden="true" id="chk">
    <div class="signup">
      <form action="<?php echo URLROOT; ?>/users/signUp" method="post">
        <label for="chk" aria-hidden="true">signup</label>
        <input type="text" name="name" placeholder="name">
        <input type="text" name="last_name" placeholder="last name">
        <input type="text" name="email" placeholder="email">
        <input type="password" name="password" placeholder="password">
        <select name="role">
          <option value="1">Admin</option>
          <option value="2">User</option>
        </select>
        <button name="signup">submit</button>
      </form>
    </div>
    <div class="login">
      <form action="<?php //echo URLROOT; 
                    ?>/users/logIn" method="post">
        <label for="chk" aria-hidden="true">login</label>
        <input type="input" name="email" placeholder="email">
        <input type="input" name="password" placeholder="password">
        <button name="login">submit</button>
      </form>
    </div>
  </div>








</body>

</html>