<ul class="list-group list-group-flush">
    @foreach($categories as $cate)
        <li class="list-group-item">
            <div class="d-flex">
                <span>{{ $cate->name }}</span>
                <div class="actions mr-2">
                    <form action="{{ route('admin.categories.destroy', $cate->id) }}" id="cate-{{ $cate->id }}-delete" method="POST">
                        @csrf
                        @method('delete')
                    </form>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('cate-{{ $cate->id }}-delete').submit()" class="badge badge-danger">حذف</a>
                    <a href="{{ route('admin.categories.edit' , $cate->id) }}" class="badge badge-primary">ویرایش</a>
                    <a href="{{ route('admin.categories.create') }}?parent={{ $cate->id }}" class="badge badge-warning">ثبت زیر دسته</a>
                </div>
            </div>
            @if($cate->child->count())
                @include('admin.layouts.categories-group' , [ 'categories' => $cate->child])
            @endif
        </li>
    @endforeach
</ul>
