<div>
    <div class="container" id="tweet-title">
        <h1>Actualiar Foto de Perfil</h1>
    </div>
    

    <div class="container shadow-lg p-3 mb-4 bg-body-tertiary rounded" id="form-container">

        <form method="POST" enctype="multipart/form-data" wire:submit.prevent="storagePhoto">
            @csrf
            @if($photo)
            <div>
                <img src="{{ $photo->temporaryUrl() }}" alt="preview">
            </div>
            @endif
            <br>
            <input type="file" id="photo" wire:model="photo" onchange="previewFile()">
            @error('photo')
            {{ $message }}
            @enderror
            <br>
            <br>
            <button type="submit" class="btn btn-info" id="btn">Upload Photo</button>
        </form>
    </div>

    
</div>
