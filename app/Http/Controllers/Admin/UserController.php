<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\UdateProfileFormRequest;

class UserController extends Controller
{
    public function profile()
    {
        return view('site.profile.profile');
    }

    public function profileUpdate(UdateProfileFormRequest $request)
    {
        $user = auth()->user();

        $data = $request->all();

        if ($data['password'] != null)
            $data['password'] = bcrypt($data['password']);
        else
            unset($data['password']);

       $data['image'] = $user->image;
       if ($request->hasFile('image') && $request->file('image')->isValid()) {
            if ($user->image)
                $name = $user->image;
            else
                $name = $user->id.Str::kebab($user->name);

            $extension = $request->image->extension();
            $nameFile = "{$name}.{$extension}";

            $data['image'] = $nameFile;

            $upload = $request->image->storeAs('users', $nameFile);
            if (!$upload)
                return redirect()
                    ->back()
                    ->with('error', 'Falha ao Fazer Upload da imagem!');
       }
       $update = $user->update($data);

       if ($update)
            return redirect()
                ->route('profile')
                ->with('success', 'Sucesso ao Atualizar Dados');

        return redirect()
            ->back()
            ->with('error', 'Falha ao atualizar Perfil...');
    }
}
