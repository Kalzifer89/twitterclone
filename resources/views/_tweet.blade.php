<div class="flex p-4 border-b border-b-gray-400">
    <div class="mr-2 flex-shrink-0">
      <a href="{{ route('profile', $tweet->user->name) }}">
        <img
          src="{{ $tweet->user->avatar }}"
          alt=""
          class="rounded-full mr-2"
          height="40"
          width="40"
        >
      </a>
    </div>

    <div>
      <a href="{{ route('profile', $tweet->user->username) }}">
        <h5 class="font-bold mb-2">{{ $tweet->user->name }}</h5>
      </a>
        <p class="text-sm">
            {{ $tweet->body }}
        </p>

        @include('_like-buttons')

    </div>
</div>
