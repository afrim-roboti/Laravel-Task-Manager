@extends('layouts.app')

@section('title', 'Edito Detyrën')

@section('content')
<div class="container">
    <h1 class="h3 mb-4">Edito Detyrën</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="title" class="form-label">Titulli</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $task->title) }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Përshkrimi</label>
            <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description', $task->description) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="priority" class="form-label">Prioriteti</label>
            <select class="form-control" id="priority" name="priority" required>
                <option value="1" {{ $task->priority == 1 ? 'selected' : '' }}>I Lartë</option>
                <option value="2" {{ $task->priority == 2 ? 'selected' : '' }}>I Mesëm</option>
                <option value="3" {{ $task->priority == 3 ? 'selected' : '' }}>I Ulët</option>
            </select>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="status" name="status" value="1" {{ $task->status ? 'checked' : '' }}>
            <label class="form-check-label" for="status">E Përfunduar</label>
        </div>

        <!-- Butonat e pozicionuar horizontalisht -->
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Përditëso Detyrën</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kthehu te Lista e Detyrave</a>
        </div>
    </form>
</div>
@endsection
