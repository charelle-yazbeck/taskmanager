<x-layout> 
    <x-slot:title>
        Edit Task
    </x-slot:title>

    <div class="d-flex justify-content-center mt-5">
        <div class="card p-4 shadow w-100" style="max-width: 500px;">
            
            <h1 class="text-center mb-4">Edit Task</h1>

            <form method="POST" action="/tasks/{{ $task->id }}" class="row g-3">
                @csrf
                @method('PUT')

                <!-- Title -->
                <div class="col-12">
                    <label class="form-label">Title</label>
                    <input type="text"
                        name="title"
                        class="form-control"
                        placeholder="What's your next task?"
                        maxlength="100"
                        required
                        value="{{ old('title', $task->title) }}">

                    @error('title')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Description -->
                <div class="col-12">
                    <label class="form-label">Description</label>
                    <textarea 
                        name="description"
                        class="form-control"
                        rows="4"
                    >{{ old('description', $task->description) }}</textarea>

                    @error('description')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Due Date -->
                <div class="col-12">
                    <label class="form-label">Due Date</label>
                    <input type="datetime-local"
                        name="due_date"
                        class="form-control"
                        value="{{ old('due_date', $task->due_date ? $task->due_date->format('Y-m-d\TH:i') : '') }}">

                    @error('due_date')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Buttons -->
                <div class="d-flex justify-content-between mt-3">
                    <button type="button" onclick="window.location='/'" class="btn btn-outline-secondary">
                        Cancel
                    </button>

                    <button type="submit" class="btn btn-primary">
                        Update Task
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-layout>