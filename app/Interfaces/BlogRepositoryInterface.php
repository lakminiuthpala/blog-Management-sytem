<?php

namespace App\Interfaces;

interface BlogRepositoryInterface
{
    public function getAllBlogsForLoggedUser($user);

    public function storeBlog($request);

    public function findBlog($id);

    public function updateBlog($data, $user);

    public function deleteBlog($data);

    public function getAllBlogs();
}
