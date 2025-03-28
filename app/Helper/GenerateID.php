<?php

namespace App\Helper;

use Illuminate\Database\Eloquent\Model;

class GenerateID{

    /**
     * Responsavel por generar um id
     * Exemplo: pre0294
     * @return string
     */
    public static function make(string $pre, $rand = [], $rand2 = []): string {

        return $pre . rand($rand['min'],
                           $rand['max']) . 
                      rand($rand2['min'],
                           $rand2['max']);
    }

    /**
     * Responsavel por garantir que nenhum ID seja repetido
     * So ira retornar um resultado caso o ID generado nao exista na base de dados
     * @return string
     */
    public static function exists(Model $entity, string $pre,
                                                 $rand, $rand2): string{

        $datas = $entity::all();
        $cont = false;

        do{
            $id = self::make($pre,$rand,$rand2);

            foreach ($datas as $data) {

                if($data->id == $id) $cont = true;
            }

        }while($cont);

        return $id;
    }
}