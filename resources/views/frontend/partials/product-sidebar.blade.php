
<div class="list-group">
    @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id',NULL)->get() as $parent)
      
      <a href="#main-{{ $parent->id }}" class="list-group-item list-group-item-action" data-toggle="collapse">
        <img src="{{ asset('assets/images/categories/'.$parent->image) }}" width="20" height="20"> 
        {{ $parent->name }}
      </a>
      <div class="collapse" id="main-{{ $parent->id }}">
        <div class="childs-row">
          @foreach (App\Models\Category::orderBy('name','asc')->where('parent_id',$parent->id)->get() as $child)
          <a href="" class="list-group-item list-group-item-action">
            <img src="{{ asset('assets/images/categories/'.$child->image) }}" width="20" height="20"> 
            {{ $child->name }}
          </a>
          @endforeach
        </div>
      </div>
    @endforeach   
  </div>