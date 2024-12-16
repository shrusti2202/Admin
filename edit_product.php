<?php
if (isset($_SESSION['aid'])) {
} else {
  echo "<script>
    window.location='login';
    </script>";
}
include_once('navbar.php');
?>

<!DOCTYPE html>
<html>
<style>
  body {
    font-family: Arial, Helvetica, sans-serif;
  }

  * {
    box-sizing: border-box
  }

  /* Full-width input fields */
  input[type=text],
  input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
  }

  input[type=text]:focus,
  input[type=password]:focus {
    background-color: #ddd;
    outline: none;
  }

  hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
  }

  /* Set a style for all buttons */
  button {
    background-color: #04AA6D;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
  }

  button:hover {
    opacity: 1;
  }

  /* Extra styles for the cancel button */
  .cancelbtn {
    padding: 14px 20px;
    background-color: #f44336;
  }

  /* Float cancel and signup buttons and add an equal width */
  .cancelbtn,
  .signupbtn {
    float: left;
    width: 50%;
  }

  /* Add padding to container elements */
  .container {
    padding: 16px;
  }

  /* Clear floats */
  .clearfix::after {
    content: "";
    clear: both;
    display: table;
  }

  /* Change styles for cancel button and signup button on extra small screens */
  @media screen and (max-width: 300px) {

    .cancelbtn,
    .signupbtn {
      width: 100%;
    }
  }
</style>

<body>

  <form method='post' enctype="multipart/form-data" style="border:1px solid #ccc">
    <div class="container">


      <label><b>Name</b></label>
      <input type="text" placeholder="Enter Name" value="<?php echo $fetch->name; ?>" name="name" required>

      <label><b>Image</b></label><br><br>
      <input type="file" placeholder="Enter Password" value="<?php echo $fetch->img; ?>" name="img">
      <img src="upload/product/<?php echo $fetch->img ?>" width="50px">

      <br><br>


      <label><b>Price</b></label>
      <input type="text" placeholder="Enter Price" value="<?php echo $fetch->price; ?>" name="price" required>

      <label><b>Description</b></label>
      <input type="text" placeholder="Enter Description" value="<?php echo $fetch->description; ?>" name="description" required>


      <div class="clearfix">
        <button type="submit" name="save" class="signupbtn">Submit</button>
      </div>
      <a class="btn btn-success" href="dashboard">Back</a>

    </div>
  </form>

</body>

</html>