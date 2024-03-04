<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicos;
use App\Models\Appointment;
use Carbon\Carbon;

class ServicoController extends Controller
{
    public function index()
    {
        $servicos = Servicos::all();
        return view('servicos.index', compact('servicos'));

    }

    public function agendar(Request $request)
    {
        // Validação dos dados recebidos
        $request->validate([
            'servico_id' => 'required|exists:servicos,id',
            'data' => 'required|date',
            'hora' => 'required',   
        ]);

        // Criação do agendamento
        $appointment = new Appointment();
        $appointment->servico_id = $request->servico_id;
        $appointment->user_id = auth()->user()->id;
        $appointment->data = $request->data;
        $appointment->hora = $request->hora;
        $appointment->save();
        // Redirecionamento com mensagem de sucesso
        return redirect()->back()->with('success', 'Agendamento realizado com sucesso!');
    }
}
