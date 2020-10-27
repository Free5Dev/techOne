<?php 
    // include model
    include "model.php";
    // instantiation 
    $model = new Model();
    // get id 
    $id = $_REQUEST['id'];
    // // appel de la methode delete
    if($model->delete($id)){
        echo"<script>alert('recordings delete success....');</script>";
        echo"<script>window.location='records.php';</script>";
    }
?>