<?php
if (isset($_SESSION['role'])){
        
        echo "<div class='view'>";
        echo "<h3>User Mode:</h3>";
        require 'viewAddress.php';
        echo '<button type="button" onclick="btnAdd()" class="btn btn-secondary">Thêm địa chỉ</button>';
        echo '<button type="button" onclick="btnOrder()" class="btn btn-secondary">Xem Đơn Hàng</button>';
        if ($_SESSION['role']==1){
            echo "<h3>Admin Mode:</h3>";
            echo "<div class='viewAdmin'>";
            echo '<button type="button" onclick="btnAddCategory()" class="btn btn-secondary">Thêm Danh Mục</button>';
            echo '<button type="button" onclick="btnAddProduct()" class="btn btn-secondary">Thêm Sản Phẩm</button>';
            echo '<button type="button" onclick="btnCheckOrder()" class="btn btn-secondary">Đơn Hàng Chưa Hoàn Tất</button>';
            echo "</div>";
        }
        echo "</div>";
                echo "<div class='add' style='display:none'>";
                require 'addAddress.php';
                echo '<button type="button" onclick="btnCancel()" class="btn btn-secondary">Hủy bỏ</button>';
                echo "</div>";
        echo "<div class='order' style='display:none'>";
        require 'status_order.php';
        echo '<button type="button" onclick="btnCancel()" class="btn btn-secondary">Hủy bỏ</button>';
        echo "</div>";
        if ($_SESSION['role']==1){
            echo "<div class='addCategory' style='display:none'>";
            require 'addCategory.php';
            echo '<button type="button" onclick="btnCancel()" class="btn btn-secondary">Hủy bỏ</button>';
            echo "</div>";
            echo "<div class='addProduct' style='display:none'>";
            require 'addProduct.php';
            echo '<button type="button" onclick="btnCancel()" class="btn btn-secondary">Hủy bỏ</button>';
            echo "</div>";
        }
    
    
}
?>
<script>
    function btnAddProduct(){
        $(".view").hide();
        $(".add").hide();
        $(".order").hide();
        $(".addCategory").hide();
        $(".addProduct").show();
    }
    function btnAdd(){
        $(".view").hide();
        $(".order").hide();
        $(".add").show();
        $(".addCategory").hide();
        $(".addProduct").hide();
    }
    function btnOrder(){
        
        $(".view").hide();
        $(".order").show();
        $(".add").hide();
        $(".addCategory").hide();
        $(".addProduct").hide();
    }
    function btnCancel(){
        $(".view").show();
        $(".add").hide();
        $(".order").hide();
        $(".addCategory").hide();
        $(".addProduct").hide();
    }
    function btnAddCategory(){
        $(".view").hide();
        $(".add").hide();
        $(".order").hide();
        $(".addCategory").show();
        $(".addProduct").hide();
    }
</script>