<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;
use Illuminate\Support\Facades\DB;

class UserService
{
    /**
     * Create a new UserService instance.
     */
    public function __construct(protected User $user) {
    }

    /**
     * Register a new user.
     *
     * @param  array<string, mixed>  $data
     * @return User
     *
     * @throws Exception
     */
    public function register(array $data): User
    {
        
        return DB::transaction(function () use ($data) {

                $user = User::create($data);



                $token = $user->createToken('auth_token')->plainTextToken;

                return [
                    'user'  => $user,
                    'token' => $token,
                ];

        });

    }

    /**
     * Authenticate a user and generate an API token.
     *
     * @param  array{email: string, password: string}  $data
     * @return array{user: User, token: string}
     *
     * @throws AuthenticationException
     */
    public function login(array $data): array
    {
        $user = User::where('email', $data['email'])->first();

        if (! $user || ! Hash::check($data['password'], $user->password)) {
            throw new AuthenticationException('Invalid credentials.');
        }

        // Revoke all existing tokens before issuing a new one
        $user->tokens()->delete();

        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'user'  => $user,
            'token' => $token,
        ];
    }

    /**
     * Revoke all tokens for the currently authenticated user.
     *
     * @param  User  $user
     * @return void
     */
    public function logout(User $user): void
    {
        $user->tokens()->delete();
    }

    /**
     * Retrieve a user by their ID.
     *
     * @param  int  $id
     * @return User
     *
     * @throws ModelNotFoundException
     */
    public function getUser(int $id): User
    {
        return User::findOrFail($id);
    }

    public function updateProfile(int $id, array $data): User
    {
        $user = User::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function changePassword(int $id, array $data): User
    {
        $user = User::findOrFail($id);
        $user->update($data);
        return $user;
    }

    /*
    public function disableUser(int $id): User
    {
        $user = User::findOrFail($id);
        $user->update(['status' => 'disabled']);
        return $user;
    }

    public function enableUser(int $id): User
    {
        $user = User::findOrFail($id);
        $user->update(['status' => 'enabled']);
        return $user;
    }*/

}