<?php 
    if (isset($_SESSION['status']) && $_SESSION['status'] != "") {
    ?>
        <script language="javascript">; 
            alert(<?php echo $_SESSION['status']; ?>); 
        </script>;
    <?php 
        unset($_SESSION['status']);
    }
?>