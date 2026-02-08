Olá, Hugo! Tudo bem? 

Gostaria de parabenizá-lo pela última apresentação, você conseguiu explicar os tópicos de maneira clara e objetiva. Agora, a ideia é aprofundarmos os assuntos, e com isso, queremos explorar com mais detalhes como funciona cada tipo de relacionamento e a lógica por trás de cada um (Eloquent ORM - Relacionamentos Fundamentais), conectando conceitos e aplicações práticas.

Sua próxima apresentação, acontecerá no dia 09/02, às 15h00 e também deverá abordar os seguintes temas:

- Ciclo de Requisição do Laravel:
- Ordem exata de execução de cada camada;
- Responsabilidade de cada componente (Route, Middleware, Controller, Model, View);
- Diferença entre middleware de entrada e saída;
- Conceito de Route Model Binding;
- Diferença entre os grupos de middleware web vs api.

Qualquer dúvida sobre os critérios ou sobre a preparação da apresentação, estamos à disposição para alinhar juntos.

Atenciosamente,

Quando o middleware e executado ? (antes/depois do controller);
Diferenca entre autenticacao e autorizacao;
Casos de uso de middleware customizado;

Visão geral do ciclo de vida

Primeiros passos
O ponto de entrada para todas as requisições a uma aplicação Laravel é o public/index.phparquivo `index.html`. Todas as requisições são direcionadas para este arquivo pela configuração do seu servidor web (Apache/Nginx). O index.phparquivo `index.html` não contém muito código. Em vez disso, ele serve como ponto de partida para carregar o restante do framework.

O index.phparquivo carrega a definição do autoloader gerada pelo Composer e, em seguida, recupera uma instância do aplicativo Laravel bootstrap/app.php. A primeira ação realizada pelo próprio Laravel é criar uma instância do contêiner de aplicativo/serviço .

Kernels HTTP/Console
Em seguida, a solicitação recebida é enviada para o kernel HTTP ou para o kernel do console, usando os métodos handleRequest`get` ou ` handleCommandget` da instância do aplicativo, dependendo do tipo de solicitação que entra no aplicativo. Esses dois kernels servem como o local central por onde todas as solicitações fluem. Por enquanto, vamos nos concentrar apenas no kernel HTTP, que é uma instância de `Console` Illuminate\Foundation\Http\Kernel.

O kernel HTTP define um conjunto de bootstrappersfunções que serão executadas antes da requisição ser processada. Essas funções configuram o tratamento de erros, o registro de logs, detectam o ambiente da aplicação e executam outras tarefas necessárias antes que a requisição seja efetivamente processada. Normalmente, essas classes lidam com configurações internas do Laravel com as quais você não precisa se preocupar.

O kernel HTTP também é responsável por encaminhar a requisição através da pilha de middleware da aplicação. Esses middlewares lidam com a leitura e gravação da sessão HTTP , determinam se a aplicação está em modo de manutenção, verificam o token CSRF e muito mais. Falaremos mais sobre isso em breve.

A assinatura do método do kernel HTTP handleé bastante simples: ele recebe uma requisição Requeste retorna uma resposta Response. Pense no kernel como uma grande caixa preta que representa toda a sua aplicação. Forneça a ele requisições HTTP e ele retornará respostas HTTP.

Prestadores de serviços
Uma das ações mais importantes do kernel durante a inicialização é o carregamento dos provedores de serviço para sua aplicação. Os provedores de serviço são responsáveis ​​por inicializar todos os componentes do framework, como o banco de dados, a fila, a validação e o roteamento.

O Laravel irá iterar por esta lista de provedores e instanciar cada um deles. Após a instanciação dos provedores, o registermétodo será chamado em todos eles. Em seguida, uma vez que todos os provedores tenham sido registrados, o bootmétodo será chamado em cada um deles. Isso garante que os provedores de serviço possam depender de que cada vinculação de contêiner esteja registrada e disponível no momento da execução de seu bootmétodo.

Essencialmente, todos os principais recursos oferecidos pelo Laravel são inicializados e configurados por um provedor de serviços. Como eles inicializam e configuram muitos recursos oferecidos pelo framework, os provedores de serviços são o aspecto mais importante de todo o processo de inicialização do Laravel.

Embora a estrutura utilize internamente dezenas de provedores de serviços, você também tem a opção de criar os seus próprios. Você pode encontrar uma lista dos provedores de serviços definidos pelo usuário ou de terceiros que seu aplicativo está utilizando no bootstrap/providers.phparquivo.

Roteamento
Após a inicialização da aplicação e o registro de todos os provedores de serviço, a solicitação Requestserá encaminhada ao roteador para distribuição. O roteador, por sua vez, encaminhará a solicitação para uma rota ou controlador, além de executar qualquer middleware específico da rota.

Os middlewares fornecem um mecanismo conveniente para filtrar ou examinar as requisições HTTP que chegam à sua aplicação. Por exemplo, o Laravel inclui um middleware que verifica se o usuário da sua aplicação está autenticado. Se o usuário não estiver autenticado, o middleware o redirecionará para a tela de login. No entanto, se o usuário estiver autenticado, o middleware permitirá que a requisição prossiga na aplicação. Alguns middlewares são atribuídos a todas as rotas da aplicação, como o `routes` PreventRequestsDuringMaintenance, enquanto outros são atribuídos apenas a rotas ou grupos de rotas específicos. Você pode aprender mais sobre middlewares lendo a documentação completa sobre middlewares .

Se a solicitação passar por todos os middlewares atribuídos à rota correspondente, o método da rota ou do controlador será executado e a resposta retornada por esse método será enviada de volta através da cadeia de middlewares da rota.

Finalizando
Assim que a rota ou o método do controlador retornar uma resposta, essa resposta será encaminhada de volta através do middleware da rota, dando ao aplicativo a oportunidade de modificar ou examinar a resposta enviada.

Finalmente, após a resposta percorrer o middleware, o handlemétodo do kernel HTTP retorna o objeto de resposta para a handleRequestinstância da aplicação, e este método chama o sendmétodo na resposta retornada. O sendmétodo envia o conteúdo da resposta para o navegador do usuário. Concluímos, assim, nossa jornada por todo o ciclo de vida da requisição no Laravel!

Foco nos prestadores de serviços
Os provedores de serviço são realmente a chave para inicializar uma aplicação Laravel. A instância da aplicação é criada, os provedores de serviço são registrados e a requisição é encaminhada para a aplicação inicializada. É simples assim!

Ter um bom domínio de como uma aplicação Laravel é construída e inicializada por meio de provedores de serviço é muito valioso. Os provedores de serviço definidos pelo usuário da sua aplicação são armazenados no app/Providersdiretório.

Por padrão, o AppServiceProviderprovedor está praticamente vazio. Este provedor é um ótimo lugar para adicionar as próprias configurações de inicialização e vinculação de contêineres de serviço da sua aplicação. Para aplicações grandes, você pode querer criar vários provedores de serviço, cada um com inicialização mais granular para serviços específicos usados ​​pela sua aplicação.