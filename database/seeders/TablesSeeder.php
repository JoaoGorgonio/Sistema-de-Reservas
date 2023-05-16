<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Table;

class TablesSeeder extends Seeder
{
    public function run()
    {
        $descriptions = [
            [
                'descricao' => 'Mesa elegante próxima à janela, oferecendo uma vista deslumbrante do jardim. Perfeita para desfrutar de um jantar romântico.',
                'assentos' => 2
            ],
            [
                'descricao' => 'Mesa em uma área privativa com decoração luxuosa, ideal para encontros de negócios e celebrações especiais.',
                'assentos' => 6
            ],
            [
                'descricao' => 'Mesa em um ambiente exclusivo no terraço, com vista panorâmica da cidade. Acompanhada de cadeiras confortáveis, é perfeita para desfrutar de um almoço ao ar livre.',
                'assentos' => 4
            ],
            [
                'descricao' => 'Mesa em um cantinho tranquilo no bar, com uma seleção de coquetéis exclusivos. Aproveite a atmosfera descontraída enquanto desfruta de petiscos saborosos.',
                'assentos' => 2
            ],
            [
                'descricao' => 'Mesa no jardim, rodeada por uma paisagem exuberante. Sinta a brisa suave enquanto saboreia pratos frescos e saudáveis.',
                'assentos' => 4
            ],
            [
                'descricao' => 'Mesa em uma varanda coberta com decoração aconchegante, oferecendo um espaço relaxante e confortável para desfrutar de pratos requintados.',
                'assentos' => 4
            ],
            [
                'descricao' => 'Mesa ao lado do aquário, com uma vista fascinante da vida marinha. Desfrute de frutos do mar frescos enquanto aprecia esse ambiente único.',
                'assentos' => 6
            ],
            [
                'descricao' => 'Mesa em um mezanino com vista panorâmica do salão principal. Sinta-se privilegiado com essa visão exclusiva enquanto desfruta de uma refeição memorável.',
                'assentos' => 8
            ],
            [
                'descricao' => 'Mesa em um canto isolado, proporcionando uma experiência tranquila e reservada. Desfrute da privacidade enquanto saboreia pratos deliciosos.',
                'assentos' => 4
            ],
            [
                'descricao' => 'Mesa próxima ao palco, oferecendo uma visão privilegiada das apresentações ao vivo. Delicie-se com a culinária refinada enquanto aprecia o entretenimento.',
                'assentos' => 4
            ],
            [
                'descricao' => 'Mesa em uma área iluminada por luz natural, destacando a beleza dos pratos servidos. Desfrute de uma experiência gastronômica única nesse ambiente sofisticado.',
                'assentos' => 6
            ],
            [
                'descricao' => 'Mesa em uma alcova tranquila, proporcionando um espaço íntimo para desfrutar de uma refeição especial. Um refúgio perfeito para ocasiões românticas.',
                'assentos' => 2
            ],
            [
                'descricao' => 'Mesa em uma área aberta com uma brisa suave e ambiente descontraído. Desfrute de uma atmosfera leve enquanto degusta pratos requintados.',
                'assentos' => 4
            ],
            [
                'descricao' => 'Mesa próxima à lareira, criando um ambiente aconchegante e sofisticado. Ideal para encontros familiares ou jantares íntimos.',
                'assentos' => 4
            ],
            [
                'descricao' => 'Mesa em um ambiente iluminado por velas, proporcionando um clima romântico e intimista. Perfeito para um jantar a dois.',
                'assentos' => 2
            ],
        ];

        foreach ($descriptions as $index => $description) {
            Table::create([
                'ds_mesa' => $description['descricao'],
                'qt_assentos' => $description['assentos'],
                'im_mesa' => 'mesa' . $index+1,
            ]);
        }
    }
}
