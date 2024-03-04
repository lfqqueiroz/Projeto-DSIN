<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::all();
        return view('appointments.index', compact('appointments'));
    }

    // Implementação do método create para criar novos agendamentos
    public function create()
    {
        $servicos = Servico::all();
        return view('appointments.create', compact('servicos'));
    }

    // Implementação do método store para armazenar novos agendamentos
    public function store(Request $request)
    {
        // Validação dos dados do formulário
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
        return redirect()->route('appointments.index')->with('success', 'Agendamento realizado com sucesso!');
    
    }
    // Implementação do método show para exibir um agendamento específico 
    public function show(Appointment $appointment)
    {
        return view('appointments.show', ['appointment' => $appointment]);
    }

    public function consultar()
    {
        // Buscar os agendamentos do usuário atualmente logado
        $agendamentos = Appointment::where('user_id', auth()->id())->with('servico')->get();

        // Retornar a view com os agendamentos
        return view('appointments.all', compact('agendamentos'));
    }

    // Implementação do método edit para editar um agendamento
    public function edit(Appointment $appointment)
    {
        return view('appointments.edit', compact('appointment'));
    }
    // Implementação do método update para atualizar um agendamento
    public function update(Request $request, $id)
    {
        // Validação dos dados do formulário
        $request->validate([
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
        ]);

        // Recuperar o agendamento com base no ID
        $appointment = Appointment::findOrFail($id);

        // Atualizar os campos relevantes com base nos dados do formulário
        $appointment->data = $request->input('date');
        $appointment->hora = $request->input('time');

        // Salvar as mudanças no banco de dados
        $appointment->save();

        // Redirecionar de volta para a página de visualização de agendamentos
        return redirect()->route('consultar-agendamentos')->with('success', 'Agendamento atualizado com sucesso.');
    }
    // Implementação do método destroy para excluir um agendamento
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        // Redirecionamento com mensagem de sucesso
        return redirect()->route('consultar-agendamentos')->with('success', 'Agendamento excluído com sucesso!');
     
    }
}

