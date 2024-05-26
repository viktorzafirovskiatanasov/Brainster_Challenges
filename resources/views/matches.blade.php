<!-- all-matches.blade.php -->
<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div style="background-color: rgba(164, 164, 164, 0.627)">
                    <h3 class="px-6 py-3" style="font-size: 20px">Matches</h3>
                </div>
                <div class="p-6 bg-white">
                    @if (auth()->check() &&
                            auth()->user()->isAdmin())
                        <div class="text-right pb-4">
                            <a href="{{ route('create_match') }}" class="bg-blue-500 text-white rounded-lg px-4 py-3">
                                {{ __('Create Match') }}
                            </a>
                        </div>
                    @endif
                    <table class="min-w-full table-auto mt-4">
                        <thead>
                            <tr style="border-bottom: 1px solid grey; border-top: 1px solid grey;">
                                <th class="px-4 py-2">Team 1</th>
                                <th class="px-4 py-2">Team 2</th>
                                <th class="px-4 py-2">Result</th>
                                @if (auth()->check() &&
                                        auth()->user()->isAdmin())
                                    <th class="px-4 py-2 ">Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($matches as $match)
                                <tr>
                                    <td class="border px-4 py-2">{{ $match->team1->name }}</td>
                                    <td class="border px-4 py-2">{{ $match->team2->name }}</td>
                                    <td class="border px-4 py-2">{{ $match->result }}</td>
                                    @if (auth()->check() &&
                                            auth()->user()->isAdmin())
                                        <td class="border px-4 py-2">
                                            <a style="color:skyblue" href="{{ route('edit_match', $match) }}">
                                                {{ __('Edit') }}
                                            </a>
                                            <a style="color:skyblue" href="{{ route('delete_match', $match) }}"
                                                onclick="event.preventDefault(); document.getElementById('delete-match-form-{{ $match->id }}').submit();">
                                                {{ __('Delete') }}
                                            </a>
                                            <form id="delete-match-form-{{ $match->id }}"
                                                action="{{ route('delete_match', $match) }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
