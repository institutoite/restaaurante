<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Branch;
use Illuminate\Support\Str;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $branches = [
            [
                'name' => 'Sucursal Centro',
                'code' => 'CENTRO',
                'address' => 'Av. Principal #123, Zona Central',
                'phone' => '4441001',
                'opening_time' => '08:00:00',
                'closing_time' => '22:00:00',
                'description' => 'Sucursal principal en el centro de la ciudad'
            ],
            [
                'name' => 'Sucursal Norte',
                'code' => 'NORTE',
                'address' => 'Av. Circunvalación #456, Zona Norte',
                'phone' => '4441002',
                'opening_time' => '09:00:00',
                'closing_time' => '21:00:00',
                'description' => 'Sucursal en la zona norte de la ciudad'
            ],
            [
                'name' => 'Sucursal Sur',
                'code' => 'SUR',
                'address' => 'Calle Comercio #789, Zona Sur',
                'phone' => '4441003',
                'opening_time' => '07:30:00',
                'closing_time' => '20:30:00',
                'description' => 'Sucursal en la zona sur, cerca del mercado'
            ],
            [
                'name' => 'Sucursal Este',
                'code' => 'ESTE',
                'address' => 'Av. Universitaria #101, Zona Este',
                'phone' => '4441004',
                'opening_time' => '08:30:00',
                'closing_time' => '21:30:00',
                'description' => 'Sucursal cerca del campus universitario'
            ],
            [
                'name' => 'Sucursal Oeste',
                'code' => 'OESTE',
                'address' => 'Av. Industrial #202, Zona Oeste',
                'phone' => '4441005',
                'opening_time' => '07:00:00',
                'closing_time' => '20:00:00',
                'description' => 'Sucursal en la zona industrial'
            ]
        ];

        foreach ($branches as $branch) {
            Branch::create([
                'name' => $branch['name'],
                'code' => $branch['code'],
                'address' => $branch['address'],
                'phone' => $branch['phone'],
                'opening_time' => $branch['opening_time'],
                'closing_time' => $branch['closing_time'],
                'is_active' => true,
                'description' => $branch['description']
            ]);
        }

        $this->command->info('¡Sucursales creadas exitosamente!'); //imprrime en terminal
    }
}
