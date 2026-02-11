# Hello é uma rede social

## Funcionalidades implementadas e arquivos

### ORM - Relacionamentos 

- Relacionamento One To One (`User -> Profile`), implementado nos arquivos `app/Models/User.php` e `app/Models/Profile.php`.

- Relacionamento One To Many (`User -> Post`), implementado nos arquivos `app/Models/User.php` e `app/Models/Post.php`.

- Relacionamento Many To Many (`User <-> Group`), implementado nos arquivos `app/Models/User.php` e `app/Models/Group.php`.

- Relacionamento Has One Through (`User -> PrivacySetting` via `Profile`), implementado nos arquivos `app/Models/User.php`, `app/Models/Profile.php` e `app/Models/PrivacySetting.php`.

- Relacionamento Has Many Through (`Country -> Post` via `User`), implementado no arquivo `app/Models/Country.php`.

- Relacionamento One To One Polymorphic (`User/Group -> Image`), implementado nos arquivos `app/Models/User.php`, `app/Models/Group.php` e `app/Models/Image.php`.

- Relacionamento One To Many Polymorphic (`Post/Photo -> Comment`), implementado nos arquivos `app/Models/Post.php`, `app/Models/Photo.php` e `app/Models/Comment.php`.

- Relacionamento Many To Many Polymorphic (`Post/Video <-> Tag`), implementado nos arquivos `app/Models/Post.php`, `app/Models/Video.php` e `app/Models/Tag.php`.

### LARAVEL - 

- Middleware de entrada, implementado no arquivo `app/Http/Middleware/EnsureHelloClientHeader.php`.

- Middleware de saída, implementado no arquivo `app/Http/Middleware/AddHelloResponseHeaders.php`.

- Registro dos middlewares customizados, implementado no arquivo `bootstrap/app.php`.

- Diferença entre grupo `web` e `api` em rotas de demonstração, implementada nos arquivos `routes/web.php` e `routes/api.php`.

- Route Model Binding com `Post`, implementado no arquivo `app/Http/Controllers/PostController.php`.

- Rota web com Route Model Binding (`/posts/{post}`), implementada no arquivo `routes/web.php`.

- Rota api com Route Model Binding (`/api/posts/{post}`), implementada no arquivo `routes/api.php`.