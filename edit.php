<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Tech | One </title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <h1 class="text-center">PHP OOP CRUD MYSQLI</h1>
                <hr style="height: 1px; color: black; background-color: black;">
            </div>
        </div>
        <div class="col-md-8 mx-auto">
            <?php 
                // include la class method qui contient la connexion a la bdd
                include "model.php";
                // instantiation class Model
                $model = new Model();
                $id= $_REQUEST['id'];
                // appel de la method insert de la class model
                $row = $model->edit($id);
                // si soumisssion du formulaire
                if(isset($_POST['update'])){
                    // verification de l'existance des champs 
                    if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['mobile']) && !empty($_POST['address'])){
                        // les valeurs des champs formulaire
                        $data['id'] = $id;
                        $data['name']= $_POST['name'];
                        $data['email']= $_POST['email'];
                        $data['mobile']= $_POST['mobile'];
                        $data['address']= $_POST['address'];
                        $update = $model->update($data);
                        if($update){
                            echo "<script>alert('record update successfully');</script>";
                            echo "<script>window.location.href = 'records.php';</script>";
                        }else{
                            echo "<script>alert('record update failed');</script>";
                            echo "<script>window.location = 'records.php';</script>";
                        }
                        
                    }else{  
                        echo"<script>alert('Empty');</script>";
                        header("Location: edit.php?id=$id");
                    }
                    
                }

            ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="<?php echo $row['name']; ?>" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="<?php echo $row['email']; ?>" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="mobile">Mobile</label>
                    <input type="text" name="mobile" value="<?php echo $row['mobile']; ?>" id="mobile" class="form-control">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea type="text" name="address"  id="address" class="form-control"><?php echo $row['address']; ?></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>