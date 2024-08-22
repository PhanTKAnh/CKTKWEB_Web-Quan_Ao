<!-- <h4 style="text-align:center">BỘ SƯU TẬP</h4> -->
    <ul class="list_sidebar">
        <?php
                    
            $sql_danhmuc_bv = "SELECT *  FROM tbl_danhmucbaiviet ORDER BY id_baiviet DESC";
            $query_danhmuc_bv = mysqli_query($mysqli,$sql_danhmuc_bv);
            while($row = mysqli_fetch_array($query_danhmuc_bv)) {

            ?> 
            <li><a href="index.php?quanly=danhmucbaiviet&id=<?php echo $row['id_baiviet'] ?>"><?php echo $row['tendanhmuc_baiviet'] ?></a></li>
            <?php

            }
            ?>       
    </ul>





<!-- <?php
    $sql_bv = "SELECT *  FROM tbl_baiviet WHERE tinhtrang=1 ORDER BY id DESC";
    $query_bv = mysqli_query($mysqli,$sql_bv);
    
?>

    <ul class="baiviet">
        <?php
            while($row_bv = mysqli_fetch_array($query_bv)) {
        ?>
            <li>
                <h4><?php echo $row_bv['tenbaiviet'] ?></h4>     
                <img src="admincp/modules/quanlybaiviet/uploads/<?php echo $row_bv['hinhanh'] ?>">
                <p class="tittle_product"><?php echo $row_bv['tomtat'] ?></p>               
                        
                <p style="margin:10px" class="tittle_product"><?php echo $row_bv['noidung'] ?></p>
            </li>
            <?php
            }
            ?>
    </ul>  -->
