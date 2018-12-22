<a href="{{route('category.show',$category->id)}}" class="btn btn-simple btn-info btn-icon like"><i
            class="material-icons">info</i></a>
<a href="{{route('category.edit',$category->id)}}" class="btn btn-simple btn-warning btn-icon edit"><i
            class="material-icons">edit</i></a>

<form action="{{ route('category.destroy', [$category->id]) }}" method="post" class="form-horizontal"
      style="display: inline-block;">
    {!! csrf_field() !!}
    {!! method_field('DELETE') !!}

    <button class="btn btn-simple btn-danger btn-icon remove"><i class="fa fa-trash"></i></button>
</form>