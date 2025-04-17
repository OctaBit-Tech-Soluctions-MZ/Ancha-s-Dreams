<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;

    /**
     * Retorna a rota anterior no estilo role.module
     * @return string
     */
    function getBackUrl() : string
    {
        $currentRoute = Route::currentRouteName();
        $segments = explode('.', $currentRoute);

        $role = $segments[0] ?? null;
        $module = $segments[1] ?? null;
        $action = $segments[2] ?? null;

        return match ($action) {
            'register', 'edit', 'details', 'lesson', 'lesson.add' => route("$role.$module"),
            default => route("$role.dashboard"),
        };
    }

    /**
     * Gera um ID único com prefixo e dois intervalos numéricos.
     * Exemplo: pre294802
     *
     * @param string $prefix Prefixo desejado
     * @param array $range1 Ex: ['min' => 10, 'max' => 99]
     * @param array $range2 Ex: ['min' => 100, 'max' => 999]
     * @return string
     */
    function generateId(string $prefix, array $range1 = [], array $range2 = []): string
    {
        return $prefix . rand($range1['min'], 
                                $range1['max']) . 
                         rand($range2['min'], 
                                $range2['max']);
    }

    /**
     * Gera um ID único que não existe na tabela do model fornecido.
     *
     * @param \Illuminate\Database\Eloquent\Model $model Ex: new \App\Models\Course()
     * @param string $prefix Prefixo desejado
     * @param array $range1 Intervalo 1
     * @param array $range2 Intervalo 2
     * @return string
     */
    function generateUniqueId(Model $model, string $prefix, 
                                array $range1, array $range2, 
                                                string $field = 'id'): string {
        do {
            $id = generateId($prefix, $range1, $range2);
        } while ($model::where($field, $id)->exists());

        return $id;
    }
    
    /**
     * Verifica se um numero de telefone e mocambicano ou e o normaliza com o prefixo 258
     * @param string $phone ex: 851234567
     * @return string
     */
    function normalizePhoneNumber($phone)
    {
        $phone = preg_replace('/[^0-9]/', '', $phone);

        if (strlen($phone) === 9 && in_array(substr($phone, 0, 2), ['84', '85', '86', '87'])) {
            $phone = '258' . $phone;
        }

        return $phone;
    }


