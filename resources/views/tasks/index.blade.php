@extends('layouts.app')

@section('title', 'Lista e Detyrave')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">Lista e Detyrave</h1>
     <!-- Butoni për kthim në Dashboard -->
     <a href="{{ route('dashboard') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Kthehu te Dashboardi
    </a>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary">+ Shto Detyrë</a>
</div>

<div class="card p-4">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>Titulli</th>
                <th>Statusi</th>
                <th>Prioriteti</th>
                <th>Veprime</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
            <tr>
                <td>{{ $task->title }}</td>
                <td>
                    <span class="badge {{ $task->status ? 'bg-success' : 'bg-warning' }}">
                        {{ $task->status ? 'E Përfunduar' : 'E Papërfunduar' }}
                    </span>
                </td>
                <td>
                    <span class="badge {{ $task->priority == 1 ? 'bg-danger' : ($task->priority == 2 ? 'bg-primary' : 'bg-secondary') }}">
                        {{ $task->priority == 1 ? 'I Lartë' : ($task->priority == 2 ? 'Mesatar' : 'I Ulët') }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info btn-sm">👁️ Shiko</a>
                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">✏️ Edito</a>
                    <button class="btn btn-danger btn-sm" data-id="{{ $task->id }}" onclick="confirmDelete(this)">🗑️ Fshij</button>
                    <form id="delete-form-{{ $task->id }}" action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    function confirmDelete(button) {
        const taskId = button.getAttribute('data-id'); // Merr ID-në nga data-id
        
        Swal.fire({
            title: 'A jeni i sigurt?',
            text: "Ky veprim nuk mund të kthehet pas!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Po, fshije!',
            cancelButtonText: 'Anulo'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + taskId).submit();
            }
        });
    }
</script>
@endsection
