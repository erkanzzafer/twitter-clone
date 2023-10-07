<div class="card">
    <div class="px-3 pt-4 pb-2">
        <form enctype="multipart/form-data" action="{{ route('idea.users.update',$user->id) }}" method="post">
            @csrf
            @method('put')
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                        src="{{ $user->getImageURL() }}" alt="Mario Avatar">
                    <div>
                       <input type="text" name="name" value="{{ $user->name }}" class="form-control"><br>
                        <span class="fs-6 text-muted">{{ $user->email }}</span>
                    </div>
                </div>
                <div>
                    @auth
                        @if (auth()->id() === $user->id)
                            <a href="{{ route('idea.users.show', $user->id) }}">Göster</a>
                        @endif
                    @endauth
                </div>
            </div>
            <div class="mt-4">
                <label for="">Profil Fotoğrafı</label>
                <input name="image" class="form-control" type="file">
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="px-2 mt-4">
                <h5 class="fs-5"> Bio : </h5>
                <div class="mb-3">
                    <textarea name="bio" id="" rows="3" class="form-control">{{ $user->bio }}</textarea>
                    @error('bio')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary btn-sm"> Güncelle </button>
                </div>
                <div class="d-flex justify-content-start">
                    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                        </span> 120 Followers </a>
                    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                        </span> ({{ count($user->comments) }}) Comments </a>
                    <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                        </span> ({{ count($user->ideas) }}) Twit </a>
                </div>
            </div>
        </form>
    </div>
</div>
