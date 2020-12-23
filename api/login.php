<div class="container dangnhap">
    <center>
        <h1>Đăng Nhập</h1>
        <form method="POST">
            <div class="input-group form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control" name="username" placeholder="Tên Đăng Nhập">
            </div>
            <div class="input-group form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                </div>
                <input type="password" class="form-control" name="password" placeholder="Mật Khẩu">
            </div>
            <div class="row align-items-center remember" style="color: black;">
                <input type="checkbox">Ghi nhớ
            </div>
            <div class="form-group">
                <input type="submit" value="Login" class="btn float-right login_btn">
            </div>
            <?php
            if ( isset($_SESSION["error"]) ) {
            echo('<div><p style="color:red">'.$_SESSION["error"]."</p></div>\n");
            unset($_SESSION["error"]);
            }
            ?>
        </form>
        <p>Chưa có tài khoản? <a href="./dangky.php">Đăng ký</a></p>
    </center>
</div>
<?php
        require "pdo.php";
            if ((isset($_POST))&&(isset($_POST['username']))&&(isset($_POST['password']))){
                $sql="select * from users where username= :user and password= :pass";
                $stmt=$pdo->prepare($sql);
                $stmt->execute(array(
                    ':user'=>$_POST['username'],
                    ':pass'=>$_POST['password']
                ));
                $rows=$stmt->fetchAll();
                if(count($rows)==1){
                    unset($_SESSION['name']);
                    unset($_SESSION['user_id']);
                    $_SESSION['name']=$rows[0]['username'];
                    $_SESSION['user_id']=$rows[0]['id'];
                    header("Location: ./index.php");
                    return;
                }else{
                    $_SESSION["error"] = "Vui lòng nhập lại.";
                    header( 'Location: ./index.php' ) ;
                    return;
                }
            }
?>
