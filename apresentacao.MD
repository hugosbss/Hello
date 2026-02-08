🔧 Middlewares que vêm prontos no Laravel
🔹 Globais (executam em TODA requisição)

Exemplos:

TrustProxies

PreventRequestsDuringMaintenance

TrimStrings

ConvertEmptyStringsToNull

💬 Você pode dizer:

“São middlewares de infraestrutura, executam antes de qualquer rota.”

🔹 Grupo web

Usado em rotas de navegador (sessão, CSRF, cookies):

EncryptCookies

AddQueuedCookiesToResponse

StartSession

ShareErrorsFromSession

VerifyCsrfToken

SubstituteBindings

📌 Tem sessão, cookies e CSRF.

🔹 Grupo api

Usado em APIs REST:

ThrottleRequests

SubstituteBindings

📌 Sem sessão, sem cookies, sem CSRF
📌 Stateless

💬 Frase de apresentação:

“O grupo api é mais leve e stateless, ideal para aplicações REST.”

🔹 2️⃣ Ciclo de Requisição do Laravel (fluxo REAL)

Use esse fluxo no slide:

Request
   ↓
Global Middleware
   ↓
Route Middleware / Groups (web ou api)
   ↓
Controller
   ↓
Model (Eloquent ORM)
   ↓
Controller (retorno)
   ↓
Middleware (response)
   ↓
Response


💡 Isso casa perfeitamente com a demo.

🔹 3️⃣ Ordem exata de execução (importante!)

Ordem real:

Global Middleware

Middleware de Grupo (web ou api)

Middleware da Rota

Controller

Model / ORM

View / JSON

Middleware (pós-response)

💬 Frase pronta:

“Middleware pode atuar tanto antes quanto depois da execução do controller.”

🔹 4️⃣ Responsabilidade de cada camada
🔹 Route

Mapeia URL → ação

Define middleware

Pode usar Route Model Binding

Route::get('/posts/{post}', [PostController::class, 'show']);

🔹 Middleware

Intercepta a requisição

Decide se continua ou bloqueia

Pode modificar Request ou Response

return $next($request);

🔹 Controller

Orquestra a regra de negócio

Chama Models

Retorna resposta

🔹 Model (Eloquent ORM)

Representa a tabela

Encapsula regras de acesso a dados

Relacionamentos e queries

🔹 View

Camada de apresentação

Blade (web) ou JSON (API)

🔹 5️⃣ Middleware de entrada vs saída
🔸 Middleware de ENTRADA

Executa antes do controller

Exemplo:

Autenticação

Permissão

Logs

Rate limit

if (!auth()->check()) {
    abort(401);
}

🔸 Middleware de SAÍDA

Executa depois do controller

Exemplo:

Alterar headers

Logs de resposta

Cache

$response = $next($request);
$response->headers->set('X-App', 'Laravel');
return $response;


💬 Frase matadora:

“Middleware funciona como um filtro bidirecional da requisição.”

🔹 6️⃣ Route Model Binding (conceito + prática)
🔸 Sem Model Binding
public function show($id)
{
    $post = Post::findOrFail($id);
}

🔸 Com Model Binding
public function show(Post $post)
{
    return $post;
}


📌 O Laravel:

Lê o parâmetro da rota

Consulta o banco

Injeta o Model automaticamente

💬 Frase:

“Route Model Binding reduz código repetitivo e aumenta segurança.”

🔹 7️⃣ web vs api (diferença clara)
web	api
Sessão	Stateless
Cookies	Sem cookies
CSRF	Sem CSRF
Blade	JSON
Login por sessão	Token / JWT

💬 Frase:

“A separação web e api deixa a aplicação mais segura e escalável.”

🔹 8️⃣ DEMO PRÁTICA (🔥 ouro)
Criar um middleware:
php artisan make:middleware CheckAdmin

public function handle($request, Closure $next)
{
    if (!$request->user()?->is_admin) {
        abort(403);
    }

    return $next($request);
}


Aplicar na rota:

Route::get('/admin', fn () => 'ok')
    ->middleware('check.admin');


💬 E você fecha dizendo:

“O middleware controla o fluxo antes que a lógica principal seja executada.”

🎯 O que eu te digo dessa apresentação?

✔️ Tema excelente
✔️ Muito alinhado com mercado
✔️ Mostra arquitetura, não só código
✔️ Dá pra demonstrar ao vivo
✔️ Conecta com ORM, API, segurança

Se quiser, no próximo passo eu posso:

Montar roteiro de slides

Criar exemplo pronto de demo

Te ajudar com frases de impacto pra apresentação

Essa apresentação tá com cara de nível júnior pra pleno.