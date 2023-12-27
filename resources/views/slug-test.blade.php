
halaman slug

@foreach ($student as $item)

<a href="{{route('student.slug',$item->slug)}}">{{$item->slug}}</a>
@endforeach
