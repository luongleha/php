
<?php

require ("students.php");

$students = getAllStudents();

?>



<!DOCTYPE html>

<html>

<head>

    <title>Danh sách sinh viên</title>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
    <div class="add" style="text-align: center;">
    <a href="student-add.php" style="font-size: 30px; color: red;">THÊM</a>
    </div>

    <table border="0" cellspacing="0" cellpadding="10" width="100%">

        <tr>

            <td>Ma sinh vien</td>

            <td>Ho va ten</td>

            <td>Email</td>

            <td>Action</td>

        </tr>

        <?php foreach ($students as $item){ ?>

            <tr>

                <td><?php echo $item['student_id']; ?></td>

                <td>

                    <a href="student-add.php?id=<?php echo $item['student_id']; ?>"><?php echo $item['student_name']; ?></a>

                </td>

                <td><?php echo $item['student_email']; ?></td>

                <td>

                    <form method="post" action="student-delete.php">

                        <input type="hidden" value="<?php echo $item['student_id']; ?>" name="student_id"/>

                        <input onclick="return confirm('Ban co chac muon xoa sinh vien nay hay khong?');" type="submit" value="Delete" name="delete"/>
                    <button type="submit" class="btn btn-primary">Hiển thị theo dòng</button>
                    </form>
                        
                </td>

            </tr>

        <?php } ?>

    </table>

</body>

