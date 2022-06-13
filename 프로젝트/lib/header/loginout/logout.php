<?php
  session_start();
  session_destroy();

  $url = $_POST["url"];

  echo "<script>
          window.location.href = '$url';
        </script>";
?>
