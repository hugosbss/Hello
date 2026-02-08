# Laravel

## 📋 

---

## 📅 

### Temas a abordar:

#### Ciclo de Requisição do Laravel  ## 📋
- Ordem exata de execução de cada camada ## 📋
- Responsabilidade de cada componente: ## 📋
  - Route ## 📋
  - Middleware ## 📋
  - Controller ## 📋
  - Model ## 📋
  - View ## 📋
- Diferença entre middleware de entrada e saída
- Conceito de Route Model Binding
- Diferença entre os grupos de middleware `web` vs `api`

### Tópicos complementares
- Quando o middleware é executado? (antes/depois do controller)
- Diferença entre autenticação e autorização
- Casos de uso de middleware customizado

Qualquer dúvida sobre os critérios ou sobre a preparação da apresentação, estamos à disposição para alinhar juntos.

---

## 🔄 Visão Geral do Ciclo de Vida

## 🚀 Primeiros Passos

### Ponto de Entrada

O ponto de entrada para todas as requisições a uma aplicação Laravel é o arquivo `public/index.php`. Todas as requisições são direcionadas para este arquivo pela configuração do seu servidor web (Apache/Nginx). 

O arquivo `index.php` não contém muito código. Em vez disso, ele serve como ponto de partida para carregar o restante do framework.

O arquivo `index.php` carrega:
1. A definição do autoloader gerada pelo Composer
2. Uma instância do aplicativo Laravel em `bootstrap/app.php`
3. A primeira ação: criar uma instância do contêiner de aplicativo/serviço

---

## 🔗 Kernels HTTP/Console

A solicitação recebida é enviada para:
- **Kernel HTTP** - usando o método `handle()` da instância do aplicativo
- **Kernel Console** - usando o método `handleCommand()` da instância do aplicativo

Ambos servem como o local central por onde todas as requisições fluem.

### Kernel HTTP: `Illuminate\Foundation\Http\Kernel`

O kernel HTTP define um conjunto de **bootstrappers** (funções) que serão executadas antes da requisição ser processada.

#### Responsabilidades:
- Configurar o tratamento de erros
- Registrar logs
- Detectar o ambiente da aplicação
- Executar outras tarefas necessárias antes do processamento

#### Encaminhamento de Middleware:
O kernel HTTP é responsável por encaminhar a requisição através da **pilha de middleware** da aplicação. Esses middlewares:
- Lidam com a leitura e gravação da sessão HTTP
- Determinam se a aplicação está em modo de manutenção
- Verificam o token CSRF
- E muito mais...

#### Assinatura do método:
```php
handle(Request $request): Response
```

Pense no kernel como uma grande caixa preta que:
- **Entrada:** Recebe requisições HTTP
- **Saída:** Retorna respostas HTTP

---

## 📦 Prestadores de Serviços (Service Providers)

Uma das ações mais importantes do kernel durante a inicialização é o **carregamento dos provedores de serviço** para sua aplicação.

### Responsabilidades dos Service Providers:
- Inicializar todos os componentes do framework
- Configurar o banco de dados
- Configurar filas
- Configurar validação
- Configurar roteamento

### Ciclo de Execução:

1. **Iteração:** O Laravel itera por cada provedor de serviço
2. **Instanciação:** Cada um é instanciado
3. **Register:** O método `register()` é chamado em todos eles
4. **Boot:** O método `boot()` é chamado em cada um

> Isso garante que os provedores de serviço possam depender de que cada vinculação de contêiner esteja registrada e disponível no momento da execução de seu método `boot()`.

### Localização:
- **Service Providers do framework:** Internamente (dezenas deles)
- **Service Providers customizados:** `app/Providers/`
- **Lista de provedores:** `bootstrap/providers.php`

#### Exemplo: `AppServiceProvider`

Por padrão, o `AppServiceProvider` está praticamente vazio. Este é um ótimo lugar para:
- Adicionar configurações de inicialização personalizadas
- Adicionar vinculações de contêiner de serviço

Para aplicações grandes, você pode criar vários provedores de serviço com inicialização granular para serviços específicos.

---

## 🛣️ Roteamento

Após a inicialização da aplicação e o registro de todos os provedores de serviço, a solicitação `Request` é encaminhada ao roteador para distribuição.

### Responsabilidades do Roteador:
- Encaminhar a solicitação para uma rota ou controlador
- Executar qualquer middleware específico da rota

---

## 🧩 Middlewares

### O que são Middlewares?

Middlewares fornecem um mecanismo conveniente para **filtrar ou examinar** as requisições HTTP que chegam à sua aplicação.

### Exemplos:

- ✅ **Middleware de Autenticação:** Verifica se o usuário está autenticado
  - Se não autenticado → redireciona para login
  - Se autenticado → permite prosseguir

### Tipos de Atribuição:

- **Globais:** Atribuídos a todas as rotas da aplicação
  - Exemplo: `PreventRequestsDuringMaintenance`
  
- **Específicos:** Atribuídos apenas a rotas ou grupos de rotas específicos

### Fluxo com Middleware:

```
Requisição HTTP
      ↓
Middleware 1 (entrada)
      ↓
Middleware 2 (entrada)
      ↓
Controlador/Rota → Resposta
      ↓
Middleware 2 (saída)
      ↓
Middleware 1 (saída)
      ↓
Resposta enviada ao navegador
```

---

## ✅ Finalizando

### Processo Final:

1. **Rota/Controlador retorna resposta** → Encaminhada de volta através do middleware da rota
2. **Middleware de saída** → Oportunidade de modificar ou examinar a resposta
3. **Kernel HTTP** → Retorna o objeto de resposta para a instância da aplicação
4. **Send** → O método `send()` envia o conteúdo da resposta para o navegador do usuário

Assim, concluímos nossa jornada por todo o **ciclo de vida da requisição no Laravel**! 🎉

---

## 🎯 Foco nos Prestadores de Serviços

Os provedores de serviço são realmente a **chave para inicializar** uma aplicação Laravel:

```
Aplicação criada
      ↓
Provedores de serviço registrados
      ↓
Requisição encaminhada para aplicação inicializada
```

### Por que é importante?

Ter um bom domínio de como uma aplicação Laravel é construída e inicializada por meio de provedores de serviço é muito valioso.

### Estrutura:
- **Localização:** `app/Providers/`
- **Padrão:** `AppServiceProvider` é o ponto de partida ideal para adicionar suas próprias configurações de inicialização e vinculação de contêineres de serviço