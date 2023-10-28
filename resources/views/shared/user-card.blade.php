<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:150px" class="me-3 avatar-sm rounded-circle" src="{{ $user->getImageURL() }}"
                    alt="Mario Avatar">
                <div>
                    <h3 class="card-title mb-0"><a href="#"> {{ $user->name }}
                        </a></h3>
                    <span class="fs-6 text-muted">{{ $user->email }}</span>
                </div>
            </div>
            <div>
                @auth
                    {{-- @if (auth()->id() === $user->id) --}}
                    @can('update', $user)
                        <a href="{{ route('idea.users.edit', $user->id) }}">Düzenle</a>
                    @endcan
                @endauth
            </div>
        </div>
        <div class="px-2 mt-4">
            <h5 class="fs-5"> Bio : </h5>
            <p class="fs-6 fw-light">
                {{ $user->bio }}
            </p>
            <div class="d-flex justify-content-start">
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                    </span> {{ $user->followers()->count() }} </a>
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                    </span> ({{ count($user->comments) }}) Comments </a>
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-comment me-1">
                    </span> ({{ count($user->ideas) }}) Twit </a>
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-heart me-1">
                    </span> ({{ $user->likes()->count() }}) Beğeni </a>
            </div>


            @auth

                {{--  @if (auth()->id() !== $user->id) --}}
                @if (Auth::user()->isNot($user))
                    <div class="mt-3">
                        @if (auth()->user()->follows($user))
                            <form action="{{ route('user.unfollow', $user->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm"> Takibi Bırak </button>
                            </form>
                        @else
                            <form action="{{ route('user.follow', $user->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm"> Takip Et </button>
                            </form>
                        @endif
                    </div>
                @endif
            @endauth
        </div>
    </div>
</div>
