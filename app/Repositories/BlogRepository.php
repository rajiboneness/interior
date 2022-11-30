<?php

namespace App\Repositories;

use App\Interfaces\BlogInterface;
use App\Models\Blog;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;

class BlogRepository implements BlogInterface 
{
    use UploadAble;

    public function getAllBlogs() 
    {
        return Blog::latest('id')->get();
    }
    
    public function CreateBlog(array $blogDetails){

        $upload_path = "uploads/blog/";

        $collection = collect($blogDetails);
        $blog = new Blog;
        $blog->title = $collection['title'];
        $blog->category_id = $collection['cat_id'];
        $blog->author_id = $collection['auth_id'];
        $blog->desc = $collection['desc'];

        // Blog Image
        if (isset($blogDetails['image'])) {
            $image = $collection['image'];
            $imageName = time().mt_rand().".".$image->getClientOriginalExtension();
            $image->move($upload_path, $imageName);
            $uploadedImage = $imageName;
            $blog->image = $upload_path.$uploadedImage;
        }
        $blog->save();
        return $blog;
    }

    public function getBlogById($BlogId){
        return Blog::findOrFail($BlogId);
    }

    public function UpdateBlog($blogId, array $newDetails){

        $upload_path = "uploads/blog/";
        $blog = Blog::findOrFail($blogId);
        $collection = collect($newDetails); 

        $blog->title = $collection['title'];
        $blog->desc = $collection['desc'];
        $blog->category_id = $collection['cat_id'];
        $blog->author_id = $collection['auth_id'];

        if (isset($newDetails['image'])) {
            $image = $collection['image'];
            $imageName = time().mt_rand().".".$image->getClientOriginalExtension();
            $image->move($upload_path, $imageName);
            $uploadedImage = $imageName;
            $blog->image = $upload_path.$uploadedImage;
        }
        // dd($blog);
        $blog->save();
        return $blog;
    }

     public function toggleStatus($id){
         $blog = Blog::findOrFail($id);
         $status = ($blog->status == 1)? 0 : 1;
         $blog->status = $status;
         $blog->save();
         return $blog;
     }

    public function DeleteBlog($id){
        $blog = Blog::findOrFail($id);
        if($blog){
            $blog->delete();
            return $blog;
        }
    }
}