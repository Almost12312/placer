<?php

namespace App\Services\Database\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserChanges
{
    static function changeInfo($data)
    {
        try {
            DB::beginTransaction();

            $user = Auth::user();

            $user->update([
                'name' => $data['name'],
                'middlename' => $data['middlename'],
                'lastname' => $data['lastname'],
                'city' => $data['city'],
            ]);

            $user->save();

            DB::commit();

            return response()->json([
                'success' => true
            ]);
        } catch (\Exception $exception) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'error' => $exception->getMessage()
            ]);
        }
    }
}
