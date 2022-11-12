<?php include("../components/header.php") ?> <?php include("../includes/dbconfig.php") ?> <div class="wrapper"> <?php include("C:/xampp/htdocs/musical-dacn1/components/menu.php") ?>
  <!-- slide -->
   <div class="clearfix"></div>
   <div class="hom-slider">
      <div class="container">
         <div id="sequence">
            <div class="sequence-prev">
               <i class="fa fa-angle-left"></i>
            </div>
            <div class="sequence-next">
               <i class="fa fa-angle-right"></i>
            </div>
            <ul class="sequence-canvas">
               <li class="animate-in">
                  <div class="flat-caption caption1 formLeft delay300 text-center">
                     <span class="suphead">Paris show 2020</span>
                  </div>
                  <div class="flat-caption caption2 formLeft delay400 text-center">
                     <h1>Nhạc cụ mới của 2020</h1>
                  </div>
                  <div class="flat-caption caption3 formLeft delay500 text-center">
                     <p>Trống là một nhạc cụ quan trọng trong bộ gõ, nó quyết định khá nhiều về nhịp nhạc, làm cho nhạc sinh động hơn cũng như giữ nhịp cho nhạc. <br>Nhiều bài nhạc chỉ cần trống thôi cũng đủ tạo nên bản nhạc.. </p>
                  </div>
                  <div class="flat-button caption4 formLeft delay600 text-center">
                     <a class="more" href="#">More Details</a>
                  </div>
                  <div class="flat-image formBottom delay200" data-duration="5" data-bottom="true">
                     <img src="../images/slider1.png" alt="">
                  </div>
               </li>
               <li>
                  <div class="flat-caption caption2 formLeft delay400">
                     <h1>Nhạc cụ mới của 2020</h1>
                  </div>
                  <div class="flat-caption caption3 formLeft delay500">
                     <p>Đàn nhị là nhạc cụ thuộc bộ dây có cung vĩ, do đàn có 2 dây nên gọi là đàn nhị (tiếng Trung: 二胡; bính âm: èrhú; Hán Việt: nhị hồ), <br>có xuất xứ từ Ấn Độ và vùng Trung Á. </p>
                  </div>
                  <div class="flat-button caption5 formLeft delay600">
                     <a class="more" href="#">More Details</a>
                  </div>
                  <div class="flat-image formBottom delay200" data-bottom="true">
                     <img src="../images/slider2.png" alt="">
                  </div>
               </li>
               <li>
                  <div class="flat-caption caption2 formLeft delay400 text-center">
                     <h1>Nhạc cụ mới của 2020</h1>
                  </div>
                  <div class="flat-caption caption3 formLeft delay500 text-center">
                     <p> Piano là một nhạc cụ âm thanh, có dây được phát minh ở Ý bởi <br>Bartolomeo Cristofori vào khoảng năm 1700 </p>
                  </div>
                  <div class="flat-button caption4 formLeft delay600 text-center">
                     <a class="more" href="#">More Details</a>
                  </div>
                  <div class="flat-image formBottom delay200" data-bottom="true">
                     <img src="../images/slider3.png" alt="">
                  </div>
               </li>
            </ul>
         </div>
      </div>
   </div>
   <!--hot product -->
   <div class="clearfix"></div>
   <div class="container_fullwidth">
      <div class="container">
         <div class="hot-products">
         <h3 class="title">
            <strong>Hot</strong> Products
         </h3>
         <div class="control">
            <a id="prev_hot" class="prev" href="#">&lt;</a>
            <a id="next_hot" class="next" href="#">&gt;</a>
         </div>
         <ul id="hot">
               <li>
                  <div class="row">
                     <?php 
                        $ref_table = 'Drink';
                        $fetchdata = $database->getReference($ref_table)->getValue();

                        if ($fetchdata > 0) {
                           $i = 0;
                           foreach($fetchdata as $key => $row){
                     ?> 
                  <div class="col-md-3 col-sm-6">
                     <div class="products">
                        <div class="offer">- %30</div>
                        <div class="thumbnail">
                        <a href="thongtinsp.php?id=1">
                           <img style="width:150px;height:220px" src=<?php echo $row['imageUrl'] ?>>
                        </a>
                        </div>
                        <div class="productname"> <?php echo $row['name'] ?> </div>
                        <strikes class="price" style="color:black;font-size:15px;font-weight:10;"> <?php echo $row['rating'] ?> </strikes>
                        <h4 class="price"> <?php echo $row['price'] ?>.000 VNĐ </h4>
                        <div class="button_group">
                           <a href="thongtinsp.php?id=1" class="button add-cart" type="button">Mua ngay!</a>
                           <button class="button compare" type="button">
                              <i class="fa fa-exchange"></i>
                           </button>
                           <button class="button wishlist" type="button">
                              <i class="fa fa-heart-o"></i>
                           </button>
                        </div>
                     </div>
                  </div>
                  <?php
                        }
                     }
                     ?> 
                  </div>
               </li>
               <li>
                  <div class="row">
                     <?php 
                        $ref_table = 'Drink';
                        $fetchdata = $database->getReference($ref_table)->getValue();

                        if ($fetchdata > 0) {
                           $i = 0;
                           foreach($fetchdata as $key => $row){
                        ?>
                  <div class="col-md-3 col-sm-6">
                     <div class="products">
                        <div class="offer">- %30</div>
                        <div class="thumbnail">
                        <a href="thongtinsp.php?id=1">
                           <img style="width:150px;height:220px" src="
                                                               <?php echo $row['imageUrl'] ?>">
                        </a>
                        </div>
                        <div class="productname"> <?php echo $row['name'] ?> </div>
                        <strikes class="price" style="color:black;font-size:15px;font-weight:10;"> <?php echo $row['rating'] ?> </strikes>
                        <h4 class="price"> <?php echo $row['price'] ?>.000 VNĐ </h4>
                        <div class="button_group">
                        <a href="thongtinsp.php?id=1" class="button add-cart" type="button">Mua ngay!</a>
                        <button class="button compare" type="button">
                           <i class="fa fa-exchange"></i>
                        </button>
                        <button class="button wishlist" type="button">
                           <i class="fa fa-heart-o"></i>
                        </button>
                        </div>
                     </div>
                  </div>
                  <?php
                     }
                  }
                  ?>
                  </div>
               </li>
            </ul>
         </div>
         <div class="clearfix"></div>
         <div class="featured-products">
         <h3 class="title">
            <strong>Featured </strong> Products
         </h3>
         <div class="control">
            <a id="prev_featured" class="prev" href="#">&lt;</a>
            <a id="next_featured" class="next" href="#">&gt;</a>
         </div>
         <ul id="featured">
            <li>
                  <div class="row">
                     <?php 
                        $ref_table = 'Popular';
                        $fetchdata = $database->getReference($ref_table)->getValue();

                        if ($fetchdata > 0) {
                           $i = 0;
                           foreach($fetchdata as $key => $row){
                        ?>
                  <div class="col-md-3 col-sm-6">
                     <div class="products">
                        <div class="offer">- %30</div>
                        <div class="thumbnail">
                        <a href="thongtinsp.php?id=1">
                           <img style="width:150px;height:220px" src="
                                                               <?php echo $row['imageUrl'] ?>">
                        </a>
                        </div>
                        <div class="productname"> <?php echo $row['name'] ?> </div>
                        <strikes class="price" style="color:black;font-size:15px;font-weight:10;"> <?php echo $row['rating'] ?> </strikes>
                        <h4 class="price"> <?php echo $row['price'] ?>.000 VNĐ </h4>
                        <div class="button_group">
                        <a href="thongtinsp.php?id=1" class="button add-cart" type="button">Mua ngay!</a>
                        <button class="button compare" type="button">
                           <i class="fa fa-exchange"></i>
                        </button>
                        <button class="button wishlist" type="button">
                           <i class="fa fa-heart-o"></i>
                        </button>
                        </div>
                     </div>
                  </div>
                  <?php
                     }
                  }
                  ?>
                  </div>
               </li>
               <li>
                  <div class="row">
                     <?php 
                        $ref_table = 'Popular';
                        $fetchdata = $database->getReference($ref_table)->getValue();

                        if ($fetchdata > 0) {
                           $i = 0;
                           foreach($fetchdata as $key => $row){
                        ?>
                  <div class="col-md-3 col-sm-6">
                     <div class="products">
                        <div class="offer">- %30</div>
                           <div class="thumbnail">
                              <a href="thongtinsp.php?id=1">
                                 <img style="width:150px;height:220px" src="<?php echo $row['imageUrl'] ?>">
                              </a>
                           </div>
                           <div class="productname"> <?php echo $row['name'] ?> </div>
                           <strikes class="price" style="color:black;font-size:15px;font-weight:10;"> <?php echo $row['rating'] ?> </strikes>
                           <h4 class="price"> <?php echo $row['price'] ?>.000 VNĐ </h4>
                           <div class="button_group">
                           <a href="thongtinsp.php?id=1" class="button add-cart" type="button">Mua ngay!</a>
                           <button class="button compare" type="button">
                              <i class="fa fa-exchange"></i>
                           </button>
                           <button class="button wishlist" type="button">
                              <i class="fa fa-heart-o"></i>
                           </button>
                        </div>
                     </div>
                  </div>
                  <?php
                     }
                  }
                  ?>
                  </div>
               </li>
            </ul>
         </div>
      </div>
   </div>
</div>

<?php include("../footer.php") ?>
<?php include("../components/footer.php") ?>