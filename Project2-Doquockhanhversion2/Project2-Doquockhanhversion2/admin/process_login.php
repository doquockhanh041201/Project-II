<!-- process_login.php -->
<?php
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "website_ivy");
?>

<?php
session_start(); // Khởi tạo phiên làm việc
 // Tệp cấu hình kết nối CSDL
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM tbl_admin WHERE admin_name='$username' AND admin_password='$password'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) { // Kiểm tra xem thông tin đăng nhập có đúng hay không
        $_SESSION['username'] = $username; // Lưu tên đăng nhập vào phiên làm việc
        header("location: index.php"); // Chuyển hướng đến trang chính
    } else {
        header("location: loginuser.php?error=1"); // Hiển thị thông báo lỗi và yêu cầu nhập lại
    }
}
?>
