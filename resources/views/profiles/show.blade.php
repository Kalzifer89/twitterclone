@extends('layouts.app')

@section('content')
  <header class="mb-6 relative">
        <img
            src="/images/default-profile-banner.jpg"
            alt=""
            class="mb-2"
        >

        <div class="flex justify-between items-center mb-4">
            <div>
                <h2 class="font-bold text-2xl mb-0">{{ $user->username }}</h2>
                <p class="text-sm">Joined {{ $user->created_at->diffForHumans() }}</p>
            </div>



              <div class="flex">

            @if (auth()->user()->is($user))

                  <a
                      href="/profiles/{{$user->username}}/edit"
                      class="rounded-full border border-gray-300 py-2 px-4 text-black text-xs mr-2"
                  >Edit Profile</a>

            @endif

            @if (auth()->user()->isNot($user))

                <form method="post" action="/profiles/{{$user->username}}/follows">
                  @csrf

                  <button type="submit"
                      class="bg-blue-500 rounded-full shadow py-2 px-4 text-white text-xs">
                  {{ auth()->user()->following($user) ? 'Unfollow Me' : 'Follow Me'}}
                </button>
              </form>
            @endif

            </div>
        </div>

        <p class="text-sm">
            The name’s Bugs. Bugs Bunny. Don’t wear it out. Bugs is an anthropomorphic gray
            and white rabbit or hare who is famous for his flippant, insouciant personality.
            He is also characterized by a Brooklyn accent, his portrayal as a trickster,
            and his catch phrase "Eh...What's up, doc?"
        </p>

        <img
            src="{{ $user->avatar }}"
            alt=""
            class="rounded-full mr-2 absolute"
            style="width: 150px; height: 150px; left: calc(50% - 75px); top: 138px"
        >
    </header>
  @include('timeline', [
    'tweets' => $tweets
  ])
@endsection
