@if(count($users) > 0)
 <ul class="list-unstyled">
     @foreach($users as $user)
      <li class="media">
       
@if($user->image == null)
  <img class="mr-2 rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="" style="max-height:50px">
@else
  <img class="mr-2 rounded" src="/storage/{{ $user->image}}" alt="" style="max-height:50px">
@endif
       
       
          
          <div class="media-body">
              <div>
                  {{ $user->name }}
              </div>
              <div>
                  <p>{!! link_to_route('users.show', 'プロフィールを見る', ['id' => $user->id]) !!}</p>
              </div>
          </div>
      </li>
    @endforeach
 </ul>
 {{ $users->links('pagination::bootstrap-4') }}
@endif