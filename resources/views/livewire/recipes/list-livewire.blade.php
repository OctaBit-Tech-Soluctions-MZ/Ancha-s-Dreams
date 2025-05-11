<div>
    @livewire('breadcrumb', [
    'pages' => [
    ['label' => 'Cursos', 'url' => route('courses.instructor')],
    // ['label' => 'Aulas', 'url' => route('lessons.list', ['slug' => $slug_course])],
    ['label' => 'Receitas', 'url' => null],
    ],
    'pageTitle' => 'Receitas'
    ])   
</div>
