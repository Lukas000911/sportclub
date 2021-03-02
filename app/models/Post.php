<?php

class Post
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getPosts()
    {
        $this->db->query('SELECT * FROM posts');

        $results = $this->db->resultSet();

        return $results;
    }

    public function addComment($data)
    {
        //prepare statement
        $this->db->query("INSERT INTO posts (`user_id`, `author`, `comment_body`) VALUES (:user_id, :author, :comment_body)");

        // add values
        $this->db->bind(':author', $data['userName']);
        $this->db->bind(':comment_body', $data['comment']);
        $this->db->bind(':user_id', $data['user_id']);

        //make query
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
