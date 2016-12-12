<form id="advanced-management-layout" method="post">
    {{ csrf_field() }}
    <table class="table isotope">
        <thead>
            <tr>
                <th style="width: 80px">#</th>
                <th style="width: 180px">Card Name</th>
                <th class='collection'>Copies</th>
                <th class='collection'>Foil Copies</th>
                <th class='trade'>For Trade</th>
                <th class='trade'>Foil For Trade</th>
                <th class='wanted'>Wanted</th>
                <th class='wanted'>Foil Wanted</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cards as $card)
                <tr class="@if (isset($collected[$card->id])) {{ $collected[$card->id]->classes() }} @endif element-{{ $card->element }}">
                    <td>{{ $card->fullCardNumber() }}</td>
                    <td>{!! $card->hoveritem() !!}</td>
                    <td class='collection'>
                        <input name="card[{{ $card->id }}][count]" class="form-control input-sm" type="number" value="{{ $collected[$card->id]->count or 0 }}"/>
                    </td>
                    <td class='collection'>
                        <input name="card[{{ $card->id }}][foil_count]" class="form-control input-sm" type="number" value="{{ $collected[$card->id]->foil_count or 0 }}"/>
                    </td>
                    <td class='trade'>
                        <input name="card[{{ $card->id }}][trade_count]" class="form-control input-sm" type="number" value="{{ $collected[$card->id]->trade_count or 0 }}"/>
                    </td>
                    <td class='trade'>
                        <input name="card[{{ $card->id }}][foil_trade_count]" class="form-control input-sm" type="number" value="{{ $collected[$card->id]->foil_trade_count or 0 }}"/>
                    </td>
                    <td class='wanted'>
                        <input name="card[{{ $card->id }}][wanted]" class="form-control input-sm" type="number" value="{{ $collected[$card->id]->wanted or 0 }}"/>
                    </td>
                    <td class='wanted'>
                        <input name="card[{{ $card->id }}][foil_wanted]" class="form-control input-sm" type="number" value="{{ $collected[$card->id]->foil_wanted or 0 }}"/>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</form>