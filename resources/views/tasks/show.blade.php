@extends('layouts.app')

@section('title', 'Detajet e Detyrës')

@section('content')
<div class="container">
    <h1 class="h3 mb-4">Detajet e Detyrës</h1>

    <div class="card p-4">
        <h5 class="card-title mb-3">Titulli: {{ $task->title }}</h5>
        
        <p class="card-text"><strong>Përshkrimi:</strong> {{ $task->description }}</p>
        
        <p class="card-text"><strong>Statusi:</strong> 
            <span class="badge {{ $task->status ? 'bg-success' : 'bg-warning' }}">
                {{ $task->status ? 'E Përfunduar' : 'E Papërfunduar' }}
            </span>
        </p>

        <p class="card-text"><strong>Prioriteti:</strong> 
            <span class="badge {{ $task->priority == 1 ? 'bg-danger' : ($task->priority == 2 ? 'bg-primary' : 'bg-secondary') }}">
                {{ $task->priority == 1 ? 'I Lartë' : ($task->priority == 2 ? 'Mesatar' : 'I Ulët') }}
            </span>
        </p>

        <p class="card-text">
            <small class="text-muted">Krijuar më: {{ $task->created_at->format('d-m-Y H:i') }}</small>
        </p>

        <p class="card-text">
            <small class="text-muted">Përditësuar më: {{ $task->updated_at->format('d-m-Y H:i') }}</small>
        </p>
    </div>

    <a href="{{ route('tasks.index') }}" class="btn btn-secondary mt-3"><i class="fas fa-arrow-left"></i>Kthehu te Lista e Detyrave</a>
    
</div>
@endsection

