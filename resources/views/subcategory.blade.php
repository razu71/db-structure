<ul>
    @foreach($subcategories as $subcategory)
        <li>{{ $subcategory->name }}</li>
        @includeWhen($subcategory->subcategories->count(), 'subcategory', ['subcategories' => $subcategory->subcategories])
    @endforeach
</ul>