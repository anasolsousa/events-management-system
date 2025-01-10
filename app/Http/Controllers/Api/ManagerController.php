<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Manager;
use App\Models\profile_manager;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;


class ManagerController extends Controller
{
    public function index()
    {
        // acessível a todos
        $manager = Manager::all();
        return response()->json($manager);
    }

    // acessível a todos
    public function storeManager(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'telefone' => 'required|string|max:20',
            'email' => 'required|email|unique:managers,email'
        ], [
            'telefone.max' => 'O campo telefone aceita no máximo 20 caracteres.',
            'nome.max' => 'O campo nome aceita no máximo 255 caracteres.',
            'email.unique' => 'Este email já está a ser utilizado noutra conta. Por favor escolha outro.',
        ]);

        $manager = Manager::create($validated);

        return response()->json([
            'message' => 'Manager criado com sucesso',
            'manager' => $manager
        ], 201);
    }

    // acessível a user
    public function update(Request $request, string $id)
    {
        $manager = Manager::findOrFail($id);

        $validated = $request->validate([
            'email' => 'required|email|unique:managers,email,' . $manager->id,
            'telefone' => 'required|string|max:20',
        ], [
            'email.unique' => 'Este email já está a ser utilizado noutra conta. Por favor escolha outro.',
            'telefone.max' => 'O campo telefone aceita no máximo 20 caracteres.',
        ]);

        $manager->update($validated);

        return response()->json([
            'message' => 'Manager atualizado com sucesso',
            'manager' => $manager
        ]);
    }

    // acessível a user
    public function showProfile($id)
    {
        $user = JWTAuth::parseToken()->authenticate();

        $manager = Manager::with('profile_manager')->findOrFail($id);
        
        $profile = $manager->profile_manager ? [
            'nome' => $manager->profile_manager->nome,
            'descricao' => $manager->profile_manager->descricao,
            'morada' => $manager->profile_manager->morada,
            'iban' =>  $manager->profile_manager->iban,
            'iban' =>  $manager->profile_manager->iban,
            'salario' =>  $manager->profile_manager->salario
        ] : null;

        return response()->json([
            'manager' => [
                'id' => $manager->id,
                'nome' => $manager->nome,
                'email' => $manager->email,
                'telefone' => $manager->telefone,
                'profile' => $profile
            ]
        ]);
    }

    // acessível a user
    public function storeProfile(Request $request, $managerId)
    {
        $user = JWTAuth::parseToken()->authenticate();

        // verifica se o manager existe
        $manager = Manager::findOrFail($managerId);

        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string|max:255',
            'morada' => 'required|string|max:255',
            'nif' => 'required|string|max:255',  
            'iban' => 'required|string|max:255',
            'salario' => 'required|string|max:255'
        ], [
            'descricao.max' => 'A descrição não pode exceder 255 caracteres.',
            'nome.max' => 'O campo nome tem no máximo 255 caracteres.',
            'nif.max' => 'O campo NIF não pode exceder 255 caracteres.',  
        ]);

        // Verifica se o manager já possui um perfil
        if ($manager->profile_manager) {
            return response()->json([
                'error' => 'Este manager já tem perfil.'
            ], 400);
        }
     
        $validated['manager_id'] = $managerId;
     
        $profile = profile_manager::create($validated);

        return response()->json([
            'message' => 'Perfil criado com sucesso',
            'profile' => $profile
        ], 201);
    }
}
