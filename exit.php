<?php
   if(!file_exists("/path/to/data-file.txt")) {
       // nếu chương trình chạy vào đây thì code ở phía sau sẽ không được thực thi
       die("Không tìm thấy file eenày!!!"); 
   }
   else {
       $file=fopen("/path/to/data-file.txt","r");
       print "Mở file thành công!!!";
   }
   // logic ....
?>