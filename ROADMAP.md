# 🚀 Hello — Backend Roadmap

## ✅ Concluído

- Instalação do Jetstream com Teams
- Autenticação completa (login, registro, verificação de email)
- 2FA habilitado (two factor)
- Policies criadas
- Middleware personalizado criado
- Route Model Binding implementado

### 🔹 1. Ajustes Iniciais Pós Jetstream

- Revisar estrutura da tabela users
- Validar fluxo completo de autenticação
- Testar middleware personalizado com usuários reais

## 🔄 Próximas Etapas

### 🔹 2. Sistema de Follow (Base da Rede Social)

- Criar migration followers
- Implementar relacionamento belongsToMany em User
- Criar método follow()
- Criar método unfollow()
- Criar método isFollowing()
- Criar endpoint para seguir/desseguir
- Criar contador followers_count usando withCount()

### 🔹 3. Feed Inteligente

- Criar lógica de feed baseada em follows
- Ordenar por:
  - Mais recentes
  - Mais curtidos
  - Mais comentados
- Implementar paginação
- Otimizar queries com eager loading

### 🔹 4. Events & Listeners

- Criar evento PostCreated
- Criar evento CommentCreated
- Criar evento UserFollowed
- Criar listeners para:
  - Criar notificação
  - Registrar log
  - Atualizar métricas
- Testar disparo automático via EventServiceProvider

### 🔹 5. Sistema de Notificações

- Notificar quando:
  - Post for curtido
  - Comentário for feito
  - Usuário for seguido
- Implementar notificação no banco
- Criar método para marcar como lida
- Criar contador de notificações não lidas

### 🔹 6. Logs e Auditoria

- Criar tabela user_activities
- Registrar:
  - Usuário
  - Ação
  - Modelo afetado
  - IP
  - Timestamp
- Integrar com middleware de logging

### 🔹 7. Soft Deletes

- Implementar SoftDeletes em:
  - Posts
  - Comments
- Ajustar queries para ignorar deletados
- Criar método para restaurar post

### 🔹 8. Rate Limiting Personalizado

- Limitar criação de posts
- Limitar comentários por minuto
- Limitar follow/unfollow
- Customizar mensagens de erro

### 🔹 9. Observers

- Criar PostObserver
- Gerar slug automático
- Limpar arquivos ao deletar post
- Registrar ação automaticamente

### 🔹 10. Preparação para API futura

- Criar rotas em /api
- Testar autenticação via Sanctum
- Criar Resources (PostResource, UserResource)
- Padronizar respostas JSON

## 🔥 Evolução Futuramente (Hello 2.0)

- Sistema de perfil privado
- Sistema de bloqueio entre usuários
- Sistema de stories
- Métricas avançadas
- Cache de feed
- Testes automatizados (Feature + Unit)

## 🎯 Objetivo Final

Transformar o Hello em:

- Arquitetura limpa
- Desacoplada
- Escalável
- API-ready
- Portfólio nível pleno