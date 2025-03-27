<?php
// session_start();

// Khởi tạo danh sách sinh viên nếu chưa tồn tại
if (!isset($_SESSION['students'])) {
    $_SESSION['students'] = array();
}

// Lấy danh sách sinh viên
function getStudents() {
    return $_SESSION['students'];
}

// Thêm sinh viên
function addStudent($id, $name, $age) {
    $_SESSION['students'][$id] = array(
        'id' => $id,
        'name' => $name,
        'age' => $age
    );
}

// Sửa sinh viên
function updateStudent($id, $name, $age) {
    if (isset($_SESSION['students'][$id])) {
        $_SESSION['students'][$id] = array(
            'id' => $id,
            'name' => $name,
            'age' => $age
        );
    }
}

// Xóa sinh viên
function deleteStudent($id) {
    if (isset($_SESSION['students'][$id])) {
        unset($_SESSION['students'][$id]);
    }
}

// Lấy thông tin một sinh viên
function getStudent($id) {
    return isset($_SESSION['students'][$id]) ? $_SESSION['students'][$id] : null;
}
?>
