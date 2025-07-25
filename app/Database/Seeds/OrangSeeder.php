<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Seeder;

class OrangSeeder extends Seeder
{
    public function run()
    {
        // $data = [
        //     [
        //         'nama'          => 'darth',
        //         'alamat'        => 'Jl. ABC No. 123',
        //         'created_at'    => Time::now(),
        //         'updated_at'    => Time::now()
        //     ],
        //     [
        //         'nama'          => 'Doddy Ferdiansyah',
        //         'alamat'        => 'Jl. ABC No. 321',
        //         'created_at'    => Time::now(),
        //         'updated_at'    => Time::now()
        //     ],
        //     [
        //         'nama'          => 'Erik',
        //         'alamat'        => 'Jl. Dago',
        //         'created_at'    => Time::now(),
        //         'updated_at'    => Time::now()
        //     ],
        // ];

        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 100; $i++) {
            $data = [
                'nama'          => $faker->name,
                'alamat'        => $faker->address,
                'created_at'    => Time::createFromTimestamp($faker->unixTime()),
                'updated_at'    => Time::now()
            ];

            $this->db->table('Orang')->insert($data);
        }

        // Simple Queries
        // $this->db->query('INSERT INTO Orang (nama, alamat, created_at, updated_at) VALUES(:nama:, :alamat:, :created_at:, :updated_at:)', $data);

        // Using Query Builder
        // $this->db->table('Orang')->insertBatch($data);
    }
}
