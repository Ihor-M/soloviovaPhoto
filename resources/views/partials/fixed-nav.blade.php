<div class="fixed-nav">
    <div class="home-header">
        <h1 class="home-header"><a href="{{ asset('/') }}">Soloviova photography</a></h1>
    </div>
    <div class="dropdown-categories pull-right">
        <span class="dropdown-triger">Categories <span class="arrow-down"></span></span>
        <ul class="categories">
            @foreach($albumsInCategory as $category)
                <li><a href="{{ asset('photos/' . $category->name) }}">{{ $category->name }}</a></li>
            @endforeach
        </ul>
    </div>
</div>