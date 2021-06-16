<?php

include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/middleware.php");
include(ROOT_PATH . "/app/helpers/validateProvince.php");

$table = 'provinces';

$errors = array();
$id = '';
$name = '';

$provinces = selectAll($table);

if (isset($_POST['add-province'])) {
    adminOnly();
    $errors = validateProvince($_POST);

    if (count($errors) === 0) {
        unset($_POST['add-province']);
        $province_id = create($table, $_POST);
        $_SESSION['message'] = 'Province created successfully';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/admin/provinces/index.php');
        exit();
    } else {
        $name = $_POST['name'];
    }
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $province = selectOne($table, ['id' => $id]);
    $id = $province['id'];
    $name = $province['name'];
}

if (isset($_GET['del_id'])) {
    adminOnly();
    $id = $_GET['del_id'];
    $count = delete($table, $id);
    $_SESSION['message'] = 'Province deleted successfully';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . '/admin/provinces/index.php');
    exit();
}


if (isset($_POST['update-province'])) {
    adminOnly();
    $errors = validateProvince($_POST);

    if (count($errors) === 0) {
        $id = $_POST['id'];
        unset($_POST['update-province'], $_POST['id']);
        $topic_id = update($table, $id, $_POST);
        $_SESSION['message'] = 'Province updated successfully';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/admin/provinces/index.php');
        exit();
    } else {
        $id = $_POST['id'];
        $name = $_POST['name'];
    }
}
