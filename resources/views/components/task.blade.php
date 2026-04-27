@props(['task'])

<div class="border rounded p-4 mb-4">
    <h2>{{ $task->title }}</h2>

    @if ($task->description)
        <p class="card">{{ $task->description }}</p>
    @endif

    <p>
        Status:
        {{ $task->status ? 'Completed' : 'Pending' }}
    </p>

    @if (is_null($task->due_date))
        <p>No due date</p>
    @elseif (!$task->status && $task->due_date->isPast())
        <p style="color: red;"><span class="badge rounded-pill text-bg-danger">Past due date</span> {{ $task->due_date }}</p>
        
    @else
        <p>Due date: {{ $task->due_date }}</p>
    @endif
    <div class="text-muted">
        <p class="mb-0">Created at: {{ $task->created_at }}</p>
        @if ($task->created_at != $task->updated_at)
        <p class="mb-0">Updated at: {{ $task->updated_at }}</p>
        @endif

        @if ($task->completed_at)
            <p class="mb-0">Completed at: {{ $task->completed_at }}</p>
        @endif
    </div>
    <div class="d-flex gap-2 mt-3">
        <form method="POST" action="/tasks/{{ $task->id }}/complete">
            @csrf
            @method('PATCH')
            <button type="submit" class="{{ $task->status ? 'btn btn-secondary' : 'btn btn-success' }}">
                {{ $task->status ? 'Mark as Pending' : 'Complete' }}
            </button>
        </form>    

        <form method="GET" action="/tasks/{{ $task->id }}/edit">
            <button type="submit"  class="btn btn-dark">Edit</button>
        </form>

        <form method="POST" action="/tasks/{{ $task->id }}">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Are you sure?')"  class="btn btn-danger">
                Delete
            </button>
        </form>
    </div>
</div>