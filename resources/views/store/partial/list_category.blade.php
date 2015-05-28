@forelse($categories as $category)
<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title"><a href="{{ route('store.category' , ['id' => $category->id , 'name' => str_replace(' ','-',$category->name)]) }}">{{ $category->name }}</a></h4>
    </div>
</div>
@empty
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title"><a>NO CATEGORY AVAILABLE</a></h4>
        </div>
    </div>
@endforelse