<?php

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="<?php echo URLROOT; ?>/users/singUp">
  <input type="text"  name="name"  placeholder="name">
  <input type="text" name="last_name" placeholder="last name">
  <input type="text" name="email" placeholder="email">
  <input type="password" name="password" placeholder="password">
  <input type="text" name="repeat-password" placeholder="repeat-password">
  <select name="role">
    <option value="1">Admin</option>
    <option value="2">User</option>
  </select>
  <button name="singup">submit</button>
  </form>
</body>
</html>