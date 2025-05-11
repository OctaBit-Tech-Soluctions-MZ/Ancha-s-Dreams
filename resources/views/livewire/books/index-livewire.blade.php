<div>
    <x-ancha-dreams-taste.masthead :subHeading="'Livros que Temperam o Conhecimento'" :heading="'Sabores e saberes em cada página'"/>
    <div class="container p-5">
        <div class="row">
            <!-- Lista de Livros -->
            <div class="row">
                <h2 class="mb-2 text-center"><i class="feather-book"></i> Compre o seu Livro sem sair de casa</h2>
                <div class="p-3">
                    <x-ancha-dreams-taste.filter :route="route('books')" :placeholder="'o seu livro'" :person="'Autor'"/>
                </div>
                <div class="row">
                    @foreach ($books as $book)
                        <x-ancha-dreams-taste.books-card :book="$book"/>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
