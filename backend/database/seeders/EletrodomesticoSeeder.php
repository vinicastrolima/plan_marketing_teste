<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Eletrodomestico;
use Illuminate\Support\Arr;

class EletrodomesticoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nomes = ['Tv', 'Celular', 'MicroOndas', 'Geladeira', 'Fogão', 'Ventilador', 'AirFryer'];
        $marcas = ['LG', 'Samsung', 'Electrolux', 'Brastemp', 'Philco', 'Consul', 'Mondial'];
        $tensao_enum = ['110V', '220V', '100V', '127V', '230V', '240V', '208V', '480V'];
        $descricoes = [
            'Ótimo para entretenimento em casa.',
            'Perfeito para se manter conectado.',
            'Aqueça suas refeições de maneira rápida e eficiente.',
            'Mantenha seus alimentos frescos por mais tempo.',
            'Cozinhe suas refeições com facilidade.',
            'Mantenha o ambiente fresco e agradável.',
            'Prepare alimentos saudáveis de forma prática.'
        ];

        for ($i = 0; $i < 25; $i++) {
            Eletrodomestico::create([
                'nome' => Arr::random($nomes),
                'descricao' => Arr::random($descricoes),
                'tensao' => Arr::random($tensao_enum),
                'marca' => Arr::random($marcas),
            ]);
        }
    }
}
