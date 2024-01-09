<?php

namespace App\Http\Controllers;

use App\Http\Requests\Technician\StoreRequest;
use App\Http\Requests\Technician\UpdateRequest;
use App\Models\Technician;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class TechnicianController extends Controller
{
    public function index()
    {
        return Technician::orderBy("id", "desc")->paginate(request("per_page") ?? 10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data["password"] = Hash::make($data["password"]);
        $response = Technician::create($request->validated());

        try {
            if ($response) {
                return $this->response('Technician successfully created.', null, true);
            } else {
                return $this->response('Technician cannot created.', null, false);
            }
        } catch (\Throwable $th) {
            return $this->response('Technician cannot create.', null, false);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Technician  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Technician $Technician)
    {
        $data = $request->validated();

        if ($request->password) {
            $data["password"] = Hash::make($data["password"]);
        }
        $response = $Technician->update($data);

        try {
            if ($response) {
                return $this->response('Technician successfully updated.', null, true);
            } else {
                return $this->response('Technician cannot updated.', null, false);
            }
        } catch (\Throwable $th) {
            return $this->response('Technician cannot update.', null, false);
        }
    }

    public function destroy(Technician $Technician)
    {
        try {
            if ($Technician->delete()) {
                return $this->response('Technician successfully deleted.', null, true);
            } else {
                return $this->response('Technician cannot delete.', null, false);
            }
        } catch (\Throwable $th) {
            return $this->response('Technician cannot delete.', null, false);
        }
    }

    public function login(Request $request)
    {
        $user = Technician::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        return [
            'token' => $user->createToken('myApp')->plainTextToken,
            'user' => $user,
        ];
    }

    public function me()
    {
        return ['user' => Auth::guard("technician")->user()];
    }

    public function logout(Request $request)
    {
        Auth::guard('technician')->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out successfully']);
    }
}
