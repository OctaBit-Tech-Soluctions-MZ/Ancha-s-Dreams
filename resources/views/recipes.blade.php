@extends('layouts.app')

@section('title', 'Receitas Sofisticadas')

@section('content')

<x-masthead :subHeading="'Receitas que Inspiram Sabores'" :heading="'Explore, cozinhe e surpreenda no sabor!'"/>

<div class="container py-5">
  <h1 class="mb-5 text-center">Receitas Sofisticadas</h1>
  <x-filter :categories="$categories" :route="route('recipes')" :placeholder="'a receita'" :person="'Autor'"/>
  <!-- Sessão 1: Pratos Principais -->
  <div class="mb-5">
    <h2 class="text-center mb-4">Receitas Indepedentes</h2>
    <div class="row g-4">
      @foreach($recipes as $recipe)
        <div class="col-md-4">
          <div class="card">
              <img src="{{ asset('assets/img/recipes/'.$recipe->image_path) }}" class="card-img-top" alt="Curso 1">
            <div class="card-body">
              <h5 class="card-title">{{ $recipe->title }}</h5>
              <p class="card-text">Um clássico italiano com molho cremoso e toque de noz-moscada.</p>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>


@endsection
