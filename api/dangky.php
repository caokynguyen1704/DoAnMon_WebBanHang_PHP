<div class="container dangnhap">
    <center>
        <h1>Đăng Ký</h1>
        <form method="POST">
            <div class="input-group form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control" name="username_su" placeholder="Tên Đăng Nhập">
            </div>
            <div class="input-group form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                </div>
                <input type="text" class="form-control" name="password_su" placeholder="Mật Khẩu">
            </div>
            <div class="form-group">
                <input type="submit" name="su" value="Đăng Ký" class="btn float-right login_btn">
            </div>
            <?php
            if ( isset($_SESSION["error"]) ) {
            echo('<div><p style="color:red">'.$_SESSION["error"]."</p></div>\n");
            unset($_SESSION["error"]);
            }
            ?>
        </form>
        <p>Đã có tài khoản? <a href="./index.php">Đăng nhập</a></p>
    </center>
</div>
<?php
        require "pdo.php";
        if (isset($_POST['su'])){
            if ((isset($_POST))&&(isset($_POST['username_su']))&&(isset($_POST['password_su']))){
                $sql="select * from users where username= :user";
                $stmt=$pdo->prepare($sql);
                $stmt->execute(array(
                    ':user'=>$_POST['username_su']
                ));
                $rows=$stmt->fetchAll();
                if(count($rows)>0){
                    $_SESSION["error"] = "Tài Khoản Đã Tồn Tại";
                    header("Location: ./dangky.php");
                    return;
                }else{
                    $sql_su="INSERT INTO `users`(`username`, `password`) VALUES (:user_su,:pass_su)";
                    $stmt_su=$pdo->prepare($sql_su);
                    $stmt_su->execute(array(
                        ':user_su'=>$_POST['username_su'],
                        ':pass_su'=>$_POST['password_su']
                    ));
                    header( 'Location: ./index.php' ) ;
                    return;
                }
            }
        }
?>
