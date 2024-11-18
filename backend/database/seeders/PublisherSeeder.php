<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Publisher;
class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $publishers = [
            ['name' => 'Penguin Random House', 'address' => 'New York, USA', 'website' => 'https://www.penguinrandomhouse.com', 'contact' => '123-456-7890'],
            ['name' => 'HarperCollins', 'address' => 'New York, USA', 'website' => 'https://www.harpercollins.com', 'contact' => '123-456-7891'],
            ['name' => 'Simon & Schuster', 'address' => 'New York, USA', 'website' => 'https://www.simonandschuster.com', 'contact' => '123-456-7892'],
            ['name' => 'Macmillan Publishers', 'address' => 'London, UK', 'website' => 'https://www.macmillan.com', 'contact' => '123-456-7893'],
            ['name' => 'Hachette Livre', 'address' => 'Paris, France', 'website' => 'https://www.hachette.com', 'contact' => '123-456-7894'],
            ['name' => 'Scholastic', 'address' => 'New York, USA', 'website' => 'https://www.scholastic.com', 'contact' => '123-456-7895'],
            ['name' => 'Oxford University Press', 'address' => 'Oxford, UK', 'website' => 'https://www.oup.com', 'contact' => '123-456-7896'],
            ['name' => 'Cambridge University Press', 'address' => 'Cambridge, UK', 'website' => 'https://www.cambridge.org', 'contact' => '123-456-7897'],
            ['name' => 'Bloomsbury Publishing', 'address' => 'London, UK', 'website' => 'https://www.bloomsbury.com', 'contact' => '123-456-7898'],
            ['name' => 'John Wiley & Sons', 'address' => 'Hoboken, USA', 'website' => 'https://www.wiley.com', 'contact' => '123-456-7899'],
            ['name' => 'Elsevier', 'address' => 'Amsterdam, Netherlands', 'website' => 'https://www.elsevier.com', 'contact' => '123-456-7800'],
            ['name' => 'Springer Nature', 'address' => 'Berlin, Germany', 'website' => 'https://www.springernature.com', 'contact' => '123-456-7801'],
            ['name' => 'Grupo Planeta', 'address' => 'Barcelona, Spain', 'website' => 'https://www.planetadelibros.com', 'contact' => '123-456-7802'],
            ['name' => 'Pearson Education', 'address' => 'London, UK', 'website' => 'https://www.pearson.com', 'contact' => '123-456-7803'],
            ['name' => 'Cengage Learning', 'address' => 'Boston, USA', 'website' => 'https://www.cengage.com', 'contact' => '123-456-7804'],
            ['name' => 'Thomson Reuters', 'address' => 'Toronto, Canada', 'website' => 'https://www.thomsonreuters.com', 'contact' => '123-456-7805'],
            ['name' => 'Pan Macmillan', 'address' => 'London, UK', 'website' => 'https://www.panmacmillan.com', 'contact' => '123-456-7806'],
            ['name' => 'Abril Educação', 'address' => 'São Paulo, Brazil', 'website' => 'https://www.abril.com.br', 'contact' => '123-456-7807'],
            ['name' => 'Companhia das Letras', 'address' => 'São Paulo, Brazil', 'website' => 'https://www.companhiadasletras.com.br', 'contact' => '123-456-7808'],
            ['name' => 'Editora Record', 'address' => 'Rio de Janeiro, Brazil', 'website' => 'https://www.record.com.br', 'contact' => '123-456-7809'],
            ['name' => 'Editora Moderna', 'address' => 'São Paulo, Brazil', 'website' => 'https://www.moderna.com.br', 'contact' => '123-456-7810'],
            ['name' => 'Editora Saraiva', 'address' => 'São Paulo, Brazil', 'website' => 'https://www.saraiva.com.br', 'contact' => '123-456-7811'],
            ['name' => 'Editora Globo', 'address' => 'São Paulo, Brazil', 'website' => 'https://www.editoraglobo.com.br', 'contact' => '123-456-7812'],
            ['name' => 'Ediouro', 'address' => 'Rio de Janeiro, Brazil', 'website' => 'https://www.ediouro.com.br', 'contact' => '123-456-7813'],
            ['name' => 'Grupo Editorial Nacional (GEN)', 'address' => 'São Paulo, Brazil', 'website' => 'https://www.grupogen.com.br', 'contact' => '123-456-7814'],
            ['name' => 'Zahar', 'address' => 'Rio de Janeiro, Brazil', 'website' => 'https://www.zahar.com.br', 'contact' => '123-456-7815'],
            ['name' => 'DarkSide Books', 'address' => 'Rio de Janeiro, Brazil', 'website' => 'https://www.darksidebooks.com.br', 'contact' => '123-456-7816'],
            ['name' => 'Rocco', 'address' => 'Rio de Janeiro, Brazil', 'website' => 'https://www.rocco.com.br', 'contact' => '123-456-7817'],
            ['name' => 'Intrínseca', 'address' => 'Rio de Janeiro, Brazil', 'website' => 'https://www.intrinseca.com.br', 'contact' => '123-456-7818'],
            ['name' => 'Harlequin Books', 'address' => 'Toronto, Canada', 'website' => 'https://www.harlequin.com', 'contact' => '123-456-7819'],
            ['name' => 'Egmont Publishing', 'address' => 'Copenhagen, Denmark', 'website' => 'https://www.egmont.com', 'contact' => '123-456-7820'],
            ['name' => 'DC Comics', 'address' => 'New York, USA', 'website' => 'https://www.dccomics.com', 'contact' => '123-456-7821'],
            ['name' => 'Marvel Comics', 'address' => 'New York, USA', 'website' => 'https://www.marvel.com', 'contact' => '123-456-7822'],
            ['name' => 'Chronicle Books', 'address' => 'San Francisco, USA', 'website' => 'https://www.chroniclebooks.com', 'contact' => '123-456-7823'],
            ['name' => 'Abrams Books', 'address' => 'New York, USA', 'website' => 'https://www.abramsbooks.com', 'contact' => '123-456-7824'],
            ['name' => 'Tor Books', 'address' => 'New York, USA', 'website' => 'https://www.tor.com', 'contact' => '123-456-7825'],
            ['name' => 'Andrews McMeel Publishing', 'address' => 'Kansas City, USA', 'website' => 'https://www.andrewsmcmeel.com', 'contact' => '123-456-7826'],
            ['name' => 'Fantagraphics Books', 'address' => 'Seattle, USA', 'website' => 'https://www.fantagraphics.com', 'contact' => '123-456-7827'],
            ['name' => 'Titan Books', 'address' => 'London, UK', 'website' => 'https://www.titanbooks.com', 'contact' => '123-456-7828'],
            ['name' => 'Hay House', 'address' => 'Carlsbad, USA', 'website' => 'https://www.hayhouse.com', 'contact' => '123-456-7829'],
            ['name' => 'Workman Publishing', 'address' => 'New York, USA', 'website' => 'https://www.workman.com', 'contact' => '123-456-7830'],
            ['name' => 'Beacon Press', 'address' => 'Boston, USA', 'website' => 'https://www.beacon.org', 'contact' => '123-456-7831'],
            ['name' => 'PublicAffairs', 'address' => 'New York, USA', 'website' => 'https://www.publicaffairsbooks.com', 'contact' => '123-456-7832'],
            ['name' => 'Verso Books', 'address' => 'London, UK', 'website' => 'https://www.versobooks.com', 'contact' => '123-456-7833'],
            ['name' => 'Viking Press', 'address' => 'New York, USA', 'website' => 'https://www.penguin.com/publishers/viking', 'contact' => '123-456-7834'],
            ['name' => 'Atlantic Books', 'address' => 'London, UK', 'website' => 'https://www.atlantic-books.co.uk', 'contact' => '123-456-7835'],
        ];

        foreach ($publishers as $publisher) {
            Publisher::create($publisher);
        }
    }

}
