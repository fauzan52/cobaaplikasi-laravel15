<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

class Post
{
    static $postingan_post = [
        [
            "title" => "Judul Postingan Pertama",
            "slug" => "judul-postingan-pertama",
            "author" => "Fauzan Alghifari",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius iste, quam molestiae repudiandae iure, autem dolore dicta eaque quaerat sint architecto. Illo odit explicabo, libero ipsam, quas doloribus voluptatum optio vitae mollitia numquam, in incidunt! Autem a ipsam eos dolores quisquam neque, fugiat possimus repellendus quaerat! Eveniet architecto consectetur temporibus nisi repellat perspiciatis, sapiente inventore voluptatibus explicabo veniam minus excepturi quas odit similique aliquid tempora exercitationem possimus, minima nemo cumque repellendus tempore. Reiciendis, non amet? Ex eveniet harum aliquid fugit."
        ],
        [
            "title" => "Judul Postingan Kedua",
            "slug" => "judul-postingan-kedua",
            "author" => "Odink",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui optio vitae ut veritatis sit rerum, veniam nostrum, iusto, aliquam maiores explicabo dolorum molestias cumque. Eaque, quos quibusdam doloremque distinctio earum illo nostrum, quasi eum quia, aliquam officiis tenetur suscipit obcaecati ratione. Ipsam, officia nesciunt blanditiis impedit voluptas possimus molestiae? Vel, consectetur officia, veniam labore eligendi consequatur sunt quos maxime dolorum reiciendis dolore, molestiae quod tempora nisi esse odio sed modi fugit corrupti exercitationem soluta iure ullam autem. Libero reiciendis animi itaque illum consequatur quaerat recusandae rem tempora ut aperiam, aliquid quo facilis minus, non quasi, voluptas fuga quibusdam maiores quia."
        ]
    ];

    public static function all(){
        return collect (self::$postingan_post);
    }

    public static function find($slug){
        $posts = static::all();
        
        return $posts -> firstWhere('slug', $slug);
    }

}
