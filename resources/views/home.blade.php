<x-layout> 
    <x-slot:title>
        Home Feed
    </x-slot:title>

    <div>
        <h1>My Tasks</h1>

        <!-- Task Form -->
        <div>
            <div>
                <form method="POST" action="/tasks">
                    @csrf
                    <div>
                        <input type="text"
                            name="title"
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
                            class="textarea textarea-bordered w-full resize-none"
                            rows="5"
                        >{{old('description')}}</textarea>
                        @error('description')
                            <div>
                                <span>{{ $message }}</span>
                            </div>
                        @enderror                        

                        <input type="datetime-local"
                            name="due_date"
                            value="{{old('due_date')}}">
                        @error('due_date')
                            <div>
                                <span>{{ $message }}</span>
                            </div>
                        @enderror

                    </div>

                    <div>
                        <button type="submit">
                            Create Task
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Feed -->
        <div>
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
</x-layout>