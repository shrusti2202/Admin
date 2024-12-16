<?php
include_once('model.php');

class control extends model
{
    function __construct()
    {

        session_start();

        model::__construct();

        $url = $_SERVER['PATH_INFO'];

        switch ($url) {
            case '/dashboard':
                $product = $this->select("product");
                include_once('dashboard.php');
                break;

            case '/add_product':
                if (isset($_REQUEST['submit'])) {
                    $name = $_REQUEST['name'];
                    $img = $_FILES['img']['name'];

                    $path = 'upload/product/' . $img;
                    $tmp_file = $_FILES['img']['tmp_name'];
                    move_uploaded_file($tmp_file, $path);

                    $price = $_REQUEST['price'];
                    $description = $_REQUEST['description'];

                    $data = array("name" => $name, "img" => $img, "price" => $price, "description" => $description);

                    $res = $this->insert('product', $data);
                    if ($res) {
                        echo "<script>
		     					alert('product Success !');
		     				</script>";
                    } else {
                        echo "<script>
		     						alert('product noooo !');
		     					</script>";
                    }
                }
                include_once('add_product.php');
                break;

            case '/delete';
                if (isset($_REQUEST['dproduct'])) {
                    $id = $_REQUEST['dproduct'];

                    $where = array("id" => $id);
                    $res = $this->delete_where('product', $where);
                    if ($res) {
                        echo "<script>
                                     alert('Product Delete Success !');
                                     window.location='dashboard'
                                     </script>";
                    }
                }

                break;

            case '/edit_product':
                if (isset($_REQUEST['epro'])) {
                    $id = $_REQUEST['epro'];

                    $where = array("id" => $id);
                    $res = $this->select_where('product', $where);
                    $fetch = $res->fetch_object();

                    if (isset($_REQUEST['save'])) {
                        $name = $_REQUEST['name'];
                        $description = $_REQUEST['description'];
                        $price = $_REQUEST['price'];
                        if ($_FILES['img']['size'] > 0) {

                            $old_img = $fetch->img;
                            $img = $_FILES['img']['name'];
                            $path = 'upload/product/' . $img;
                            $tmp_file = $_FILES['img']['tmp_name'];
                            move_uploaded_file($tmp_file, $path);

                            $data = array("name" => $name, "description" => $description, "price" => $price, "img" => $img);

                            $res = $this->update_where('product', $data, $where);
                            if ($res) {
                                unlink('upload/product/' . $old_img);
                                echo "<script>
                                                 alert('Product Update Success !');
                                                 window.location='dashboard';
                                             </script>";
                            }
                        } else {
                            $data = array("name" => $name, "description" => $description, "price" => $price);
                            $res = $this->update_where('product', $data, $where);
                            if ($res) {
                                echo "<script>
                                                 alert('Product Update Success !');
                                                 window.location='dashboard';
                                             </script>";
                            }
                        }
                    }
                }
                include_once('edit_product.php');
                break;

            case '/login':

                if (isset($_REQUEST['submit'])) {

                    $email = $_REQUEST['email'];
                    $password = $_REQUEST['password'];
                    $where = array("email" => $email, "password" => $password);
                    $res = $this->select_where('admin', $where);
                    $chk = $res->num_rows;

                    if ($chk == 1) {
                        $data = $res->fetch_object();
                        $_SESSION['aname'] = $data->name;
                        $_SESSION['aid'] = $data->id;

                        echo "<script>
                        alert('Login Success !');
                        window.location='dashboard';
                        </script>";
                    } else {
                        echo "<script>
                        alert('login failed');
                        </script>";
                    }
                }
                include_once('login.php');
                break;

            case '/logout':
                unset($_SESSION['aid']);
                unset($_SESSION['aname']);
                echo "<script>
                             alert('Logout Success !');
                             window.location='login'
                           </script>";
                break;
        }
    }
}

$obj = new control;
