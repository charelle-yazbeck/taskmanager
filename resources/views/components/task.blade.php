@props(['task'])

<div class="border rounded p-4 mb-4">
    <h2>{{ $task->title }}</h2>

    @if ($task->description)
        <p>{{ $task->description }}</p>
    @endif

    <p>
        Status:
        {{ $task->status ? 'Completed' : 'Pending' }}
    </p>

    @if (is_null($task->due_date))
        <p>No due date</p>
    @elseif (!$task->status && $task->due_date->isPast())
        <p style="color: red;">Past due date: {{ $task->due_date }}</p>
    @else
        <p>Due date: {{ $task->due_date }}</p>
    @endif

    <p>Created at: {{ $task->created_at }}</p>
    @if ($task->created_at != $task->updated_at)
       <p>Updated at: {{ $task->updated_at }}</p>
    @endif

    @if ($task->completed_at)
        <p>Completed at: {{ $task->completed_at }}</p>
    @endif

    <div>
        <form method="POST" action="/tasks/{{ $task->id }}/complete">
            @csrf
            @method('PATCH')
            <button type="submit">
                {{ $task->status ? 'Mark as Pending' : 'Complete' }}
            </button>
        </form>    

        <form method="GET" action="/tasks/{{ $task->id }}/edit">
            <button type="submit">Edit</button>
        </form>

        <form method="POST" action="/tasks/{{ $task->id }}">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Are you sure?')">
                Delete
            </button>
        </form>
    </div>
</div>