# Questions w Réponses détaillées 3la Code

---

## Partie 1: Structure Générale w Configuration

### Q1: Chnoua framework li mest3amel ?

Projet hedha yesta3mel **Laravel**, framework PHP moderne w popular 3la web apps.

### Q2: Chnoua version minimale mta3 PHP ?

Laravel y7eb PHP 8.2 wela akther.

### Q3: Chnoua les dossiers principaux w chnoua ya3mlou ?

* `app/`: cœur mta3 l’app (models, controllers, middleware, etc.)
* `bootstrap/`: initialise framework
* `config/`: fichiers config
* `database/`: migrations, seeders, factories
* `public/`: entry point (`index.php`) + fichiers public
* `resources/`: views, CSS/JS raw, languages
* `routes/`: routing files
* `storage/`: logs, uploads, cache
* `tests/`: unit + functional tests
* `vendor/`: dépendances Composer (auto generated)

### Q4: Chnoua DB system ?

Projet yesta3mel **SQLite**, lightweight DB fi file `database/database.sqlite`.

---

## Partie 2: Modèles w Database

### Q5: Chnoua modèles Eloquent w win ?

Fi `app/Models/`:

1. `User.php`: user
2. `Post.php`: blog post
3. `Comment.php`: comment 3la post

### Q6: Champs mta3 `users` ?

* `id`: primary key auto increment
* `name`: string (required)
* `email`: unique (required)
* `role`: default 'user'
* `password`: string
* ma fama ch timestamps (`$timestamps = false`)

### Q7: Champs mta3 `posts` ?

* `id`
* `title`: string
* `content`: long text
* `user_id`: foreign key → users.id (`cascadeOnDelete`)
* `likes`: int default 0
* `dislikes`: int default 0
* `created_at`, `updated_at`

### Q8: Champs mta3 `comments` ?

* `id`
* `content`: long text
* `user_id`: foreign key
* `post_id`: foreign key
* `likes`, `dislikes`
* ma fama ch timestamps

### Q9: Chnoua `$fillable` ?

Property sécurisée tحدد chnoua champs ynajmou yet3amrou b mass assignment (`create()`, `update()`).

### Q10: Relations bin modèles ?

* User ↔ Post: one-to-many
* User ↔ Comment: one-to-many
* Post ↔ Comment: one-to-many

b `hasMany()` w `belongsTo()`.

### Q11: Methods fi User ?

* `isAdmin()`
* `isAuthor()` (author wela admin)

### Q12: Chnoua `BlogSeeder` ?

Seeder fi `database/seeders/`:

* ycreate 4 users (admin, 2 authors, 1 user)
* 5 posts (HTML + images)
* 2 comments لكل post

---

## Partie 3: Routing

### Q13: Win routes ?

* `routes/web.php`
* `routes/auth.php`

### Q14: Routes public ?

* `/`: list posts
* `/posts/{post}`: show post
* login/register routes

### Q15: Routes li y7ebou auth ?

* CRUD posts
* comments
* likes/dislikes
* user management (admin bark)
* logout

### Q16: `whereNumber('post')` chnoua ?

constraint tفرض `{post}` يكون number → avoids invalid queries.

### Q17: Route name ?

identifier b `->name()`
yesta3mel fi Blade: `route('name')`.

---

## Partie 4: Controllers

### Q18: Controllers ?

* PostController
* CommentController
* ReactionController
* UserController
* Controller (base)
* Auth controllers (Breeze)

### Q19: `index()` fi PostController ?

* yjib `search` w `sort`
* `with('user')` (eager loading)
* `when()` filters
* yb3ath data lel view

### Q20: Chnoua eager loading ?

`with()` yload relations marra wahda → avoids N+1 problem.

### Q21: `show()` ?

* route model binding
* `$post->load('comments.user', 'user')`
* return view

### Q22: Access protection ?

* middleware `auth`
* role check
* ownership check
* `abort(403)`

### Q23: Validation ?

`$request->validate()`:

* post: title + content
* comment: content
* role: user/author/admin

fail → redirect + errors + `old()`.

### Q24: ReactionController ?

* like/dislike post/comment
* `increment()`
* `back()`

⚠️ ma يمنعش multiple votes.

### Q25: “au moins admin” ?

* check ken admin role باش يتبدل
* count admins
* ken wa7ed bark → refuse
* sinon → ok

---

## Partie 5: Views (Blade)

### Q26: Chnoua Blade ?

templating engine mta3 Laravel:

* layouts
* conditions
* loops
* includes
* auto escaping (XSS protection)

### Q27: Layout principal ?

`x-layouts.blog`

### Q28: blog.blade.php ?

* HTML structure
* navbar
* messages (success/error)
* `$errors`
* `{{ $slot }}`
* CSS

### Q29: Directives fi index ?

* `@forelse`
* `@php`
* `{!! !!}` (raw HTML)
* `{{ }}`
* `route()`
* `old()`

### Q30: Image extraction ?

* `preg_match()` regex
* affiche image wala placeholder 📝

### Q31: Truncate content ?

* remove `<img>`
* `strip_tags()`
* `Str::limit(200)`

### Q32: Auth directives ?

* `@auth`
* `@guest`
* `auth()->user()`
* `auth()->id()`

### Q33: DELETE/PUT forms ?

* method POST
* `@method('PUT'|'DELETE')`
* `@csrf`

---

## Partie 6: Sécurité

### Q34: CSRF ?

`@csrf` token
Laravel verify auto.

### Q35: Escaping ?

`{{ }}` → safe (anti **Cross-Site Scripting**)
`{!! !!}` → raw (danger)

### Q36: Passwords ?

hashed b `Hash::make()` (bcrypt/argon2).

### Q37: `cascadeOnDelete()` ?

* delete user → delete posts/comments
* delete post → delete comments

---

## Partie 7: Divers

### Q38: Kifeh launch projet ?

1. `composer install`
2. config `.env`
3. `php artisan key:generate`
4. `php artisan migrate --seed`
5. `php artisan serve`

### Q39: Chnoua **Laravel Breeze** ?

starter kit minimal auth (login, register, reset password…).

### Q40: Improvements ?

1. likes system better (no duplicate votes)
2. pagination
3. edit comments
4. image upload system
5. stricter validation
6. cache
7. tests
8. logging actions
