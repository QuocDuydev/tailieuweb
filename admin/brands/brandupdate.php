<?php
$brand=mysqli_fetch_array($conn->query("select*from brands where id=".$_GET['id']));
?>
<?php
if(isset($_POST['name'])){
    $name = $_POST['name'];
    $query="select*from brands where name='$name' and id!=".$brand['id'];
    if(mysqli_num_rows($conn->query($query))!=0){
        $alert=" da co hang khac mang ten nay!";
    }else{
        $status=$_POST['status'];
     $query= "update brands set name='$name', status='$status' where id=".$brand['id'];
        $conn->query($query);
        header("location: ?option=brand");
    }
}
?>
<h1>Update hang san xuat</h1>
<section style="color:red;font-weight:bold;text-align:center;"> <?=isset($alert)?$alert:"" ?></section>

<section class="container col-md-6">
    <form method="post">
        <section class="form-group">
            <label> Ten hang </label> <input value="<?=$brand['name']?>" name="name" class="form-control">
        </section>
        <section class="form-group">
            <label> Trang thai  hang </label> <br> <input type="radio" name="status" value="1" <?=$brand['status']==1?'checked':''?>> Active
            <input type="radio" name="status" value="0" <?=$brand['status']==0?'checked':''?>> Unactive
        </section>
        <section> <input type="submit" value="Update" class="btn btn-primary"> 
        <a href="?option=brand" class="btn btn-outline-secondary">&lt;&lt;Back</a>
        </section>
    </form>
</section>