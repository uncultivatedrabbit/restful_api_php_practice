<?php

include_once('../header.php');

// Instantiate blog post obj
$post = new Post($db);

// Get ID
$post->id = isset($_GET['id']) ? $_GET['id'] : die();

// Get post
$post->read_single();

// Create array
$post_arr = array(
  'id' => $post->id,
  'title' => $post->title,
  'body' => html_entity_decode($post->body),
  'author' =>$post->author,
  'category_id' => $post->category_id,
  'category_name' => $post->category_name
);

// Make JSON 
print_r(json_encode($post_arr));