<?php

use App\Models\User;
use FFMpeg\FFMpeg;
use FFMpeg\FFProbe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;

/**
 * Retorna a rota anterior no estilo role.module
 * @return string
 */
function getBackUrl(): string
{
    $currentRoute = Route::currentRouteName();
    $segments = explode('.', $currentRoute);

    $role = $segments[0] ?? null;
    $module = $segments[1] ?? null;
    $action = $segments[2] ?? null;

    return match ($action) {
        'register', 'edit', 'details', 'lessons', 'lessons.add' => route("$role.$module"),
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
    return $prefix . rand(
        $range1['min'],
        $range1['max']
    ) .
        rand(
            $range2['min'],
            $range2['max']
        );
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
function generateUniqueId(
    Model $model,
    string $prefix,
    array $range1,
    array $range2,
    string $field = 'id'
): string {
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

/**
 * Formata a data 
 * ex: 1/1/25 - 1/2/25 formatada para 1 mes depois
 * @param string $data ex: 01/01/01 01:01
 * @return string
 */
function humanTime($data)
{
    Carbon::setLocale('pt'); // Define o idioma
    return Carbon::parse($data)->diffForHumans();
}

/**
 * Obtem a duranção de um video
 * @param string $fullPath ex: /tmp/csxy32/video.mp4
 * @return string ex: "00:05:32"
 */
function getDurationVideo($fullPath)
{

    $ffprobe = FFProbe::create();
    $durationInSeconds = $ffprobe->format($fullPath)
        ->get('duration');

    $formatted = gmdate("H:i:s", $durationInSeconds);

    return $formatted;
}

function generateThumbnail($videoPath, $thumbnailPath)
{
    // Sanitiza nome do arquivo (sem espaços)
    $thumbnailPath = str_replace(' ', '_', $thumbnailPath);

    // Garante que o diretório exista
    $dir = dirname($thumbnailPath);
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }

    $ffmpeg = \FFMpeg\FFMpeg::create();
    $video = $ffmpeg->open($videoPath);

    // Salva frame no tempo 5s
    $video->frame(\FFMpeg\Coordinate\TimeCode::fromSeconds(5))
        ->save($thumbnailPath);
}

function givePermissionToUser(User $user)
{
    $roles = $user->roles;

    foreach ($roles as $role) {
        $permissions = User::getPermissions($role->name);

        foreach ($permissions as $permission) {
            if (!$user->hasPermissionTo($permission->name)) {
                $user->givePermissionTo($permission->name);
            }
        }
    }
}

