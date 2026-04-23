<x-layout> 
    <x-slot:title>
        Edit Task
    </x-slot:title>

    <div>
        <h1>Edit Task</h1>

        <div>
            <div>
                <form method="POST" action="/tasks/{{ $task->id }}">
                    @csrf
                    @method('PUT')
                    <div>
                        <input type="text"
                            name="title"
                            placeholder="What's your next task?"
                            maxlength="100"
                            required
                            value="{{old('title', $task->title)}}">
                        @error('title')
                            <div>
                                <span>{{ $message }}</span>
                            </div>
                        @enderror                        

                        <textarea 
                            name="description"
                            rows="5"
                        >{{old('description', $task->description)}}</textarea>
                        @error('description')
                            <div>
                                <span>{{ $message }}</span>
                            </div>
                        @enderror                        

                        <input type="datetime-local"
                            name="due_date"
                            value="{{old('due_date', $task->due_date? $task->due_date->format('Y-m-d\TH:i') : '')}}">
                        @error('due_date')
                            <div>
                                <span>{{ $message }}</span>
                            </div>
                        @enderror

                    </div>

                    <div>
                        <button type="button" onclick="window.location='/'">
                            Cancel
                        </button>
                        <button type="submit">
                            Update Task
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>