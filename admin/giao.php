
SELECT * FROM  product 
WHERE pdate >= DATEADD(day,-30,GETDATE()) 
and   pdate <= getdate()


where DATE(date)=DATE(NOW())

 $soluongmoi = $row1['soluong'] - $row['soluong'];
                 $sql2 = "UPDATE hanghoa SET soluong='$soluongmoi' where id=".$row['id'];
                  $ketqua2 = mysqli_query($conn, $sql2);