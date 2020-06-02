<?php

include_once('../header.php');

// Instantiate blog post obj
$post = new Post($db);

// Blog post query
$result = $post->read();

// Get row count
$num = $result->rowCount();

// Check if any posts
if ($num > 0){
  // Post array
  $posts_arr = array();
  $posts_arr['data'] = array();

  while($row = $result->fetch(PDO::FETCH_ASSOC)){
    extract($row);
    
    $post_item = array(
      'id' => $id,
      'title' => $title,
      'body' => html_entity_decode($body),
      'author' => $author,
      'category_id' => $category_id,
      'category_name' => $category_name
    );
    
    // Push post item to "data"
    array_push($posts_arr["data"], $post_item);
  }

  // turn data to JSON and output
  echo json_encode($posts_arr);
} else {
  // when no posts
  echo json_encode(
    array('message' => 'No Posts Found')
  );
}