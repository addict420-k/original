<div class="card mb-5">
    <div class="card-header">
        <h3 class="card-title">{{ $user->name }}</h3>
    </div>
    <div class="card-body text-center">
        
            @if($user->image == null)
              <img class="mr-2 rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="" style="max-height:50px">
            @else
              <img  style="max-height:150px" class="rounded img-fluid" src="{{ $user->image }}" alt="">
            @endif
        
        
        
    </div>
</div>