<x-app-layout>
  

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-center ">
                    <form action="{{ route('update_team', $team) }}" method="post">
                        @csrf
                        @method('PATCH')

                        <div class="mb-3">
                            <label for="name" class="form-label">Team Name</label>
                            <input type="text" class="form-control rounded-lg" id="name" name="name" value="{{ $team->name }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="year_of_foundation" class="form-label">Year Founded</label>
                            <input type="text" class="form-control rounded-lg" id="year_founded" name="year_founded" value="{{ $team->year_founded }}" required>
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