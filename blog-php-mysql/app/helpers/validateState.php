<?php

function validateState($state)
{
    $errors = array();

    if (empty($state['name'])) {
        array_push($errors, 'Name is required');
    }

    $existingState = selectOne('states', ['name' => $post['name']]);
    if ($existingState) {
        if (isset($post['update-state']) && $existingState['id'] != $post['id']) {
            array_push($errors, 'Name already exists');
        }

        if (isset($post['add-state'])) {
            array_push($errors, 'Name already exists');
        }
    }

    return $errors;
}
