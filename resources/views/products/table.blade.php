@if (auth()->user()->role == 'admin')
    @foreach ($products as $product)
        <tr class="">
            <td><input type="checkbox" name="" id=""></td>
            <td>{{ $product->id }}</td>
            <td>{{ $product->title }}</td>
            <td>{{ $product->prix }}</td>
            <td>{{ $product->Qte }}</td>
            <td>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-success">show</a>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
    @endforeach
@else
    @foreach ($products as $product)
        <tr class="">
            <td>{{ $product->id }}</td>
            <td>{{ $product->title }}</td>
            <td>{{ $product->ImgPath }}</td>
            <td>{{ $product->Description }}</td>
            <td>{{ $product->prix }}</td>
            <td>{{ $product->Qte }}</td>
        </tr>
    @endforeach
@endif
