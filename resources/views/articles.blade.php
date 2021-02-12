<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">


@include('Components.flash')


<table class="table">
    <thead>
    <tr>
        <th scope="col">#id</th>
        <th scope="col">title</th>
        <th scope="col">content</th>

        <th scope="col">description</th>
        <th scope="col">update</th>
        <th scope="col">delete</th>

    </tr>
    </thead>
    <tbody>

    <form action="{{route('create')}}" method="get">
        @csrf
        <button type="submit" class="btn btn-primary mb-2">Créer un nouvel article</button>
    </form>


    @foreach($articles as $article)
        <tr>
            <th scope="row">{{$article->id}}</th>
            <td>{{$article->title}}</td>
            <td>{{$article_>content}}</td>
            <td><a href="{{route('Edit', $article->id)}}">Update</a></td>
            <td>

                <form action="{{route('Delete', $article->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-primary mb-2">Delete</button>
                </form>
            </td>
        </tr>

    @endforeach

    </tbody>
</table>


