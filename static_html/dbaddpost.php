<?php
    include_once("dbcon.php");
    include_once("posts.php");
    $db = anslutdb();

    $parent_pk = filter_input(INPUT_POST, 'parent_id', FILTER_SANITIZE_SPECIAL_CHARS);
    //$text = filter_input(INPUT_POST, 'text_value', FILTER_SANITIZE_SPECIAL_CHARS);
    $text = $_POST['text_value'];
    $sql = "INSERT HIGH_PRIORITY INTO `posts` (`post_pk`, `post_rubrik`, `post_text`, `post_fk`, `course_fk`, `created_at`, `upvotes`, `user_fk`) VALUES (NULL, 'Svar', '{$text}', '{$parent_pk}', 'Matte', CURRENT_TIMESTAMP, '0', 'Angel');";
    $stmt = $db->prepare($sql);
    $stmt->execute();

   echo start_post(1);
?>