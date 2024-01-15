@if(count($obat) > 0)
@foreach($obat as $obat)
<li class="list-group-item">
    {{-- <a href="">{{ $obat->kodeProduk }} | {{ $obat->obat }}</a> --}}
    <a href="{{ url('penjualan/'.$obat->id)}}">{{ $obat->kodeProduk }} | {{ $obat->obat }}</a>
    {{-- <a href="{{ url('penjualan/'.$obat->kodeProduk)}}">{{ $obat->kodeProduk }} | {{ $obat->obat }}</a> --}}
</li>
@endforeach
@else
<li class="list-group-item">No Results Found</li>
@endif
