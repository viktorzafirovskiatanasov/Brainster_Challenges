<!-- all-matches.blade.php -->
<x-app-layout>
  

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div style="background-color: rgba(164, 164, 164, 0.627)">
                    <h3 class="px-6 py-3" style="font-size: 20px">Players</h3>
                </div>
                <div class="p-6 bg-white">
                    <div class="text-right pb-4">
                        <a  href="{{ route('create_player') }}" class="bg-blue-500 text-white rounded-lg px-4 py-3">
                            {{ __('Create Player') }}
                        </a>
                    </div>
                    <table class="min-w-full table-auto mt-4">
                        <thead>
                            <tr style="border-bottom: 1px solid grey; border-top: 1px solid grey;">
                                <th class="px-4 py-2">Team Name</th>
                                <th class="px-4 py-2">Year Of Foundation</th>
                                <th class="px-4 py-2">Date Of Birth</th>
                                <th class="px-4 py-2">Team</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($players as $player)
                                <tr>
                                    <td class="border px-4 py-2">{{ $player->team->name }}</td>
                                    <td class="border px-4 py-2">{{ $player->surname }}</td>
                                    <td class="border px-4 py-2">{{ $player->date_of_birth }}</td>
                                    <td class="border px-4 py-2">{{ $player->team->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
