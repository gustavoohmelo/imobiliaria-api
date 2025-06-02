<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Proprietario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProprietarioController extends Controller
{
    /**
     * Lista todos os proprietários
     */
    public function index()
    {
        $proprietarios = Proprietario::all();
        return response()->json($proprietarios);
    }

    /**
     * Armazena um novo proprietário
     */
    public function store(Request $request)
    {
    // Valida os dados de entrada
    $validatedData = $request->validate([
        'nome' => 'required|string|max:255',
        'email' => 'required|email|unique:proprietarios,email',
        'telefone' => 'required|string|max:20',
    ]);

    // Cria o novo proprietário com os dados validados
    $proprietario = Proprietario::create($validatedData);

    // Retorna o proprietário criado com status 201 (Created)
    return response()->json($proprietario, 201);

    // Se a validação falhar, retorna os erros
    if ($validator->fails()) {
        return response()->json($validator->errors(), 422);
    }

    }

    /**
     * Mostra um proprietário específico
     */
    public function show($id)
    {
        $proprietario = Proprietario::find($id);

        // Se não encontrar o proprietário, retorna 404
        if (!$proprietario) {
            return response()->json(['message' => 'Proprietário não encontrado'], 404);
        }

        return response()->json($proprietario);
    }

    /**
     * Atualiza um proprietário existente
     */
    public function update(Request $request, $id)
    {
        $proprietario = Proprietario::find($id);

        // Se não encontrar o proprietário, retorna 404
        if (!$proprietario) {
            return response()->json(['message' => 'Proprietário não encontrado'], 404);
        }

        // Valida os dados de entrada
        $validator = Validator::make($request->all(), [
            'nome' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:proprietarios,email,' . $proprietario->id,
            'telefone' => 'sometimes|string|max:20',
        ]);

        // Se a validação falhar, retorna os erros
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Atualiza o proprietário
        $proprietario->update($request->all());

        return response()->json($proprietario);
    }

    /**
     * Remove um proprietário
     */
    public function destroy($id)
    {
        $proprietario = Proprietario::find($id);

        // Se não encontrar o proprietário, retorna 404
        if (!$proprietario) {
            return response()->json(['message' => 'Proprietário não encontrado'], 404);
        }

        // Verifica se o proprietário tem imóveis vinculados
        if ($proprietario->imoveis()->count() > 0) {
            return response()->json(['message' => 'Este proprietário possui imóveis vinculados e não pode ser removido'], 422);
        }

        // Remove o proprietário
        $proprietario->delete();

        return response()->json(['message' => 'Proprietário removido com sucesso']);
    }
}