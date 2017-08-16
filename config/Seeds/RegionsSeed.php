<?php
use Migrations\AbstractSeed;

/**
 * Regions seed.
 */
class RegionsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'name' => 'Stockholms län',
            ],
            [
                'id' => '3',
                'name' => 'Uppsala län',
            ],
            [
                'id' => '4',
                'name' => 'Södermanlands län',
            ],
            [
                'id' => '5',
                'name' => 'Östergötlands län',
            ],
            [
                'id' => '6',
                'name' => 'Jönköpings län',
            ],
            [
                'id' => '7',
                'name' => 'Kronobergs län',
            ],
            [
                'id' => '8',
                'name' => 'Kalmar län',
            ],
            [
                'id' => '9',
                'name' => 'Gotlands län',
            ],
            [
                'id' => '10',
                'name' => 'Blekinge län',
            ],
            [
                'id' => '12',
                'name' => 'Skåne län',
            ],
            [
                'id' => '13',
                'name' => 'Hallands län',
            ],
            [
                'id' => '14',
                'name' => 'Västra Götalands län',
            ],
            [
                'id' => '17',
                'name' => 'Värmlands län',
            ],
            [
                'id' => '18',
                'name' => 'Örebro län',
            ],
            [
                'id' => '19',
                'name' => 'Västmanlands län',
            ],
            [
                'id' => '20',
                'name' => 'Dalarnas län',
            ],
            [
                'id' => '21',
                'name' => 'Gävleborgs län',
            ],
            [
                'id' => '22',
                'name' => 'Västernorrlands län',
            ],
            [
                'id' => '23',
                'name' => 'Jämtlands län',
            ],
            [
                'id' => '24',
                'name' => 'Västerbottens län',
            ],
            [
                'id' => '25',
                'name' => 'Norrbottens län',
            ],
        ];

        $table = $this->table('regions');
        $table->insert($data)->save();
    }
}
