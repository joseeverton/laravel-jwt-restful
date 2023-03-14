<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\UserCreateRequest;
use App\Http\Requests\Users\UserUpdateRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

/**
 * @OA\Server(url="http://localhost:8000/api"),
 * @OA\Info(title="Laravel Road", version="0.0.1"),
 */
class UsersController extends Controller
{
    private $user;

    public function __construct(UserService $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     */

    /**
     * @OA\Get(
     *      path="/users",
     *      operationId="getUsersList",
     *      tags={"User"},
     *      summary="Obter lista de usuário",
     *      description="Retornar lista de usuários",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function index()
    {
        return $this->user->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserCreateRequest $request)
    {
        return $this->user->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->user->show($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, $id)
    {
        return $this->user->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return $this->user->destroy($id);
    }
}