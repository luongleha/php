<?php
require ("students.php");

// Biến lưu trữ data và error
// Biến này phải khai báo ở đây để ở dưới sử dụng sẽ không bị lỗi
$data = array();
$errors = array();

// Biến kiểm tra có phải action edit hay không
$is_update_action = false;

// Trường hợp edit thì ta lấy thông tin để show ra cho người dùng thấy
if (!empty($_GET['id']))
{
    $data = getStudent($_GET['id']);
    $is_update_action  = true;
}

// Nếu người dùng click vào nút submit
if (!empty($_POST['add_student']))
{

    // Lấy thông tin
    $data['student_id'] = isset($_POST['id']) ? $_POST['id'] : '';
    $data['student_name'] = isset($_POST['name']) ? $_POST['name'] : '';
    $data['student_email'] = isset($_POST['email']) ? $_POST['email'] : '';

    // Validate
    if (empty($data['student_id'])){
        $errors['student_id'] = 'Ban chua nhap MSV';
    }

    if (empty($data['student_name'])){
        $errors['student_name'] = 'Ban chua nhap Ten';
    }

    if (empty($data['student_email'])){
        $errors['student_email'] = 'Ban chua nhap Email';
    }

    //  Nếu dữ liệu hợp lệ thì thực hiện thao tác update thông tin
    // đồng thời redirect về trang danh sách
    if (empty($errors)){
        updateStudent($data['student_id'], $data['student_name'], $data['student_email']);
        header("Location:student-list.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <h2 align="center">ZENT GROUP - PHP - Them thong tin vao session</h2>
        <a href="student-list.php" style="font-size: 30px;">Quay lai</a>
        <form method="post" role="form">
            <div class="form-group">
                <label for="">Ma sinh vien</label>
                <br>
                <input type="text" name="id" value="<?php echo !empty($data['student_id']) ? $data['student_id'] : ''; ?>" />
                <?php echo !empty($errors['student_id']) ? $errors['student_id'] : ''; ?>
            </div>
            <div class="form-group">
                <label for="">Ten sinh vien</label>
                <br>
                <input type="text" name="name" value="<?php echo !empty($data['student_name']) ? $data['student_name'] : ''; ?>" />
                <?php echo !empty($errors['student_name']) ? $errors['student_name'] : ''; ?>
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <br>
                <input type="text" name="email" value="<?php echo !empty($data['student_email']) ? $data['student_email'] : ''; ?>" />
                <?php echo !empty($errors['student_email']) ? $errors['student_email'] : ''; ?>
            </div>
            <tr>
                <td></td>
                <td><input type="submit" name="add_student" value="<?php echo ($is_update_action) ? "Cap nhat" : "Them moi"; ?>" /></td>
            </tr>

        </form>
    </div>
</body>
</html>