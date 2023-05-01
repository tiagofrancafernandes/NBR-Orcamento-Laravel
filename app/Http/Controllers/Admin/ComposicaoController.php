<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Composicao;
use Illuminate\Contracts\Support\Renderable;

class ComposicaoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): Renderable
    {
        $query = Composicao::query();

        return view(
            'admin.composicoes.index',
            [
                'composicoes' => $query->latest('id')->paginate(20),
            ]
        );
    }
}
