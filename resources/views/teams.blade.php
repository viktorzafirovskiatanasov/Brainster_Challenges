<!-- all-matches.blade.php -->
<x-app-layout>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div style="background-color: rgba(164, 164, 164, 0.627)">
                    <h3 class="px-6 py-3" style="font-size: 20px">Teams</h3>
                </div>
                <div class="p-6 bg-white">
                    <div class="text-right pb-4">
                        <a href="{{ route('create_team') }}" class="bg-blue-500 text-white rounded-lg px-4 py-3">
                            {{ __('Create Team') }}
                        </a>
                    </div>
                    <table class="min-w-full table-auto mt-4">
                        <thead>
                            <tr style="border-bottom: 1px solid grey; border-top: 1px solid grey;">
                                <th class="px-4 py-2">Team Name</th>
                                <th class="px-4 py-2">Year Of Foundation</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teams as $team)
                                <tr style="border-bottom: 1px solid grey;">
                                    <td class="border px-4 py-2">{{ $team->name }}</td>
                                    <td class="border px-4 py-2">{{ $team->year_founded }}</td>
                                    <td class="border px-4 py-2">
                                        <a style="color:skyblue" href="{{ route('edit_team', $team) }}">
                                            {{ __('Edit') }}
                                        </a>
                                        <a style="color:skyblue" href="{{ route('delete_team', $team) }}"
                                            onclick="event.preventDefault(); document.getElementById('delete-team-form-{{ $team->id }}').submit();">
                                            {{ __('Delete') }}
                                        </a>
                                        <form id="delete-team-form-{{ $team->id }}"
                                            action="{{ route('delete_team', $team) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
