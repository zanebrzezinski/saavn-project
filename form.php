<?php
  if ($_POST['first'] && $_POST['last'] && $_POST['email']
    && $_POST['password'] && $_POST['gender'] && $_POST['birthYear']) {
      mail($_POST['email'], "Thanks for signing up!", "Thanks for signing up. Now go have fun!");
      echo json_encode($_POST);
  }
?>
