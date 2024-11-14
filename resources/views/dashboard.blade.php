@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<style>
    /* Sfondi i Gradientit të Butë për një Pamje Profesionale */
    body {
        background: linear-gradient(135deg, #f0f2f5, #dfe4ea);
        font-family: 'Roboto', sans-serif;
        color: #2d3436;
    }

    /* Kartelat e Përmirësuara me Dizajn Minimalist */
    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
        color: #2d3436;
        transition: transform 0.3s;
        background-color: #ffffff;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .bg-completed {
        background-color: #27ae60;
        color: #ffffff;
    }

    .bg-pending {
        background-color: #f39c12;
        color: #ffffff;
    }

    .bg-total {
        background-color: #3498db;
        color: #ffffff;
    }

    /* Butoni i Përmirësuar për Menaxhimin e Detyrave */
    .btn-primary {
        background-color: #2980b9;
        border-color: #2980b9;
        border-radius: 10px;
        padding: 10px 25px;
        font-size: 1.1rem;
        font-weight: bold;
        color: #ffffff;
        transition: all 0.3s;
    }

    .btn-primary:hover {
        background-color: #1e6f9f;
    }

    /* Wrapper i Përmbajtjes për një Pamje të Sofistikuar */
    .content-wrapper {
        background-color: rgba(255, 255, 255, 0.8);
        border-radius: 15px;
        padding: 40px;
        margin-top: 30px;
    }

    /* Stili i Titullit dhe Paragrafit */
    h1.display-4 {
        font-weight: 700;
        font-size: 2.8rem;
        color: #2c3e50;
    }

    p.lead {
        font-size: 1.2rem;
        color: #34495e;
    }

</style>

<div class="container text-center my-5 content-wrapper">
    <h1 class="display-4">Mirësevini në Todo-App!</h1>
    <p class="lead">Menaxhoni detyrat tuaja në mënyrë efektive dhe përmirësoni produktivitetin tuaj.</p>
    <hr class="my-4" style="border-color: rgba(0, 0, 0, 0.1);">
    <p>Këtu mund të krijoni, modifikoni dhe monitoroni progresin e detyrave tuaja.</p>

    <a href="{{ route('tasks.index') }}" class="btn btn-primary my-3">
        <i class="fas fa-tasks"></i> Menaxho Detyrat
    </a>

    <div class="row text-center mt-5">
        <div class="col-md-4">
            <div class="card bg-completed text-white mb-3">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-check-circle"></i> Detyrat e Përfunduara</h5>
                    <p class="display-4">{{ $completedTasksCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-pending text-white mb-3">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-exclamation-circle"></i> Detyrat e Papërfunduara</h5>
                    <p class="display-4">{{ $pendingTasksCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-total text-white mb-3">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-list-ul"></i> Total Detyra</h5>
                    <p class="display-4">{{ $totalTasksCount }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
