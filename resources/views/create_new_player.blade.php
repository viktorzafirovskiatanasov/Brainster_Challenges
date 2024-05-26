<x-app-layout>
    

    <div class="py-12">
        <div class="w-1/2 mx-auto sm:px-6 lg:px-8 w-50">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg text-center">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('store_player') }}" method="post">
                        @csrf
                        <div class="mb-3 text-left">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control rounded-lg" id="name" name="name" required>
                        </div>
                        <div class="mb-3 text-left">
                            <label for="surname" class="form-label">Surname</label>
                            <input type="text" class="form-control rounded-lg" id="surname" name="surname" required>
                        </div>
                        <div class="mb-3 text-left">
                            <label for="date" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control rounded-lg" id="date" name="date" required>
                        </div>
                        <div class="mb-3 text-left">
                            <label for="team_id" class="form-label">Team</label>
                            <select class="form-control rounded-lg" id="team_id" name="team_id">
                                <option value="" disabled selected>Select a Team</option>
                                @foreach($teams as $team)
                                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                                @endforeach
                            </select>
                        </div>
                       
                        <div class="w-100 text-left">
                            <button type="submit" class="btn bg-green-500 rounded-lg text-white px-4 py-2">Save</button>
                           </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
