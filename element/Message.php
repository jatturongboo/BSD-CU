<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
if(!empty($_SESSION['Message'])){
  ?>
  <script>
  swal({
  text: "<?=$_SESSION['Message']?>",
  icon: "<?=$_SESSION['type']?>",
  timer: 3000
  });
  </script>
  <?php
  unset($_SESSION['Message']);
  unset($_SESSION['type']);
}

 ?>
