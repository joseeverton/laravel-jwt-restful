<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserService.
 */
class UserService
{
    public function index()
    {
        try {
            $data = User::all();
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), $e->getCode());
        }
    }

    public function store($request)
    {
        try {
            $input = $request->all();
            $input['password'] = Hash::make($input['password']);
            $data = User::create($input);
            return response()->json($data, 201);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), $e->getCode());
        }
    }

    public function show($id)
    {
        try {
            $data = User::find($id);
            if (!$data) {
                throw new \Exception("Data not found", 404);
            }
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), $e->getCode());
        }
    }

    public function update($request, $id)
    {
        try {
            $input = $request->all();
            $input['password'] = Hash::make($input['password']);
            $data = User::find($id);
            $data->update($input);
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), $e->getCode());
        }
    }

    public function destroy($id)
    {
        try {
            $data = User::find($id);
            if (!$data) {
                throw new \Exception("Data not found", 404);
            }
            $data->delete();
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), $e->getCode());
        }
    }
}