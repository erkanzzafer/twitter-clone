@guest
<h4> Bir şeyler Yazmak için Giriş Yapın</h4>
@endguest
@auth
<h4> Bir şeyler Yaz</h4>
<div class="row">
    <form action="{{ route('idea.create') }}" method="post">
        @csrf
        <div class="mb-3">
            <textarea name="content" class="form-control" id="content" rows="3"></textarea>
            @error('content')
            <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="">
            <button type="submit" class="btn btn-dark"> Paylaş </button>
        </div>
    </form>
</div>
@endauth
