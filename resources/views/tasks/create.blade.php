@extends('layouts.app')

@section('title', 'Krijo Detyrë')

@section('content')
<div class="container">
    <h1 class="h3 mb-4">Krijo Detyrë të Re</h1>

    <div class="card p-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <input type="hidden" name="status" value="0"> <!-- Vlera e paracaktuar për statusin -->
        <div class="mb-3">
            <label for="title" class="form-label">Titulli</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Përshkrimi</label>
            <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
        </div>
        <div class="mb-3">
                <label for="priority" class="form-label">Prioriteti</label>
                <select class="form-control" id="priority" name="priority" required>
                    <option value="1">I Lartë</option>
                    <option value="2">Mesatar</option>
                    <option value="3">I Ulët</option>
                </select>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="status" name="status" value="1">
            <label class="form-check-label" for="status">E Përfunduar</label>
        </div>
        <button type="submit" class="btn btn-primary">Krijo Detyrën</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kthehu te Lista e Detyrave</a>
    </form>
    </div>
</div>
@endsection
