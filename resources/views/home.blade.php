<x-layout> 
    <x-slot:title>
        Home Feed
    </x-slot:title>

    <div>
        <h1>My Tasks</h1>

        <!-- Task Form -->
        <div class="d-flex justify-content-center mt-4">
            <div class="card p-4 shadow mb-4 row" position="center" style="width: 40rem;">
                <div>
                    <form method="POST" action="/tasks" class="row g-3">
                        @csrf
                        <div class="mb-3 row">
                            <input type="text"
                                name="title"
                                class="form-control"
                                placeholder="What's your next task?"
                                maxlength="100"
                                required
                                value="{{old('title')}}">
                            @error('title')
                                <div>
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror                        

                            <textarea 
                                name="description"
                                class="form-control"
                                rows="5"
                            >{{old('description')}}</textarea>
                            @error('description')
                                <div>
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror                        

                            <input type="datetime-local"
                                name="due_date"
                                class="form-control"
                                value="{{old('due_date')}}">
                            @error('due_date')
                                <div>
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror

                        </div>

                        <div>
                            <button type="submit" class="btn btn-outline-primary">
                                Create Task
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @php
            $filter = request('filter', 'all');
        @endphp

        <!-- Feed -->
        <div class="d-flex justify-content-center mt-4">
            <div class="card p-4 shadow" style="width: 60rem;">
                <span><a href="{{ route('tasks.index') }}" class="btn {{ $filter === 'all' ? 'btn-primary' : 'btn-outline-primary' }}">All</a>
                <a href="{{ route('tasks.index', ['filter' => 'pending']) }}" class="btn {{ $filter === 'pending' ? 'btn-primary' : 'btn-outline-primary' }}">Pending</a>
                <a href="{{ route('tasks.index', ['filter' => 'completed']) }}" class="btn {{ $filter === 'completed' ? 'btn-primary' : 'btn-outline-primary' }}">Completed</a>
                
                @forelse ($tasks as $task)
                    <x-task :task="$task" />
                @empty
                    <div>
                        <div>
                            <div>
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                </svg>
                                <p>No tasks yet. Add your first task!</p>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-layout>