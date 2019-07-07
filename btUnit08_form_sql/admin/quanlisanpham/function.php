<?php 
function upload_file($file){

        $target_dir = "img/";  // thư mục chứa file upload

        $target_file = $target_dir . basename($_FILES[$file]["name"]); // link sẽ upload file lên
        
        if (move_uploaded_file($_FILES[$file]["tmp_name"], $target_file)) { // nếu upload file không có lỗi 
           return basename( $_FILES[$file]["name"]);
        } else { // Upload file có lỗi 
            echo "Sorry, there was an error uploading your file.";
        }
}
 ?>