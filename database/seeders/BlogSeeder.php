<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'password' => Hash::make('password123'),
        ]);

        $author1 = User::create([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'role' => 'author',
            'password' => Hash::make('password123'),
        ]);

        $author2 = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'role' => 'author',
            'password' => Hash::make('password123'),
        ]);

        $user1 = User::create([
            'name' => 'Bob Wilson',
            'email' => 'bob@example.com',
            'role' => 'user',
            'password' => Hash::make('password123'),
        ]);

        $posts = [
            [
                'title' => 'Getting Started with Laravel',
                'content' => 'Laravel is a powerful PHP framework that makes web development enjoyable. Let\'s dive into the basics!<br><br><img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=800&h=600&fit=crop" alt="Code on screen"><br><br>Laravel provides an elegant syntax and many built-in features like routing, ORM, authentication, and more.',
                'user_id' => $author1->id,
                'likes' => 42,
                'dislikes' => 3,
            ],
            [
                'title' => 'Building Modern Web Applications',
                'content' => 'Modern web development is all about user experience and performance. Here are some tips for building great applications.<br><br><img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&h=600&fit=crop" alt="Workspace with laptop"><br><br>Key principles: responsiveness, accessibility, and clean code architecture.',
                'user_id' => $author2->id,
                'likes' => 28,
                'dislikes' => 1,
            ],
            [
                'title' => 'The Art of Clean Code',
                'content' => 'Writing clean, maintainable code is essential for every developer. Let\'s explore some best practices.<br><br><img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=800&h=600&fit=crop" alt="Clean workspace"><br><br>Remember: Code is read more often than it\'s written.',
                'user_id' => $author1->id,
                'likes' => 65,
                'dislikes' => 2,
            ],
            [
                'title' => 'Database Design Best Practices',
                'content' => 'Good database design is the foundation of any great application. Let\'s look at normalization and relationships.<br><br><img src="https://images.unsplash.com/photo-1518770660439-4636190af475?w=800&h=600&fit=crop" alt="Circuit board"><br><br>Always plan your schema before you start coding.',
                'user_id' => $author2->id,
                'likes' => 34,
                'dislikes' => 0,
            ],
            [
                'title' => 'Introduction to REST APIs',
                'content' => 'REST APIs allow applications to communicate over HTTP. Let\'s understand the basics of RESTful design.<br><br><img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=800&h=600&fit=crop" alt="Data visualization"><br><br>Use proper HTTP verbs: GET, POST, PUT, DELETE.',
                'user_id' => $admin->id,
                'likes' => 51,
                'dislikes' => 4,
            ],
        ];

        foreach ($posts as $postData) {
            $post = Post::create($postData);

            Comment::create([
                'content' => 'Great article! Thanks for sharing.',
                'user_id' => $user1->id,
                'post_id' => $post->id,
                'likes' => rand(2, 10),
                'dislikes' => 0,
            ]);

            Comment::create([
                'content' => 'I learned a lot from this!',
                'user_id' => $author2->id,
                'post_id' => $post->id,
                'likes' => rand(1, 5),
                'dislikes' => 0,
            ]);
        }
    }
}
