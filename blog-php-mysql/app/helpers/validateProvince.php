<?php

function validateProvince($province)
{
    $errors = array();

    if (empty($province['name'])) {
        array_push($errors, 'Name is required');
    }

    $existingProvince = selectOne('provinces', ['name' => $post['name']]);
    if ($existingProvince) {
        if (isset($post['update-province']) && $existingProvince['id'] != $post['id']) {
            array_push($errors, 'Name already exists');
        }

        if (isset($post['add-province'])) {
            array_push($errors, 'Name already exists');
        }
    }

    return $errors;
}
