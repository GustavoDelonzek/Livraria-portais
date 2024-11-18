<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authors = [
            [
                'name' => 'J.K. Rowling',
                'bio' => 'J.K. Rowling é uma escritora britânica mundialmente conhecida pela série Harry Potter. Sua história revolucionou a literatura infantojuvenil e deu origem a uma das franquias mais bem-sucedidas da história.',
                'date_of_birth' => '1965-07-31',
                'nationality' => 'British',
                'img_url' => 'https://s2.glbimg.com/XsbfFRDdcLdvQyLaQPsvHvbAYvs=/e.glbimg.com/og/ed/f/original/2020/11/10/50414449_1979923558782917_748461144397578240_o.jpg'
            ],
            [
                'name' => 'George R.R. Martin',
                'bio' => 'George R.R. Martin é um escritor americano conhecido pela série As Crônicas de Gelo e Fogo, base para Game of Thrones. Ele é mestre em criar tramas políticas complexas e personagens realistas.',
                'date_of_birth' => '1948-09-20',
                'nationality' => 'American',
                'img_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/ed/Portrait_photoshoot_at_Worldcon_75%2C_Helsinki%2C_before_the_Hugo_Awards_%E2%80%93_George_R._R._Martin.jpg/1200px-Portrait_photoshoot_at_Worldcon_75%2C_Helsinki%2C_before_the_Hugo_Awards_%E2%80%93_George_R._R._Martin.jpg'
            ],
            [
                'name' => 'J.R.R. Tolkien',
                'bio' => 'J.R.R. Tolkien é considerado o pai da fantasia moderna. Autor de O Senhor dos Anéis e O Hobbit, suas obras estabeleceram os alicerces do gênero fantasia.',
                'date_of_birth' => '1892-01-03',
                'nationality' => 'British',
                'img_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQ8LnZqTINVz1HNJJe5cCicGyw6ivWiBM68A&s'
            ],
            [
                'name' => 'Agatha Christie',
                'bio' => 'Conhecida como a Rainha do Crime, Agatha Christie escreveu mais de 80 romances policiais, incluindo clássicos como Assassinato no Expresso do Oriente.',
                'date_of_birth' => '1890-09-15',
                'nationality' => 'British',
                'img_url' => 'https://p2.trrsf.com/image/fget/cf/940/0/images.terra.com/2015/09/15/agatha-christie.jpg'
            ],
            [
                'name' => 'Machado de Assis',
                'bio' => 'Machado de Assis foi um dos maiores escritores brasileiros. Obras como Memórias Póstumas de Brás Cubas e Dom Casmurro exploram temas como a psicologia humana e a hipocrisia social.',
                'date_of_birth' => '1839-06-21',
                'nationality' => 'Brazilian',
                'img_url' => 'https://cdn.brasildefato.com.br/media/d3e65c869db03180a7d34b1569ccdc04.jpg'
            ],
            [
                'name' => 'Clarice Lispector',
                'bio' => 'Clarice Lispector é conhecida por sua prosa introspectiva e poética. Obras como A Paixão Segundo G.H. tornaram-se clássicos da literatura brasileira.',
                'date_of_birth' => '1920-12-10',
                'nationality' => 'Brazilian',
                'img_url' => 'https://olavete.com.br/wp-content/uploads/2024/07/Clarice-Lispector.jpg'
            ],
            [
                'name' => 'Stephen King',
                'bio' => 'Stephen King é um mestre do terror e do suspense. Seus livros, como O Iluminado e It: A Coisa, inspiraram inúmeras adaptações cinematográficas.',
                'date_of_birth' => '1947-09-21',
                'nationality' => 'American',
                'img_url' => 'https://www.gibizilla.com.br/wp-content/uploads/2024/04/Stephen_King_01.jpg'
            ],
            [
                'name' => 'Gabriel García Márquez',
                'bio' => 'Vencedor do Nobel de Literatura, Gabriel García Márquez foi um dos maiores escritores do realismo mágico, autor de Cem Anos de Solidão.',
                'date_of_birth' => '1927-03-06',
                'nationality' => 'Colombian',
                'img_url' => 'https://diplomatique.org.br/wp-content/uploads/2024/05/garcia-marquez-2.jpg'
            ],
            [
                'name' => 'Franz Kafka',
                'bio' => 'Franz Kafka escreveu obras marcantes como A Metamorfose e O Processo, que abordam temas como alienação e burocracia em um mundo absurdo.',
                'date_of_birth' => '1883-07-03',
                'nationality' => 'Czech',
                'img_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/26/Franz_Kafka%2C_1923.jpg/640px-Franz_Kafka%2C_1923.jpg'
            ],
            [
                'name' => 'H.P. Lovecraft',
                'bio' => 'H.P. Lovecraft foi um autor americano pioneiro na ficção de terror cósmico, criador do mito de Cthulhu.',
                'date_of_birth' => '1890-08-20',
                'nationality' => 'American',
                'img_url' => 'https://upload.wikimedia.org/wikipedia/commons/1/10/H._P._Lovecraft%2C_June_1934.jpg'
            ],
            [
                'name' => 'Jane Austen',
                'bio' => 'Jane Austen escreveu romances que satirizam a sociedade de sua época, como Orgulho e Preconceito e Razão e Sensibilidade.',
                'date_of_birth' => '1775-12-16',
                'nationality' => 'British',
                'img_url' => 'https://s2.glbimg.com/NlD81at44xu_dyTZwZOG-oXLDik=/e.glbimg.com/og/ed/f/original/2017/07/18/jane-austen.png'
            ],
            [
                'name' => 'Ernest Hemingway',
                'bio' => 'Hemingway foi um romancista e jornalista americano, autor de clássicos como O Velho e o Mar e Por Quem os Sinos Dobram.',
                'date_of_birth' => '1899-07-21',
                'nationality' => 'American',
                'img_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/28/ErnestHemingway.jpg/800px-ErnestHemingway.jpg'
            ],
            [
                'name' => 'Edgar Allan Poe',
                'bio' => 'Edgar Allan Poe foi um escritor, poeta e crítico literário americano conhecido por suas histórias sombrias e macabras. Ele é amplamente considerado um dos pioneiros do gênero de terror psicológico e da literatura policial. Suas obras mais famosas incluem O Corvo, O Gato Preto e A Queda da Casa de Usher.',
                'date_of_birth' => '1809-01-19',
                'nationality' => 'American',
                'img_url' => 'https://upload.wikimedia.org/wikipedia/commons/9/97/Edgar_Allan_Poe%2C_circa_1849%2C_restored%2C_squared_off.jpg'
            ],
            [
                'name' => 'Margaret Atwood',
                'bio' => 'Margaret Atwood é uma escritora canadense famosa por seus romances distópicos e feministas, como O Conto da Aia. Suas obras abordam temas como opressão, liberdade e a relação entre o poder e a sociedade.',
                'date_of_birth' => '1939-11-18',
                'nationality' => 'Canadian',
                'img_url' => 'https://fronteiras.com/storage/readings/February2022/b2148-Atwood--Margaret_cr_George_Whiteside--1-.jpg'
            ],
            [
                'name' => 'Chimamanda Ngozi Adichie',
                'bio' => 'Chimamanda Ngozi Adichie é uma escritora nigeriana conhecida por explorar temas de identidade, feminismo e colonização. Suas obras, como Meio Sol Amarelo e Americanah, têm recebido aclamação internacional.',
                'date_of_birth' => '1977-09-15',
                'nationality' => 'Nigerian',
                'img_url' => 'https://i0.wp.com/almapreta.com.br/images/2024/10/A-contagem-dos-sonhos-Chimamanda-Ngozi-Adichie-anuncia-novo-romance-apos-dez-anos.jpg?fit=1400%2C1050&ssl=1'
            ],
            [
                'name' => 'Toni Morrison',
                'bio' => 'Toni Morrison foi uma escritora americana e vencedora do Prêmio Nobel de Literatura. Suas obras, como Amada e Canção de Salomão, exploram as experiências e as lutas dos afro-americanos ao longo da história.',
                'date_of_birth' => '1931-02-18',
                'nationality' => 'American',
                'img_url' => 'https://culturadoria.com.br/wp-content/uploads/2021/02/Toni-Morrison-Foto-Timothy-Greenfield-Sanders-Magnolia-Pictures-2.jpg'
            ],
            [
                'name' => 'Haruki Murakami',
                'bio' => 'Haruki Murakami é um dos autores contemporâneos mais populares do Japão. Seus romances, como Norwegian Wood e Kafka à Beira-Mar, combinam elementos de realismo mágico, surrealismo e introspecção.',
                'date_of_birth' => '1949-01-12',
                'nationality' => 'Japanese',
                'img_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTO4Cwt02Gqlrz50a0VnwRkxMbJ0Ab3IWeMYg&s'
            ],
            [
                'name' => 'Isabel Allende',
                'bio' => 'Isabel Allende é uma autora chilena cujas obras frequentemente incorporam elementos de realismo mágico. Seus romances, como A Casa dos Espíritos e Paula, exploram temas de família, política e história.',
                'date_of_birth' => '1942-08-02',
                'nationality' => 'Chilean',
                'img_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d0/Isabel_Allende_Frankfurter_Buchmesse_2015_%28cropped%29.JPG/800px-Isabel_Allende_Frankfurter_Buchmesse_2015_%28cropped%29.JPG'
            ],
            [
                'name' => 'Carlos Drummond de Andrade',
                'bio' => 'Carlos Drummond de Andrade foi um dos maiores poetas brasileiros, conhecido por suas obras introspectivas e modernistas. Seus poemas abordam temas de amor, existência e a condição humana.',
                'date_of_birth' => '1902-10-31',
                'nationality' => 'Brazilian',
                'img_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/36/Carlos_Drummond_de_Andrade%2C_1970.tif/lossy-page1-1200px-Carlos_Drummond_de_Andrade%2C_1970.tif.jpg'
            ],
            [
                'name' => 'Maya Angelou',
                'bio' => 'Maya Angelou foi uma escritora, poeta e ativista americana. Seu trabalho mais conhecido, Eu Sei Por Que o Pássaro Canta na Gaiola, é uma autobiografia que aborda temas de racismo, identidade e superação.',
                'date_of_birth' => '1928-04-04',
                'nationality' => 'American',
                'img_url' => 'https://reprograma.github.io/T8-projeto1-m-de-maravilhosa/personalidade/maya-angelou/img/maya-angelou.jpg'
            ],
            [
                'name' => 'Victor Hugo',
                'bio' => 'Victor Hugo foi um escritor francês conhecido por seus romances épicos como Os Miseráveis e O Corcunda de Notre-Dame. Suas obras exploram temas de justiça social, religião e política.',
                'date_of_birth' => '1802-02-26',
                'nationality' => 'French',
                'img_url' => 'https://p2.trrsf.com/image/fget/cf/940/0/images.terra.com/2013/01/29/02victorhugogetty.jpg'
            ],
            [
                'name' => 'Fiódor Dostoiévski',
                'bio' => 'Fiódor Dostoiévski foi um dos maiores escritores russos, autor de clássicos como Crime e Castigo e Os Irmãos Karamázov. Suas obras exploram questões existenciais e psicológicas.',
                'date_of_birth' => '1821-11-11',
                'nationality' => 'Russian',
                'img_url' => 'https://andersonsandes.com.br/wp-content/uploads/2019/12/Retrato-de-Dostoievski.-Oleo-sobre-tela-de-Vasily-Perov-1872.-Galeria-Tretyakov-Moscou.jpg'
            ],
            [
                'name' => 'Marcel Proust',
                'bio' => 'Marcel Proust foi um escritor francês conhecido pela obra monumental Em Busca do Tempo Perdido, uma das maiores realizações literárias do século XX. Seu trabalho aborda a memória, o amor e a passagem do tempo.',
                'date_of_birth' => '1871-07-10',
                'nationality' => 'French',
                'img_url' => 'https://upload.wikimedia.org/wikipedia/commons/b/b8/Marcel_Proust_1895.jpg'
            ],
            [
                'name' => 'Émile Zola',
                'bio' => 'Émile Zola foi um escritor francês e líder do movimento naturalista. Suas obras, como Germinal e Nana, exploram temas sociais e as condições de vida da classe trabalhadora.',
                'date_of_birth' => '1840-04-02',
                'nationality' => 'French',
                'img_url' => 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgEtlAVDVTi10YFCMybIe_d0G3oZwTouwZB1VQ6c3w2vL-ThXNfnXU6zXK7V46B20kmsqXAl_3NFM7Beo2l35VvdBHm9BIYPK98fumX5KUp5REdwpfJtNIa32dtsUcB8GeuVZOMBfIl7os/s1600/%C3%89mile_Zola.jpg'
            ],
            [
                'name' => 'James Joyce',
                'bio' => 'James Joyce foi um escritor irlandês conhecido por revolucionar a literatura com obras como Ulisses e Dublinenses. Ele é considerado um dos maiores modernistas da literatura.',
                'date_of_birth' => '1882-02-02',
                'nationality' => 'Irish',
                'img_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/75/James_Joyce_by_Alex_Ehrenzweig%2C_1915_cropped.jpg/640px-James_Joyce_by_Alex_Ehrenzweig%2C_1915_cropped.jpg'
            ],
            [
                'name' => 'Hermann Hesse',
                'bio' => 'Hermann Hesse foi um escritor e poeta alemão, vencedor do Nobel de Literatura. Obras como Sidarta e O Lobo da Estepe exploram temas espirituais e existenciais.',
                'date_of_birth' => '1877-07-02',
                'nationality' => 'German',
                'img_url' => 'https://upload.wikimedia.org/wikipedia/commons/d/da/Hermann_Hesse_2.jpg'
            ],
            [
                'name' => 'Leo Tolstoy',
                'bio' => 'Leo Tolstoy foi um escritor russo considerado um dos maiores de todos os tempos. Suas obras-primas, como Guerra e Paz e Anna Karenina, exploram a sociedade, a guerra e a psicologia humana.',
                'date_of_birth' => '1828-09-09',
                'nationality' => 'Russian',
                'img_url' => 'https://www.thoughtco.com/thmb/74ysiATPKgj6bGEVy5Ge4eT8XQA=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/GettyImages-3088579-ba5869cf16484fb3a31edb588a63d187.jpg'
            ],
            [
                'name' => 'Jean-Paul Sartre',
                'bio' => 'Jean-Paul Sartre foi um filósofo, dramaturgo e romancista francês, conhecido por suas ideias existencialistas. Obras como A Náusea e O Ser e o Nada exploram a liberdade, a angústia e o absurdo da existência.',
                'date_of_birth' => '1905-06-21',
                'nationality' => 'French',
                'img_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR4T45iNIRVm0zlyNmxmrGU969WSzV-6Jj-CA&s'
            ],
            [
                'name' => 'Albert Camus',
                'bio' => 'Albert Camus foi um escritor e filósofo francês, vencedor do Nobel de Literatura. Suas obras, como O Estrangeiro e O Mito de Sísifo, são pilares do existencialismo e do absurdo.',
                'date_of_birth' => '1913-11-07',
                'nationality' => 'French',
                'img_url' => 'https://diplomatique.org.br/wp-content/uploads/2024/01/Albert_Camus_gagnant_de_prix_Nobel_portrait_en_buste_pose_au_bureau_faisant_face_a_gauche_cigarette_de_tabagisme-e1704736590616.jpg'
            ],
            [
                'name' => 'Colson Whitehead',
                'bio' => 'Colson Whitehead é um escritor americano, vencedor de dois Prêmios Pulitzer de Ficção. Suas obras, como "The Underground Railroad" e "The Nickel Boys", abordam temas de raça e injustiça social.',
                'date_of_birth' => '1969-11-06',
                'nationality' => 'American',
                'img_url' => 'https://upload.wikimedia.org/wikipedia/commons/2/2e/Colson_whitehead_2014.jpg'
            ],
            [
                'name' => 'Sally Rooney',
                'bio' => 'Sally Rooney é uma escritora irlandesa, conhecida por seus romances sobre relacionamentos e questões emocionais. Seus livros mais famosos são "Normal People" e "Conversations with Friends".',
                'date_of_birth' => '1991-02-20',
                'nationality' => 'Irish',
                'img_url' => 'https://www.cnnbrasil.com.br/wp-content/uploads/sites/12/2024/05/sally-rooney.jpg?w=1200&h=900&crop=1'
            ],
            [
                'name' => 'Téa Obreht',
                'bio' => 'Téa Obreht é uma escritora sérvia-americana, conhecida por seu romance de estreia "The Tiger’s Wife", que mistura elementos de realismo mágico e questões da guerra civil nos Balcãs.',
                'date_of_birth' => '1985-09-30',
                'nationality' => 'Serbian-American',
                'img_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSoGFfxr2bDT7sbEYvBo8VeV-TSGZ65-S4Vmg&s'
            ],
            [
                'name' => 'Ta-Nehisi Coates',
                'bio' => 'Ta-Nehisi Coates é um escritor e jornalista americano, vencedor de vários prêmios. Suas obras, como "Entre o Mundo e Eu" e "The Water Dancer", abordam temas de identidade e a experiência negra nos Estados Unidos.',
                'date_of_birth' => '1975-09-30',
                'nationality' => 'American',
                'img_url' => 'https://media.newyorker.com/photos/5cfbcf21dba286b9c2d8aa8f/4:3/w_2560,h_1920,c_limit/RadioHour-Ta-nehisiCoates.jpg'
            ],
            [
                'name' => 'Zadie Smith',
                'bio' => 'Zadie Smith é uma escritora britânica de origem jamaicana, conhecida por seus romances que exploram as questões de identidade, imigração e cultura. "Dessa Terra" e "Sobre a Beleza" são alguns dos seus trabalhos mais conhecidos.',
                'date_of_birth' => '1975-10-25',
                'nationality' => 'British',
                'img_url' => 'https://cdn.britannica.com/24/198024-050-D0A3D9C3/Zadie-Smith.jpg'
            ],
            [
                'name' => 'Yaa Gyasi',
                'bio' => 'Yaa Gyasi é uma escritora ganesa-americana. Seu romance de estreia "Homegoing", que trata da história das famílias divididas pela escravidão, foi aclamado pela crítica.',
                'date_of_birth' => '1989-11-01',
                'nationality' => 'Ghanaian-American',
                'img_url' => 'https://eteme5j4z9y.exactdn.com/wp-content/uploads/2020/01/2020_VFP_YaaGyasi_001.jpg?strip=all&lossy=1&ssl=1'
            ],
            [
                'name' => 'Brit Bennett',
                'bio' => 'Brit Bennett é uma escritora americana conhecida por seu romance "The Vanishing Half", que examina questões de raça e identidade ao longo de uma história sobre duas irmãs gêmeas de uma família afro-americana.',
                'date_of_birth' => '1990-08-21',
                'nationality' => 'American',
                'img_url' => 'https://upload.wikimedia.org/wikipedia/commons/9/96/BritBennett.jpg'
            ],
            [
                'name' => 'Bernardine Evaristo',
                'bio' => 'Bernardine Evaristo é uma escritora britânica, vencedora do Booker Prize, conhecida por seu romance "Girl, Woman, Other", que explora a vida de doze personagens femininas em várias gerações.',
                'date_of_birth' => '1959-05-28',
                'nationality' => 'British',
                'img_url' => 'https://www.cartacapital.com.br/wp-content/uploads/2022/09/pluralli-1.jpg'
            ],
            [
                'name' => 'Ocean Vuong',
                'bio' => 'Ocean Vuong é um poeta e romancista vietnamita-americano, cujo romance de estreia "On Earth We’re Briefly Gorgeous" explora questões de identidade, amor e o legado da guerra.',
                'date_of_birth' => '1988-10-14',
                'nationality' => 'Vietnamese-American',
                'img_url' => 'https://upload.wikimedia.org/wikipedia/commons/7/7e/Ocean_vuong_8045064_%2848458986647%29_%28cropped%29.jpg'
            ],
            [
                'name' => 'Kiley Reid',
                'bio' => 'Kiley Reid é uma escritora americana, autora do romance de estreia "Such a Fun Age", que examina as complexidades das relações de poder e raça na sociedade moderna.',
                'date_of_birth' => '1992-02-04',
                'nationality' => 'American',
                'img_url' => 'https://i.guim.co.uk/img/media/9963e287d43579751a071088355684cdb03517b2/0_1030_3329_1997/master/3329.jpg?width=1200&quality=85&auto=format&fit=max&s=222c5efce68853f2a8b7b800e5dddefa'
            ],
            [
                'name' => 'Matthew Desmond',
                'bio' => 'Matthew Desmond é um sociólogo e autor americano, conhecido por sua obra "Evicted", que investiga o impacto da falta de moradia na vida dos pobres urbanos nos Estados Unidos.',
                'date_of_birth' => '1983-05-09',
                'nationality' => 'American',
                'img_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a9/Matthew_Desmond_at_2023_National_Book_Festival_%2853123258729%29_%28cropped%29.jpg/800px-Matthew_Desmond_at_2023_National_Book_Festival_%2853123258729%29_%28cropped%29.jpg'
            ],
            [
                'name' => 'Neil Gaiman',
                'bio' => 'Neil Gaiman é um escritor britânico conhecido por suas obras de fantasia, ficção científica e literatura infantil, como Sandman, Coraline e Deuses Americanos.',
                'date_of_birth' => '1960-11-10',
                'nationality' => 'British',
                'img_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT0DEunawoa_7rSbZGvPHw9M9a8IaOGA4AH6w&s'
            ],
            [
                'name' => 'Nelson Rodrigues',
                'bio' => 'Nelson Rodrigues foi um jornalista, dramaturgo e escritor brasileiro, conhecido por suas peças teatrais que abordam temas como a psicologia humana e a moralidade. Sua obra mais famosa é "Vestido de Noiva".',
                'date_of_birth' => '1912-08-23',
                'nationality' => 'Brazilian',
                'img_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d8/Nelson_Rodrigues_%281971%29.tif/lossy-page1-1200px-Nelson_Rodrigues_%281971%29.tif.jpg'
            ],

            [
                'name' => 'Sun Tzu',
                'bio' => 'Sun Tzu foi um estrategista militar e filósofo chinês, autor de "A Arte da Guerra", um dos tratados mais influentes sobre estratégia, guerra e liderança.',
                'date_of_birth' => '544-01-01',
                'nationality' => 'Chinese',
                'img_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/37/Enchoen27n3200.jpg/640px-Enchoen27n3200.jpg'
            ],
            [
                'name' => 'Claude Troisgros',
                'bio' => 'Claude Troisgros é um renomado chef de cozinha francês, naturalizado brasileiro. Ele é conhecido por sua fusão da culinária francesa com ingredientes e sabores brasileiros. Claude é um dos chefs mais influentes da gastronomia no Brasil e possui vários restaurantes e programas de TV.',
                'date_of_birth' => '1955-06-23',
                'nationality' => 'Brazilian',
                'img_url' => 'https://upload.wikimedia.org/wikipedia/commons/8/83/Claude_Troisgros_in_Vai_Que_Cola_from_Multishow.png'
            ],
            [
                "name" => "Rupi Kaur",
                "bio" => "Rupi Kaur é uma poeta e artista canadense de origem indiana, famosa por seus livros de poesia visual, como 'milk and honey' e 'the sun and her flowers'.",
                "date_of_birth" => "1992-10-04",
                "nationality" => "Canadian",
                "img_url" => "https://i.zst.com.br/images/rupi-kaur-conheca-os-livros-de-poesia-da-autora-que-e-sucesso-de-vendas-photo780438686-44-1c-19.jpg"
            ],
            [
                "name" => "John Green",
                "bio" => "John Green é um autor americano conhecido por romances juvenis como 'A Culpa é das Estrelas' e 'Cidades de Papel'.",
                "date_of_birth" => "1977-08-24",
                "nationality" => "American",
                "img_url" => "https://upload.wikimedia.org/wikipedia/commons/b/b9/John_Green_2020_%28C6txQ5yn5S8%29.jpg"
            ],
            [
                "name" => "Leigh Bardugo",
                "bio" => "Leigh Bardugo é uma autora americana conhecida por seus romances de fantasia, incluindo 'Sombra e Ossos' e 'Six of Crows'.",
                "date_of_birth" => "1975-04-06",
                "nationality" => "American",
                "img_url" => "https://assets-us-01.kc-usercontent.com/5cb25086-82d2-4c89-94f0-8450813a0fd3/293c3dbc-5a3a-4eb4-b17f-22ed98914480/leigh-bardugo%20%281%29.png?fm=png&auto=format"
            ],
            [
                "name" => "Dan Brown",
                "bio" => "Dan Brown é um autor americano conhecido por seus thrillers, especialmente pela série de livros protagonizada pelo professor de simbologia Robert Langdon, como 'O Código da Vinci' e 'Anjos e Demônios'. Seus livros combinam história, arte, religião e ciência com enredos de suspense e mistério.",
                "date_of_birth" => "1964-06-22",
                "nationality" => "American",
                "img_url" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR1sgXVf1_wxoUyLR6Cy8LWiMsTy_R_f5tr-w&s"
            ],
            [
                "name" => "Charles Duhigg",
                "bio" => "Charles Duhigg é um jornalista e autor americano, conhecido por seu trabalho sobre a ciência dos hábitos e produtividade. Ele é autor de 'O Poder do Hábito' e 'Mais Rápido e Melhor', livros que exploram como hábitos afetam nosso comportamento e como podemos melhorar nosso desempenho pessoal e profissional.",
                "date_of_birth" => "1974-04-01",
                "nationality" => "American",
                "img_url" => "https://m.media-amazon.com/images/S/amzn-author-media-prod/g8lp1cjvrn21jgr240gvojjjiv.jpg"
            ],
            [
                "name" => "E.H. Gombrich",
                "bio" => "Ernst Hans Gombrich foi um historiador de arte austríaco, considerado um dos mais importantes estudiosos da arte do século XX. Seu trabalho mais famoso, 'A História da Arte', é uma introdução acessível e abrangente à história da arte, abordando de forma didática e clara a evolução das artes visuais ao longo do tempo.",
                "date_of_birth" => "1909-03-30",
                "nationality" => "Austrian",
                "img_url" => "https://andredorigo.com.br/wp-content/uploads/2021/09/CAPA-Ernst_Gombrich.jpg"
            ],
            [
                "name" => "Jon Krakauer",
                "bio" => "Jon Krakauer é um jornalista e escritor americano, conhecido por suas obras sobre aventura, montanhismo e experiências extremas. Ele ficou famoso por seu livro 'Na Natureza Selvagem', que narra a história de Christopher McCandless, e também por 'Into Thin Air', que relata sua experiência pessoal durante a tragédia no Monte Everest.",
                "date_of_birth" => "1954-04-12",
                "nationality" => "American",
                "img_url" => "https://upload.wikimedia.org/wikipedia/commons/thumb/4/4c/Jon_Krakauer_speaking_in_2009.jpg/1200px-Jon_Krakauer_speaking_in_2009.jpg"
            ],
            [
                "name" => "Dalai Lama",
                "bio" => "O Dalai Lama, Tenzin Gyatso, é o líder espiritual tibetano e um dos mais conhecidos defensores da paz, compaixão e harmonia entre os povos. Ele é autor de vários livros sobre budismo, meditação e filosofia espiritual, sendo amplamente reconhecido por seu trabalho em promover a paz mundial e os direitos humanos. Recebeu o Prêmio Nobel da Paz em 1989.",
                "date_of_birth" => "1935-07-06",
                "nationality" => "Tibetan",
                "img_url" => "https://www.cnnbrasil.com.br/wp-content/uploads/sites/12/2021/06/26019_28A1592C82B69A06-2.jpg"
            ]
            



        ];

        foreach ($authors as $author) {
            Author::create($author);
        }
    }
}
