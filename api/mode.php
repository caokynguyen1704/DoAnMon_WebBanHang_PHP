<?php
if (isset($_SESSION['role'])){
    if ($_SESSION['role']==0){
        echo "<div class='view'>";
        require 'viewAddress.php';
        echo '<button type="button" onclick="btnAdd()" class="btn btn-secondary">Thêm địa chỉ</button>';
        echo "</div>";
        echo "<div class='add' style='display:none'>";
        require 'addAddress.php';
        echo '<button type="button" onclick="btnCancel()" class="btn btn-secondary">Hủy bỏ</button>';
        echo "</div>";
    }
}
?>
<script>
    function btnAdd(){
        $(".view").hide();
        $(".add").show();
    }
    function btnCancel(){
        $(".view").show();
        $(".add").hide();
    }
</script>