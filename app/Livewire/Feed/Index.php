<?php

namespace App\Livewire\Feed;

use Livewire\Component;

class Index extends Component
{
    public array $posts = [];

    public array $trendingTopics = [];

    public array $onlineFriends = [];

    public function mount(): void
    {
        $this->posts = [
            [
                'id' => 1,
                'author' => 'Ana Luiza',
                'username' => 'anna.luiza',
                'avatar' => 'AL',
                'time' => '1 h',
                'content' => 'Design sprint finalizado. O novo onboarding reduziu o drop em 21% nos testes internos.',
                'tags' => ['Product', 'Design'],
                'likes' => 1300,
                'liked' => true,
                'comments' => [
                    ['author' => 'Joao Lima', 'username' => 'joaolima', 'text' => 'Excelente! Quero ver os resultados em producao.'],
                    ['author' => 'Ana Rosa', 'username' => 'anarosa', 'text' => 'Fluxo ficou muito mais claro.'],
                    ['author' => 'Pedro V', 'username' => 'pedrov', 'text' => 'Podemos reutilizar no app mobile.'],
                ],
            ],
            [
                'id' => 2,
                'author' => 'Ana Almeida',
                'username' => 'ana.almeida',
                'avatar' => 'AN',
                'time' => '22 min',
                'content' => 'Deploy da API social concluido. Feed com cache de leitura ficou bem mais rapido.',
                'tags' => ['Backend', 'Laravel'],
                'likes' => 87,
                'liked' => false,
                'comments' => [
                    ['author' => 'Carla M', 'username' => 'carlam', 'text' => 'Performance ficou muito boa no staging.'],
                    ['author' => 'Tiago N', 'username' => 'tiagon', 'text' => 'Agora vale medir consumo de memoria.'],
                ],
            ],
            [
                'id' => 3,
                'author' => 'Hiago Silva',
                'username' => 'hiagorei',
                'avatar' => 'HS',
                'time' => '1 h',
                'content' => 'Subi uma proposta de identidade visual para o Hello, com foco em contraste e legibilidade.',
                'tags' => ['Branding', 'UI'],
                'likes' => 42,
                'liked' => false,
                'comments' => [
                    ['author' => 'Bruno K', 'username' => 'brunok', 'text' => 'Tipografia ficou excelente.'],
                ],
            ],
        ];

        $this->trendingTopics = ['#Laravel12', '#Livewire', '#UIInspiration', '#ProductBuild'];

        $this->onlineFriends = [
            ['name' => 'Daniela', 'status' => 'Editando perfil'],
            ['name' => 'Renato', 'status' => 'Online agora'],
            ['name' => 'Julia', 'status' => 'Publicou ha 3 min'],
            ['name' => 'Marcos', 'status' => 'Comentou no feed'],
        ];
    }

    public function render()
    {
        return view('livewire.feed.index');
    }
}
