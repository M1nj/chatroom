 <?php include("header.php"); ?>

  <div id="home" class="container-fluid">
      <a href="#"><button type="button" id="button" class="btn btn-primary" onclick="test()" >Sign in</button></a>
      <a href="register.php"><button type="button" id="button" class="btn btn-secondary" href="register.php">Sign Up</button></a>
  </div>
</body>

<script>

function test(){
  swal({
    content: {
    element: "input",
    attributes: {
      placeholder: "Type your password",
      type: "password",
    },
  },
  button: "Aww yiss!",
});}

</script>
