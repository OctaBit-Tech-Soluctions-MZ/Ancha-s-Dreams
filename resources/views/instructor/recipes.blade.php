@extends('layouts.instructor')

@section('title', 'Lista de Receitas')

@section('content')

<x-modern-table :title="'Lista de sei la oque'">
    <x-slot:header>
        <tr>
            <th>Teste</th>
            <th>teste</th>
            <th>teste</th>
        </tr>
    </x-slot:header>
    <tr>
        <td>sss</td>
        <td>ff</td>
        <td>gg</td>
    </tr>
</x-modern-table>

@endsection