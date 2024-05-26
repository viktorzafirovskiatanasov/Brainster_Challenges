<x-app-layout>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 w-50">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg text-left">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('update_match', $match) }}" method="post">
                        @csrf
                        @method('PATCH')

                        <div class="mb-3">
                            <label for="team_1_id" class="form-label">Team 1</label>
                            <select class="form-control rounded-lg" id="team_1_id" name="team_1_id" required>
                                <option value="" disabled>Select Team 1</option>
                                @foreach ($teams as $team)
                                    <option value="{{ $team->id }}" {{ $team->id == $match->team1->id ? 'selected' : '' }}>{{ $team->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="team_2_id" class="form-label">Team 2</label>
                            <select class="form-control rounded-lg" id="team_2_id" name="team_2_id" required>
                                <option value="" disabled>Select Team 2</option>
                                @foreach ($teams as $team)
                                    <option value="{{ $team->id }}" {{ $team->id == $match->team2->id ? 'selected' : '' }}>{{ $team->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="result" class="form-label">Result</label>
                            <input type="text" class="form-control rounded-lg" id="result" name="result" value="{{ $match->result }}">
                        </div>

                        <div class="mb-3">
                            <label for="match_date" class="form-label">Match Date</label>
                            <input type="text" class="form-control rounded-lg" id="match_date" name="match_date" value="{{ $match->match_date }}" required>
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
