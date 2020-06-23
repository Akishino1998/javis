<table style="width:100%;">
    @foreach($data->percakapan as $keys=>$values)
        @if($values->from==0)
        <tr>
            <td style="width:50%;">
                <div class="alert alert-success rounded">{{$values->pesan}}<br> <span style="font-size:9px">{{date('d M Y H:i',strtotime($values->date))}}</span></div>
            </td>
            <td style="width:50%;"></td>
        </tr>
        @else
        <tr>
            <td style="width:50%;"></td>
            <td class="text-right" style="width:50%;align"><div class="alert alert-success rounded">{{$values->pesan}}<br> <span style="font-size:9px">{{date('d M Y H:i',strtotime($values->date))}}</span></div></td>
        </tr>
        @endif
    @endforeach
</table>