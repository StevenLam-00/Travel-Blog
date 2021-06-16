<?php

include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/middleware.php");
include(ROOT_PATH . "/app/helpers/validateState.php");

$table = 'states';

$errors = array();
$id = '';
$name = '';

$states = selectAll($table);

if (isset($_POST['add-state'])) {
    adminOnly();
    $errors = validateState($_POST);

    if (count($errors) === 0) {
        unset($_POST['add-state']);
        $state_id = create($table, $_POST);
        $_SESSION['message'] = 'State created successfully';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/admin/states/index.php');
        exit();
    } else {
        $name = $_POST['name'];
    }
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $state = selectOne($table, ['id' => $id]);
    $id = $state['id'];
    $name = $state['name'];
}

if (isset($_GET['del_id'])) {
    adminOnly();
    $id = $_GET['del_id'];
    $count = delete($table, $id);
    $_SESSION['message'] = 'State deleted successfully';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . '/admin/states/index.php');
    exit();
}


if (isset($_POST['update-state'])) {
    adminOnly();
    $errors = validateState($_POST);

    if (count($errors) === 0) {
        $id = $_POST['id'];
        unset($_POST['update-state'], $_POST['id']);
        $topic_id = update($table, $id, $_POST);
        $_SESSION['message'] = 'State updated successfully';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/admin/states/index.php');
        exit();
    } else {
        $id = $_POST['id'];
        $name = $_POST['name'];
    }
}
