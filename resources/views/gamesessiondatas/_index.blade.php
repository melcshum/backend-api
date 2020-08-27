{{--
<ul class="list-group list-group-flush">
    @foreach ($interactions as $interaction)
        <div class="list-group-item">
            <div>
                {{ $interaction->name }}
                {{ $interaction->action_name }}

                {{ $interaction->object_name }} at {{ $interaction->created_at }}
                <div>
                    <strong> Definition :</strong>{{ $interaction->definition_name }}
                </div>
            </div>
            <div>
                <strong>Result </strong>
                @foreach ($interaction->result_extensions as $extension)
                    <span> {{ $extension->name . ':' . $extension->value }} </span>
                @endforeach
            </div>
        </div>
    @endforeach

</ul> --}}
<div class="m-4">
    <table class="table table-bordered  table-striped table-responsive m-2">
        <caption> {{ $caption }} </caption>
        <thead>
            <tr>
                @if ($show_player)
                <td>Player</td>
                @endif
                <td>Action</td>

                <td>Card </td>
                {{-- <td>Object</td> --}}
                <td>At </td>
                <td>Result </td>

                <td>Player Rating</td>
                <td>Scenario Rating</td>
                <td>Time Taken</td>
                <td>Select </td>
                <td>Drag </td>
                <td>Attempt </td>

            </tr>
        </thead>

        @foreach ($interactions as $interaction)
            <tr class="{{ $interaction->result_highlight }}" >
                @if ($show_player)
                <td>{{ $interaction->actor_name }}</td>
                @endif
                <td>{{ $interaction->action_name }}</td>
                <td><a href="{{ $interaction->definition_name }}">{{ $interaction->definition_name }}</a></td>
                {{-- <td>{{ $interaction->object_name }}</td> --}}
                <td>{{ $interaction->created_at }} </td>
                <td>{{ $interaction->result_name }} </td>
                <td>{{ $interaction->interaction_object->player_difficulty->rating }}  </td>
                <td>{{ $interaction->interaction_object->scenario_difficulty->rating }}  </td>

                <td>{{ $interaction->time_taken }} </td>
                <td>{{ $interaction->select }}</td>
                <td>{{ $interaction->drag }}</td>
                <td>{{ $interaction->Attempt }}</td>

            </tr>
        @endforeach
    </table>
</div>
