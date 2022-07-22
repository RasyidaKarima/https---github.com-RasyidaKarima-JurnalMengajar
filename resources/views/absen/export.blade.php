<table>
    <tbody>
        @foreach ($datas as $key => $item)
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{$item['nama']}}</td>
            <td>{{$item['jabatan']}}</td>
            <td>{{$item['status']}}</td>
            <td>{{$item['kondisi']}}</td>
            <td>
                <img src="{{asset('images/absen/'.$item['foto'])}}" alt="" srcset="">
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
