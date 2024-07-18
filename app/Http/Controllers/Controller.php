<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
class ExemploController extends Controller
{
    public function exibirFormulario()
    {
        return view('exemplo');
    }

    public function processarFormulario(Request $request)
    {
        if ($request->input('terms')) {
            return 'O botão foi clicado após a seleção do checkbox.';
        } else {
            return 'O botão foi clicado sem selecionar o checkbox.';
        }
    }
}





