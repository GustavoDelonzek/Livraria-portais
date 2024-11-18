<?php


namespace Database\Seeders;

use App\Models\Author;
use App\Models\Publisher;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run()
    {
        $authors = Author::all();
        $publishers = Publisher::all();

        $books = [
            [
                'title' => 'Harry Potter e a Pedra Filosofal',
                'author_id' => 1,
                'publisher_id' => $publishers->random()->id,
                'published_year' => 1997,
                'price' => 49.90,
                'stock' => 30,
                'description' => 'Harry Potter, um jovem bruxo, começa sua jornada na Escola de Magia e Bruxaria de Hogwarts.',
                'img_url' => 'https://m.media-amazon.com/images/I/81ibfYk4qmL._AC_UF1000,1000_QL80_.jpg',
                'genres' => ['Ficção', 'Fantasia', 'Aventura']
            ],
            [
                'title' => 'A Guerra dos Tronos',
                'author_id' => 2,  // George R.R. Martin
                'publisher_id' => $publishers->random()->id,
                'published_year' => 1996,
                'price' => 79.90,
                'stock' => 20,
                'description' => 'Primeiro livro da saga "As Crônicas de Gelo e Fogo", onde nobres famílias disputam o Trono de Ferro.',
                'img_url' => 'https://m.media-amazon.com/images/I/91+1SUO3vUL.jpg',
                'genres' => ['Fantasia', 'Aventura', 'Drama']
            ],
            [
                'title' => 'O Senhor dos Anéis: A Sociedade do Anel',
                'author_id' => 3,  // J.R.R. Tolkien
                'publisher_id' => $publishers->random()->id,
                'published_year' => 1954,
                'price' => 89.90,
                'stock' => 25,
                'description' => 'Frodo Bolseiro e seus amigos partem em uma missão para destruir o Anel do Poder.',
                'img_url' => 'https://m.media-amazon.com/images/I/81hCVEC0ExL._AC_UF1000,1000_QL80_.jpg',
                'genres' => ['Fantasia', 'Aventura', 'Drama']
            ],
            [
                'title' => 'Assassinato no Expresso do Oriente',
                'author_id' => 4,  // Agatha Christie
                'publisher_id' => $publishers->random()->id,
                'published_year' => 1934,
                'price' => 39.90,
                'stock' => 40,
                'description' => 'Hercule Poirot investiga um assassinato a bordo do famoso trem Expresso do Oriente.',
                'img_url' => 'https://m.media-amazon.com/images/I/81Zp6MFxIDL._AC_UF1000,1000_QL80_.jpg',
                'genres' => ['Mistério', 'Suspense', 'Thriller']
            ],
            [
                'title' => 'Dom Casmurro',
                'author_id' => 5,  // Machado de Assis
                'publisher_id' => $publishers->random()->id,
                'published_year' => 1900,
                'price' => 19.90,
                'stock' => 50,
                'description' => 'Bentinho narra sua história e sua obsessão com o suposto romance de sua esposa, Capitu.',
                'img_url' => 'https://m.media-amazon.com/images/I/61Z2bMhGicL._AC_UF1000,1000_QL80_.jpg',
                'genres' => ['Clássicos', 'Drama', 'Ficção']
            ],
            [
                'title' => 'A Hora da Estrela',
                'author_id' => 6,  // Clarice Lispector
                'publisher_id' => $publishers->random()->id,
                'published_year' => 1977,
                'price' => 29.90,
                'stock' => 35,
                'description' => 'Macabéa, uma jovem nordestina que vive no Rio de Janeiro, busca um sentido para sua existência.',
                'img_url' => 'https://m.media-amazon.com/images/I/810Vj9zyi-L.jpg',
                'genres' => ['Ficção', 'Drama', 'Literatura Brasileira']
            ],
            [
                'title' => 'O Iluminado',
                'author_id' => 7,  // Stephen King
                'publisher_id' => $publishers->random()->id,
                'published_year' => 1977,
                'price' => 59.90,
                'stock' => 15,
                'description' => 'Jack Torrance, um escritor frustrado, aceita um emprego de zelador em um hotel isolado, onde a violência e o terror se desencadeiam.',
                'img_url' => 'https://m.media-amazon.com/images/I/8147kKLLvOL._AC_UF1000,1000_QL80_.jpg',
                'genres' => ['Terror', 'Suspense', 'Mistério']
            ],
            [
                'title' => 'Cem Anos de Solidão',
                'author_id' => 8,  // Gabriel García Márquez
                'publisher_id' => $publishers->random()->id,
                'published_year' => 1967,
                'price' => 69.90,
                'stock' => 10,
                'description' => 'A saga da família Buendía na cidade fictícia de Macondo, com forte influência de realismo mágico.',
                'img_url' => 'https://m.media-amazon.com/images/I/817esPahlrL._AC_UF1000,1000_QL80_.jpg',
                'genres' => ['Ficção', 'Clássicos', 'Literatura Latino-Americana']
            ],
            [
                'title' => 'O Processo',
                'author_id' => 9,  // Franz Kafka
                'publisher_id' => $publishers->random()->id,
                'published_year' => 1914,
                'price' => 34.90,
                'stock' => 20,
                'description' => 'A história de Josef K., que é preso por um crime não revelado e vive uma luta sem sentido contra um sistema judicial opressor.',
                'img_url' => 'https://m.media-amazon.com/images/I/81O8mKD8U4L._AC_UF1000,1000_QL80_.jpg',
                'genres' => ['Ficção', 'Clássicos', 'Filosofia']
            ],
            [
                'title' => 'O Chamado de Cthulhu',
                'author_id' => 10,  // H.P. Lovecraft
                'publisher_id' => $publishers->random()->id,
                'published_year' => 1928,
                'price' => 49.90,
                'stock' => 12,
                'description' => 'Relato de uma investigação sobre um culto que venera Cthulhu, uma entidade cósmica e monstruosa.',
                'img_url' => 'https://m.media-amazon.com/images/I/917V2By2e+L._UF894,1000_QL80_.jpg',
                'genres' => ['Terror', 'Ficção Científica', 'Suspense']
            ],

            [
                'title' => 'Jane Eyre',
                'author_id' => 11,  // Jane Austen
                'publisher_id' => $publishers->random()->id,
                'published_year' => 1847,
                'price' => 39.90,
                'stock' => 28,
                'description' => 'A história de uma órfã que se torna governanta e se apaixona por seu empregador misterioso, Mr. Rochester.',
                'img_url' => 'https://m.media-amazon.com/images/I/61N-UOA0alL._UF894,1000_QL80_.jpg',
                'genres' => ['Romance', 'Clássicos', 'Ficção']
            ],
            [
                'title' => 'O Sol é Para Todos',
                'author_id' => 12,  // Ernest Hemingway
                'publisher_id' => $publishers->random()->id,
                'published_year' => 2000,
                'price' => 24.90,
                'stock' => 15,
                'description' => 'Paris é uma festa revela um Hemingway diferente. Em Paris, aos 22 anos, ele lê, pela primeira vez, clássicos como Tolstói, Dostoievski e Stendhal. Convive com Gertrude Stein, James Joyce, Ezra Pound, F. Scott Fitzgerald, figuras polêmicas e encantadoras para o jovem Hemingway. A cidade e esses “companheiros de viagem” deram-lhe nova dimensão do humano e maior sensibilidade para alcançar os seus dois objetivos primordiais na vida: ser um bom escritor e viver em absoluta fidelidade consigo próprio. ',
                'img_url' => 'https://m.media-amazon.com/images/I/411zT1MDkAL._AC_UF1000,1000_QL80_.jpghttps://m.media-amazon.com/images/I/411zT1MDkAL._AC_UF1000,1000_QL80_.jpg',
                'genres' => ['Drama', 'Ficção', 'Clássicos']
            ],
            [
                'title' => 'O Corvo',
                'author_id' => 13,  // Edgar Allan Poe
                'publisher_id' => $publishers->random()->id,
                'published_year' => 1845,
                'price' => 19.90,
                'stock' => 50,
                'description' => 'O poema "O Corvo" fala sobre a perda e a dor, onde um homem é visitado por um corvo que lhe traz angústia.',
                'img_url' => 'https://m.media-amazon.com/images/I/517rNLByjzL._AC_UF894,1000_QL80_.jpg',
                'genres' => ['Poesia', 'Terror', 'Clássicos', 'Conto']
            ],
            [
                'title' => 'O Conto da Aia',
                'author_id' => 14,  // Margaret Atwood
                'publisher_id' => $publishers->random()->id,
                'published_year' => 1985,
                'price' => 54.90,
                'stock' => 18,
                'description' => 'Em uma distopia, as mulheres são subjugadas a um papel de servidão, sendo controladas pelo Estado totalitário.',
                'img_url' => 'https://m.media-amazon.com/images/I/91AHNAr638L.jpg',
                'genres' => ['Ficção Científica']
            ],
            [
                'title' => 'Americanah',
                'author_id' => 15,  // Chimamanda Ngozi Adichie
                'publisher_id' => $publishers->random()->id,
                'published_year' => 2013,
                'price' => 44.90,
                'stock' => 30,
                'description' => 'A história de uma jovem nigeriana que se muda para os Estados Unidos e explora questões de raça e identidade.',
                'img_url' => 'https://m.media-amazon.com/images/I/81kjpHxAbvL.jpg',
                'genres' => ['Ficção', 'Romance']
            ],
            [
                'title' => 'Amada',
                'author_id' => 16,  // Toni Morrison
                'publisher_id' => $publishers->random()->id,
                'published_year' => 1987,
                'price' => 79.90,
                'stock' => 14,
                'description' => 'Uma mãe é atormentada pelo espírito da filha que morreu tragicamente, enfrentando o legado da escravidão.',
                'img_url' => 'https://m.media-amazon.com/images/I/716HwTDceaL.jpg',
                'genres' => ['Ficção', 'Clássicos', 'Drama']
            ],
            [
                'title' => 'Kafka à Beira-Mar',
                'author_id' => 17,  // Haruki Murakami
                'publisher_id' => $publishers->random()->id,
                'published_year' => 2002,
                'price' => 69.90,
                'stock' => 18,
                'description' => 'A história de um jovem que foge de casa e de um idoso com habilidades psíquicas, interligando mundos fantásticos e reais.',
                'img_url' => 'https://m.media-amazon.com/images/I/81GwLNxuBBL._AC_UF1000,1000_QL80_.jpg',
                'genres' => ['Ficção', 'Fantasia', 'Aventura']
            ],
            [
                'title' => 'A Casa dos Espíritos',
                'author_id' => 18,  // Isabel Allende
                'publisher_id' => $publishers->random()->id,
                'published_year' => 1982,
                'price' => 39.90,
                'stock' => 25,
                'description' => 'Uma história que mistura realismo mágico e a luta política da família Trueba ao longo de várias gerações.',
                'img_url' => 'https://m.media-amazon.com/images/I/91eujA9J0pL._AC_UF1000,1000_QL80_.jpg',
                'genres' => ['Ficção', 'Romance']
            ],
            [
                'title' => 'Alguma Poesia',
                'author_id' => 19,  // Carlos Drummond de Andrade
                'publisher_id' => $publishers->random()->id,
                'published_year' => 1930,
                'price' => 19.90,
                'stock' => 40,
                'description' => 'Coletânea que mistura sentimentos de angústia existencial com a busca por sentido e humanidade.',
                'img_url' => 'https://m.media-amazon.com/images/I/7165XLdWkmL._AC_UF1000,1000_QL80_.jpg',
                'genres' => ['Poesia', 'Ficção']
            ],
            [
                'title' => 'Eu Sei Por Que o Pássaro Canta na Gaiola',
                'author_id' => 20,  // Maya Angelou
                'publisher_id' => $publishers->random()->id,
                'published_year' => 1969,
                'price' => 49.90,
                'stock' => 20,
                'description' => 'A autobiografia de Maya Angelou que relata sua infância e adolescência marcadas por racismo e abuso.',
                'img_url' => 'https://m.media-amazon.com/images/I/61mxieZGdDL._AC_UF1000,1000_QL80_.jpg',
                'genres' => ['Biografia', 'Política']
            ],
            [
                'title' => 'Os Miseráveis',
                'author_id' => 21,  // Victor Hugo
                'publisher_id' => $publishers->random()->id,
                'published_year' => 1862,
                'price' => 79.90,
                'stock' => 15,
                'description' => 'A história de Jean Valjean, um ex-prisioneiro que busca redenção em meio a uma sociedade injusta.',
                'img_url' => 'https://m.media-amazon.com/images/I/71L28YvPobL._AC_UF894,1000_QL80_.jpg',
                'genres' => ['Ficção', 'Clássicos', 'Drama']
            ],
            [
                'title' => 'Crime e Castigo',
                'author_id' => 22,  // Fiódor Dostoiévski
                'publisher_id' => $publishers->random()->id,
                'published_year' => 1866,
                'price' => 69.90,
                'stock' => 25,
                'description' => 'A angústia psicológica de Raskólnikov, um jovem que comete um assassinato e enfrenta uma luta interna com a culpa.',
                'img_url' => 'https://m.media-amazon.com/images/I/71Gmavgu3ZL._AC_UF1000,1000_QL80_.jpg',
                'genres' => ['Ficção', 'Clássicos', 'Filosofia']
            ],
            [
                'title' => 'Em Busca do Tempo Perdido',
                'author_id' => 23,  // Marcel Proust
                'publisher_id' => $publishers->random()->id,
                'published_year' => 1913,
                'price' => 89.90,
                'stock' => 10,
                'description' => 'Uma análise profunda da memória e do tempo, onde o narrador revisita sua vida passada em busca de respostas.',
                'img_url' => 'https://m.media-amazon.com/images/I/818BxnsWTRL._UF894,1000_QL80_.jpg',
                'genres' => ['Ficção', 'Clássicos']
            ],
            [
                'title' => 'Germinal',
                'author_id' => 24,  // Émile Zola
                'publisher_id' => $publishers->random()->id,
                'published_year' => 1885,
                'price' => 39.90,
                'stock' => 30,
                'description' => 'A história de uma greve de trabalhadores nas minas do norte da França, com forte crítica social e econômica.',
                'img_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/61/Germinal_first_edition_cover.jpg/640px-Germinal_first_edition_cover.jpg',
                'genres' => ['Drama', 'Clássicos', 'Filosofia']
            ],
            [
                'title' => 'Ulisses',
                'author_id' => 25,  // James Joyce
                'publisher_id' => $publishers->random()->id,
                'published_year' => 1922,
                'price' => 99.90,
                'stock' => 12,
                'description' => 'Uma narrativa de um dia na vida de Leopold Bloom, em Dublin, repleta de simbolismo e experimentalismo literário.',
                'img_url' => 'https://m.media-amazon.com/images/I/71GSEDzL-JL._AC_UF894,1000_QL80_.jpg',
                'genres' => ['Ficção', 'Clássicos', 'Filosofia']
            ],
            [
                'title' => 'Guerra e Paz',
                'author_id' => 27,  // Leo Tolstoy
                'publisher_id' => $publishers->random()->id,
                'published_year' => 1869,
                'price' => 99.90,
                'stock' => 12,
                'description' => 'Uma grandiosa história sobre a Napoleônica, explorando temas de guerra, paz e a vida da aristocracia russa.',
                'genres' => ['Ficção', 'Clássicos', 'História'],
                'img_url' => 'https://m.media-amazon.com/images/I/814J+usGFjL._AC_UF894,1000_QL80_.jpg'
            ],
            [
                'title' => 'O Ser e o Nada',
                'author_id' => 28,  // Jean-Paul Sartre
                'publisher_id' => $publishers->random()->id,
                'published_year' => 1943,
                'price' => 59.90,
                'stock' => 15,
                'description' => 'Um estudo filosófico sobre a liberdade humana, a existência e a responsabilidade.',
                'genres' => ['Filosofia', 'Ficção', 'Psicologia'],
                'img_url' => 'https://m.media-amazon.com/images/I/61AWlxU5f1L._AC_UF1000,1000_QL80_.jpg'
            ],
            [
                'title' => 'O Mito de Sísifo',
                'author_id' => 29,  // Albert Camus
                'publisher_id' => $publishers->random()->id,
                'published_year' => 1942,
                'price' => 39.90,
                'stock' => 25,
                'description' => 'Uma reflexão filosófica sobre o absurdo da existência e como o homem pode encontrar significado na vida.',
                'genres' => ['Filosofia', 'Clássicos'],
                'img_url' => 'https://m.media-amazon.com/images/I/71pvIZOSjdL._AC_UF1000,1000_QL80_.jpg'
            ],
            [
                'title' => 'Os Homens que Não Amavam as Mulheres',
                'author_id' => 30,  // Stieg Larsson
                'publisher_id' => $publishers->random()->id,
                'published_year' => 2005,
                'price' => 49.90,
                'stock' => 20,
                'description' => 'Primeiro livro da série Millenium, uma investigação sobre um desaparecimento não resolvido e segredos de família.',
                'genres' => ['Mistério', 'Thriller', 'Suspense'],
                'img_url' => 'https://m.media-amazon.com/images/I/81D8cQc37aS.jpg'
            ],
            [
                'title' => 'The Underground Railroad',
                'author_id' => 31,  // Colson Whitehead
                'publisher_id' => $publishers->random()->id,
                'published_year' => 2016,
                'price' => 79.90,
                'stock' => 15,
                'description' => 'Uma reinterpretação fantástica da fuga de escravizados para a liberdade, com um trem subterrâneo literal.',
                'genres' => ['Ficção', 'História', 'Drama'],
                'img_url' => 'https://m.media-amazon.com/images/I/91ikNi3cYUL.jpg'
            ],
            [
                'title' => 'Conversas com Amigos',
                'author_id' => 32,  // Sally Rooney
                'publisher_id' => $publishers->random()->id,
                'published_year' => 2017,
                'price' => 39.90,
                'stock' => 30,
                'description' => 'Um romance sobre relacionamentos complicados e as complexidades da juventude e da identidade.',
                'genres' => ['Romance', 'Ficção', 'Drama'],
                'img_url' => 'https://m.media-amazon.com/images/I/717zKKQ5UkL._AC_UF1000,1000_QL80_.jpg'
            ],
            [
                'title' => 'O Cemitério de Praga',
                'author_id' => 33,  // Umberto Eco
                'publisher_id' => $publishers->random()->id,
                'published_year' => 2010,
                'price' => 69.90,
                'stock' => 22,
                'description' => 'Uma novela histórica e intelectual sobre conspirações e intrigas do século XIX.',
                'genres' => ['Ficção', 'Mistério', 'História'],
                'img_url' => 'https://m.media-amazon.com/images/I/71LeW7J6PPL._AC_UF894,1000_QL80_.jpg'
            ],
            [
                'title' => 'O Mundo de Sofia',
                'author_id' => 34,  // Jostein Gaarder
                'publisher_id' => $publishers->random()->id,
                'published_year' => 1991,
                'price' => 29.90,
                'stock' => 18,
                'description' => 'A história filosófica de uma jovem que recebe cartas misteriosas sobre o pensamento ocidental.',
                'genres' => ['Filosofia', 'Ficção', 'Literatura Infantil'],
                'img_url' => 'https://m.media-amazon.com/images/I/91U9VjiT-xL._AC_UF1000,1000_QL80_.jpg'
            ],
            [
                'title' => 'O Senhor dos Anéis: As Duas Torres',
                'author_id' => 3,  // J.R.R. Tolkien
                'publisher_id' => $publishers->random()->id,
                'published_year' => 1954,
                'price' => 69.90,
                'stock' => 22,
                'description' => 'Frodo e Sam continuam sua jornada para destruir o Anel, enquanto a guerra pela Terra-média se intensifica.',
                'genres' => ['Fantasia', 'Aventura'],
                'img_url' => 'https://m.media-amazon.com/images/I/81lQ5N0QwJL._AC_UF1000,1000_QL80_.jpg'
            ],
            [
                'title' => 'O Senhor dos Anéis: O Retorno do Rei',
                'author_id' => 3,  // J.R.R. Tolkien
                'publisher_id' => $publishers->random()->id,
                'published_year' => 1955,
                'price' => 79.90,
                'stock' => 20,
                'description' => 'A luta final pela Terra-média, com o destino de Frodo e o Anel sendo decidido.',
                'genres' => ['Fantasia', 'Aventura'],
                'img_url' => 'https://m.media-amazon.com/images/I/71+4uDgt8JL._AC_UF1000,1000_QL80_.jpg'
            ],
            [
                'title' => 'O Hobbit',
                'author_id' => 3,  // J.R.R. Tolkien
                'publisher_id' => $publishers->random()->id,
                'published_year' => 1937,
                'price' => 39.90,
                'stock' => 50,
                'description' => 'A história de Bilbo Bolseiro, que é forçado a embarcar em uma grande aventura.',
                'genres' => ['Fantasia', 'Aventura', 'Literatura Infantil'],
                'img_url' => 'https://m.media-amazon.com/images/I/91M9xPIf10L._AC_UF1000,1000_QL80_.jpg'
            ],
            [
                'title' => 'Harry Potter e a Câmara Secreta',
                'author_id' => 1,  // J.K. Rowling
                'publisher_id' => $publishers->random()->id,
                'published_year' => 1998,
                'price' => 59.90,
                'stock' => 30,
                'description' => 'Harry retorna a Hogwarts para seu segundo ano e enfrenta novos desafios, incluindo a ameaça da Câmara Secreta.',
                'genres' => ['Fantasia', 'Aventura', 'Infantojuvenil'],
                'img_url' => 'https://m.media-amazon.com/images/I/81jbivNEVML._AC_UF1000,1000_QL80_.jpg'
            ],
            [
                'title' => 'Harry Potter e o Prisioneiro de Azkaban',
                'author_id' => 1,  // J.K. Rowling
                'publisher_id' => $publishers->random()->id,
                'published_year' => 1999,
                'price' => 69.90,
                'stock' => 25,
                'description' => 'Harry descobre mais sobre seu passado e a conexão com Sirius Black, um prisioneiro fugitivo.',
                'genres' => ['Fantasia', 'Aventura', 'Mistério'],
                'img_url' => 'https://m.media-amazon.com/images/I/81u+ljPVifL._AC_UF1000,1000_QL80_.jpg'
            ],
            [
                'title' => 'Harry Potter e o Cálice de Fogo',
                'author_id' => 1,  // J.K. Rowling
                'publisher_id' => $publishers->random()->id,
                'published_year' => 2000,
                'price' => 79.90,
                'stock' => 20,
                'description' => 'Harry é inesperadamente inscrito no Torneio Tribruxo, onde enfrenta desafios perigosos e uma ameaça crescente.',
                'genres' => ['Fantasia', 'Aventura', 'Mistério'],
                'img_url' => 'https://m.media-amazon.com/images/I/81nTLN-kz7L._AC_UF1000,1000_QL80_.jpg'
            ],
            [
                'title' => 'Harry Potter e a Ordem da Fênix',
                'author_id' => 1,  // J.K. Rowling
                'publisher_id' => $publishers->random()->id,
                'published_year' => 2003,
                'price' => 89.90,
                'stock' => 18,
                'description' => 'Harry e seus amigos enfrentam uma batalha interna na escola, enquanto a ameaça de Lord Voldemort cresce.',
                'genres' => ['Fantasia', 'Aventura', 'Drama'],
                'img_url' => 'https://m.media-amazon.com/images/I/81d6ESyPZwL._AC_UF1000,1000_QL80_.jpg'
            ],
            [
                'title' => 'Harry Potter e o Enigma do Príncipe',
                'author_id' => 1,  // J.K. Rowling
                'publisher_id' => $publishers->random()->id,
                'published_year' => 2005,
                'price' => 79.90,
                'stock' => 22,
                'description' => 'Harry descobre mais sobre o passado de Voldemort, enquanto a luta contra as forças das trevas intensifica.',
                'genres' => ['Fantasia', 'Aventura', 'Mistério'],
                'img_url' => 'https://m.media-amazon.com/images/I/613xc1zkeaL._AC_UF1000,1000_QL80_.jpg'
            ],
            [
                'title' => 'Harry Potter e as Relíquias da Morte',
                'author_id' => 1,  // J.K. Rowling
                'publisher_id' => $publishers->random()->id,
                'published_year' => 2007,
                'price' => 99.90,
                'stock' => 15,
                'description' => 'Harry e seus amigos partem em uma missão para destruir as Horcruxes de Voldemort e, finalmente, derrotá-lo.',
                'genres' => ['Fantasia', 'Aventura', 'Épico'],
                'img_url' => 'https://m.media-amazon.com/images/I/81rvO7xcJOL._AC_UF1000,1000_QL80_.jpg'
            ],

            [
                'title' => 'História do Futebol Brasileiro',
                'author_id' => 42, // Nelson Rodrigues
                'publisher_id' => $publishers->random()->id,
                'published_year' => 1963,
                'price' => 39.90,
                'stock' => 25,
                'description' => 'Nelson Rodrigues faz uma análise das origens e da evolução do futebol brasileiro, com uma visão crítica da sociedade.',
                'genres' => ['Esportes', 'História', 'Cultura Brasileira'],
                'img_url' => 'https://m.media-amazon.com/images/I/81Q9Eu4x2FL._AC_UF1000,1000_QL80_.jpg'
            ],
            [
                'title' => 'A Arte da Guerra',
                'author_id' => 43, // Sun Tzu
                'publisher_id' => $publishers->random()->id,
                'published_year' => -500,
                'price' => 19.90,
                'stock' => 50,
                'description' => 'Trata-se de um tratado militar e filosófico, com ensinamentos aplicáveis ao campo da estratégia e à vida pessoal.',
                'genres' => ['Filosofia', 'História', 'Estratégia'],
                'img_url' => 'https://m.media-amazon.com/images/I/51Fe45NGwkL._AC_UF1000,1000_QL80_.jpg'
            ],

            [
                'title' => 'Cozinha Brasileira',
                'author_id' => 44, // Claude Troisgros
                'publisher_id' => $publishers->random()->id,
                'published_year' => 2010,
                'price' => 59.90,
                'stock' => 30,
                'description' => 'Uma seleção de receitas e segredos da gastronomia brasileira, com pratos típicos e saborosos.',
                'genres' => ['Culinária', 'Gastronomia', 'Brasil'],
                'img_url' => 'https://m.media-amazon.com/images/I/91j7+dTA5DL._AC_UF1000,1000_QL80_.jpg'
            ],
            [
                'title' => 'Milk and Honey',
                'author_id' => 45, // Rupi Kaur
                'publisher_id' => $publishers->random()->id,
                'published_year' => 2014,
                'price' => 29.90,
                'stock' => 50,
                'description' => 'Uma coleção de poesia sobre sobrevivência, amor, perda e feminilidade, com ilustrações feitas pela própria autora.',
                'genres' => ['Poesia', 'Feminismo', 'Autoconhecimento'],
                'img_url' => 'https://m.media-amazon.com/images/I/61OtthMIgGL._AC_UF894,1000_QL80_.jpg'
            ],
            [
                'title' => 'The Sun and Her Flowers',
                'author_id' => 45, // Rupi Kaur
                'publisher_id' => $publishers->random()->id,
                'published_year' => 2017,
                'price' => 34.90,
                'stock' => 40,
                'description' => 'Uma jornada poética sobre crescimento, cura e ancestralidade, com textos e desenhos delicados.',
                'genres' => ['Poesia', 'Cultura', 'Feminismo'],
                'img_url' => 'https://m.media-amazon.com/images/I/61+0EmzUSjL._AC_UF1000,1000_QL80_.jpg'
            ],
            [
                'title' => 'A Culpa é das Estrelas',
                'author_id' => 46, // John Green
                'publisher_id' => $publishers->random()->id,
                'published_year' => 2012,
                'price' => 39.90,
                'stock' => 60,
                'description' => 'Uma história comovente sobre amor e perda entre dois adolescentes que enfrentam o câncer com coragem e humor.',
                'genres' => ['Romance', 'Drama', 'Juvenil'],
                'img_url' => 'https://m.media-amazon.com/images/I/51M9IbBqxCL._AC_UF1000,1000_QL80_.jpg'
            ],
            [
                'title' => 'Cidades de Papel',
                'author_id' => 46, // John Green
                'publisher_id' => $publishers->random()->id,
                'published_year' => 2008,
                'price' => 35.90,
                'stock' => 55,
                'description' => 'Uma aventura que mistura mistério e romance, enquanto um jovem tenta desvendar o paradeiro de sua amiga desaparecida.',
                'genres' => ['Mistério', 'Aventura', 'Juvenil'],
                'img_url' => 'https://m.media-amazon.com/images/I/61otKosI+OL._AC_UF1000,1000_QL80_.jpg'
            ],
            [
                'title' => 'Six of Crows',
                'author_id' => 47, // Leigh Bardugo
                'publisher_id' => $publishers->random()->id,
                'published_year' => 2015,
                'price' => 44.90,
                'stock' => 40,
                'description' => 'Um épico de fantasia que segue um grupo de desajustados em uma missão impossível de roubo.',
                'genres' => ['Fantasia', 'Aventura', 'Ficção'],
                'img_url' => 'https://m.media-amazon.com/images/I/91-DipaBR2L._AC_UF1000,1000_QL80_.jpg'
            ],
            [
                'title' => 'Sombra e Ossos',
                'author_id' => 47, // Leigh Bardugo
                'publisher_id' => $publishers->random()->id,
                'published_year' => 2012,
                'price' => 39.90,
                'stock' => 45,
                'description' => 'No Grishaverso, uma jovem descobre um poder incrível que pode ser a chave para salvar seu mundo do mal.',
                'genres' => ['Fantasia', 'Aventura', 'Romance'],
                'img_url' => 'https://m.media-amazon.com/images/I/81WKPIFKThL._AC_UF1000,1000_QL80_.jpg'
            ],
            
            [
                'title' => 'Ventania de Inverno',
                'author_id' => 2, // George R.R. Martin
                'publisher_id' => $publishers->random()->id,
                'published_year' => 2024,
                'price' => 59.90,
                'stock' => 80,
                'description' => 'Uma aventura épica em um mundo devastado por conflitos entre reinos e criaturas místicas.',
                'genres' => ['Romance', 'Fantasia', 'Drama'],
                'img_url' => 'https://img.skoob.com.br/zahiECr59Y2tU-HZ_fK-9P2Yj-Y=/600x0/center/top/filters:format(jpeg)/https://skoob.s3.amazonaws.com/livros/230426/OS_VENTOS_DO_INVERNO_1501774228230426SK1501774231B.jpg'
            ],
            [
                'title' => 'Mistério na Mansão Sombria',
                'author_id' => 4, // Agatha Christie
                'publisher_id' => $publishers->random()->id,
                'published_year' => 2019,
                'price' => 34.90,
                'stock' => 120,
                'description' => 'Um thriller de tirar o fôlego em que cada personagem esconde um segredo mortal.',
                'genres' => ['Mistério', 'Suspense', 'Thriller'],
                'img_url' => 'https://m.media-amazon.com/images/I/71mlpA9iaeL._AC_UF1000,1000_QL80_.jpg'
            ],
            [
                'title' => 'Memórias Póstumas de Bras Cubas',
                'author_id' => 5, // Machado de Assis
                'publisher_id' => $publishers->random()->id,
                'published_year' => 2021,
                'price' => 29.90,
                'stock' => 70,
                'description' => 'Uma obra que reflete sobre a vida, a morte e os sabores de uma existência vivida intensamente.',
                'genres' => ['Clássicos', 'Drama'],
                'img_url' => 'https://static.cestasmichelli.com.br/images/product/rs-6508-29919-0.jpg?ims=750x750'
            ],
            [
                'title' => 'O Código da Vinci',
                'author_id' => 48, // Dan Brown
                'publisher_id' => $publishers->random()->id,
                'published_year' => 2003,
                'price' => 44.90,
                'stock' => 90,
                'description' => 'Um thriller que mistura arte, religião e ciência, com tecnologia moderna como ferramenta fundamental.',
                'genres' => ['Tecnologia', 'Mistério', 'Thriller', 'Ciência'],
                'img_url' => 'https://m.media-amazon.com/images/I/91QSDmqQdaL._AC_UF894,1000_QL80_.jpg'
            ],
            [
                'title' => 'O Poder do Hábito',
                'author_id' => 49, // Charles Duhigg
                'publisher_id' => $publishers->random()->id,
                'published_year' => 2012,
                'price' => 39.90,
                'stock' => 100,
                'description' => 'O livro explora como os hábitos são formados e como podemos mudá-los para melhorar nossa vida pessoal e profissional.',
                'genres' => ['Autoajuda', 'Psicologia'],
                'img_url' => 'https://m.media-amazon.com/images/I/815iPX0SgkL._AC_UF1000,1000_QL80_.jpg'
            ],
            [
                'title' => 'A História da Arte',
                'author_id' => 50, // E.H. Gombrich
                'publisher_id' => $publishers->random()->id,
                'published_year' => 1950,
                'price' => 89.90,
                'stock' => 50,
                'description' => 'Considerado um dos maiores livros de introdução à história da arte, este livro de E.H. Gombrich abrange mais de 30.000 anos de história artística e é uma leitura essencial para entender a evolução das artes visuais.',
                'genres' => ['Artes', 'Música', 'Fotografia'],
                'img_url' => 'https://m.media-amazon.com/images/I/710i2Bp9KVL._AC_UF894,1000_QL80_.jpg'
            ],
            [
                'title' => 'Na Natureza Selvagem',
                'author_id' => 51, // Jon Krakauer
                'publisher_id' => $publishers->random()->id,
                'published_year' => 1996,
                'price' => 39.90,
                'stock' => 50,
                'description' => 'Na Natureza Selvagem é a história verdadeira de Christopher McCandless, um jovem que abandona a vida confortável para viver de forma selvagem no Alasca. O livro investiga as decisões de McCandless e as lições que ele deixou para trás.',
                'genres' => ['Viagem', 'Aventura', 'Economia'],
                'img_url' => 'https://books.google.com.br/books/publisher/content?id=otjLDgAAQBAJ&hl=pt-BR&pg=PA1&img=1&zoom=3&bul=1&sig=ACfU3U2wqxanw4jpO3rZnyPEQhtyAPzzJw&w=1280'
            ],
            [
                'title' => 'O Caminho da Felicidade',
                'author_id' => 52, // Dalai Lama
                'publisher_id' => $publishers->random()->id,
                'published_year' => 1998,
                'price' => 39.90,
                'stock' => 100,
                'description' => 'Em "O Caminho da Felicidade", o Dalai Lama oferece ensinamentos sobre como encontrar a verdadeira paz interior e felicidade, abordando a importância da compaixão, do perdão e da meditação. O livro é um guia para uma vida mais plena e consciente, com base nos princípios do budismo tibetano.',
                'genres' => ['Religião', 'Espiritualidade', 'Filosofia'],
                'img_url' => 'https://http2.mlstatic.com/D_NQ_NP_627110-MLB43850645246_102020-O.webp'
            ]

        ];

        foreach ($books as $bookData) {
            $book = Book::create([
                'title' => $bookData['title'],
                'author_id' => $bookData['author_id'],
                'publisher_id' => $bookData['publisher_id'],
                'published_year' => $bookData['published_year'],
                'price' => $bookData['price'],
                'stock' => $bookData['stock'],
                'description' => $bookData['description'],
                'img_url' => $bookData['img_url']
            ]);

            foreach ($bookData['genres'] as $genreName) {
                $genre = Genre::where('name', $genreName)->first();
                if ($genre) {
                    $book->genres()->attach($genre->id);
                }
            }
        }
    }
}
