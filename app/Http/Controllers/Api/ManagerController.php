<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Manager;
use App\Models\profile_managers;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Requests\StoreManagerRequest;
use App\Http\Requests\UpdateManagerRequest;
use App\Http\Requests\StoreProfileRequest;


class ManagerController extends Controller
{
    public function index()
    {
        // acessível a todos
        $manager = Manager::all();
        return response()->json($manager);
    }

    // acessível a todos
    public function storeManager(StoreManagerRequest $request)
    {

        $managerExist = Manager::where("email", $request->email)->first();

        if($managerExist)
        {
            return response()->json([
                "error" => "Manager ja registado"
            ], 400);
        }

        $validated = $request->validated();

        $manager = new Manager();

        $manager->nome = $request->nome;
        $manager->telefone = $request->telefone;
        $manager->email = $request->email;

        $manager->save();

        return response()->json([
            'message' => 'Manager criado com sucesso',
            'manager' => $manager
        ], 201);
    }

    // acessível a user
    public function updateManager(Request $request, string $id)
    {
        $manager = Manager::findOrFail($id);

        $validated = $request->validate([
            'email' => 'required|email|unique:managers,email,' . $manager->id,
            'telefone' => 'required|string|max:20',
        ], [
            'email.unique' => 'Este email já está a ser utilizado noutra conta. Por favor escolha outro.',
            'telefone.max' => 'O campo telefone aceita no máximo 20 caracteres.'
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

        $manager = Manager::with('profile_manager')->findOrFail($id);
        
        $profile = $manager->profile_managers ? [
            'nome' => $manager->profile_managers->nome,
            'descricao' => $manager->profile_managers->descricao,
            'morada' => $manager->profile_managers->morada,
            'iban' =>  $manager->profile_managers->iban,
            'iban' =>  $manager->profile_managers->iban,
            'salario' =>  $manager->profile_managers->salario
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
    public function storeProfile(StoreProfileRequest $request, $managerId)
    {
        $managerProfileExist = ProfileManager::where("email", $request->email)->first();

        if($managerProfileExist)
        {
            return response()->json([
                "error" => "Manager ja registado"
            ], 400);
        }

        $validated = $request->validated();

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
