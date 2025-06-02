<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Imovel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ImovelController extends Controller
{
    /**
     * Lista todos os imóveis com possibilidade de filtros
     */
    public function index(Request $request)
    {
        $query = Imovel::query();

        // Filtro por cidade
        if ($request->has('cidade')) {
            $query->where('cidade', 'like', '%' . $request->cidade . '%');
        }

        // Filtro por valor mínimo
        if ($request->has('valor_min')) {
            $query->where('valor', '>=', $request->valor_min);
        }

        // Filtro por valor máximo
        if ($request->has('valor_max')) {
            $query->where('valor', '<=', $request->valor_max);
        }

        // Filtro por quartos
        if ($request->has('quartos')) {
            $query->where('quartos', '>=', $request->quartos);
        }

        // Filtro por banheiros
        if ($request->has('banheiros')) {
            $query->where('banheiros', '>=', $request->banheiros);
        }

        // Retorna os resultados paginados
        $imoveis = $query->with('proprietario')->paginate(10);

        return response()->json($imoveis);
    }

    /**
     * Armazena um novo imóvel
     */
    public function store(Request $request)
    {
    // Valida os dados de entrada
    $validatedData = $request->validate([
        'proprietario_id' => 'required|exists:proprietarios,id',
        'endereco' => 'required|string|max:255',
        'cidade' => 'required|string|max:100',
        'estado' => 'required|string|max:2',
        'valor' => 'required|numeric|min:0',
        'quartos' => 'required|integer|min:1',
        'banheiros' => 'required|integer|min:1',
        'descricao' => 'nullable|string',
    ]);

    // Cria o novo imóvel com os dados validados
    $imovel = Imovel::create($validatedData);

    // Retorna o imóvel criado com status 201 (Created)
    return response()->json($imovel, 201);

    // Se a validação falhar, retorna os erros
    if ($validator->fails()) {
        return response()->json($validator->errors(), 422);
    }

    }

    /**
     * Mostra um imóvel específico
     */
    public function show($id)
    {
        $imovel = Imovel::with('proprietario')->find($id);

        // Se não encontrar o imóvel, retorna 404
        if (!$imovel) {
            return response()->json(['message' => 'Imóvel não encontrado'], 404);
        }

        return response()->json($imovel);
    }

    /**
     * Atualiza um imóvel existente
     */
    public function update(Request $request, $id)
    {
        $imovel = Imovel::find($id);

        // Se não encontrar o imóvel, retorna 404
        if (!$imovel) {
            return response()->json(['message' => 'Imóvel não encontrado'], 404);
        }

        // Valida os dados de entrada
        $validator = Validator::make($request->all(), [
            'proprietario_id' => 'sometimes|exists:proprietarios,id',
            'endereco' => 'sometimes|string|max:255',
            'cidade' => 'sometimes|string|max:100',
            'estado' => 'sometimes|string|max:2',
            'valor' => 'sometimes|numeric|min:0',
            'quartos' => 'sometimes|integer|min:1',
            'banheiros' => 'sometimes|integer|min:1',
            'descricao' => 'nullable|string',
        ]);

        // Se a validação falhar, retorna os erros
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Atualiza o imóvel
        $imovel->update($request->all());

        return response()->json($imovel);
    }

    /**
     * Remove um imóvel
     */
    public function destroy($id)
    {
        $imovel = Imovel::find($id);

        // Se não encontrar o imóvel, retorna 404
        if (!$imovel) {
            return response()->json(['message' => 'Imóvel não encontrado'], 404);
        }

        // Remove o imóvel
        $imovel->delete();

        return response()->json(['message' => 'Imóvel removido com sucesso']);
    }
}