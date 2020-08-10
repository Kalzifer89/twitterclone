<div class="bg-gray-200 rounded-lg py-4 px-6">
    <h3 class="font-bold text-xl mb-4">Following</h3>

    <ul>
@auth
        @forelse (auth()->user()->follows as $user)
            <li class="mb-4">
                <div class="flex items-center text-sm">
                  <a href="{{ route('profile', $user->username) }}">
                    <img
                        src="{{ $user->avatar }}"
                        alt=""
                        class="rounded-full mr-2"
                        height="40"
                        width="40"
                    >
                  </a>
                  <a href="{{ route('profile', $user->username) }}">
                    {{ $user->name }}
                  </a>
                </div>
            </li>
          @empty
            <li class=""> No friends yet!</li>
        @endforelse
@endauth
    </ul>
</div>
