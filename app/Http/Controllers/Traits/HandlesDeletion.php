<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\ModelNotFoundException;

trait HandlesDeletion
{
    /**
     * Deleta um registro baseado no slug e redireciona conforme papel do utilizador(admin,instrutor).
     *
     * @param  string  $modelClass   - Classe do modelo (ex: Course::class)
     * @param  string  $slug         - Slug do item a deletar
     * @param  array   $routesByRole - ['admin' => 'admin.courses', 'instrutor' => 'profile.courses']
     * @param  string|null $permission - Nome da permissão opcional (ex: 'delete-course')
     * @param  string  $successMessage - Mensagem de sucesso
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteBySlugAndRedirect(
        string $modelClass,
        string $slug,
        array $routesByRole,
        ?string $permission = null,
        string $successMessage = 'Item excluído com sucesso!'
    ) {
        try {
            $item = $modelClass::where('slug', $slug)->firstOrFail();

            // Se for necessário, verifica permissão
            if ($permission && !Auth::user()->can($permission, $item)) {
                return redirect()->back()->with('error', 'Você não tem permissão para excluir este item.');
            }

            $item->delete();

            $userRole = Auth::user()->role ?? 'default';
            $redirectRoute = $routesByRole[$userRole] ?? 'home';

            return redirect()->route($redirectRoute)->with('success', $successMessage);
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Item não encontrado.');
        } catch (\Throwable $e) {
            Log::error("Erro ao excluir item: " . $e->getMessage());
            return redirect()->back()->with('error', 'Ocorreu um erro ao excluir o item.');
        }
    }
}
