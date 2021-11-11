<?php
    include_once("dbcon.php");
    include_once("posts.php");
    $db = anslutdb();

    $parent_id = filter_input(INPUT_POST, 'parent_id', FILTER_SANITIZE_SPECIAL_CHARS);

    $sql = "DELETE FROM posts WHERE post_pk = {$parent_id} OR post_fk = {$parent_id}";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    echo start_post(1);
?>