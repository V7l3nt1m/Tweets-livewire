<div>
    <div class="row">
        <div class="col-md-2"></div>

            <div class="col-md-9">
                <div class="container" id="tweet-title">
                    <h1>Tweets</h1>
                </div>
                <div class="container">
                    <div id="form-container" class="shadow-lg p-3 mb-4 bg-body-tertiary rounded">
                        <h3>Tweet</h3>
                        <br>
                        <div class="row">
                            <form method="POST" wire:submit.prevent='create'>
                                <fieldset>
                                    @csrf
                                    <textarea type="text" rows="3" name="content" id="content" class="form-control" wire:model="content" placeholder="Faça um Tweet"></textarea>
                                    @error('content'){{ $message }}@enderror
                                    <br>
                                    <input type="submit" class="btn btn-info" value="Criar Tweet" id="btn">
                                </fieldset>
                            </form>
                        </div>
                    </div>

                        @foreach ($tweets as $tweet)
                        <div id="tweet-container" class="shadow-lg p-3 mb-4 bg-body-tertiary rounded">
                          <div class="row">
                         <div class="row">
                             <div class="col-md-1">
                                 @if ($tweet->user->profile_photo_path)
                                                         <img src="{{ url("storage/{$tweet->user->profile_photo_path}") }}" alt="{{ $tweet->user->name }}" class="rounded-full h-8 w-8">
                                                         @else
                                                         <img src="{{ url('imgs/no-imagem.jpg') }}" alt="{{ $tweet->user->name }}"  class="rounded-full h-8 w-8">
                                                         @endif
                             </div>
                             <div class="col-md-11">{{ $tweet->user->name }} <br> <textarea name="" id="" cols="10" rows="3" class="form-control" disabled>{{ $tweet->content }}</textarea></div>
                         </div>
                         <div class="row">
                            <div>
                                @if($tweet->user->id != auth()->user()->id)
                             @if($tweet->likes->count())
                             <a href="#" wire:click.prevent="deslike({{ $tweet->id }})" class="btn btn-danger botoes">Deslike</a>
                             @else
                             <a href="#" wire:click.prevent="like({{ $tweet->id }})" class="btn btn-success botoes">Like</a>
                             @endif
                             @else
                             <a href="#" class="btn btn-info botoes">Meu Tweet</a>
                             @endif
                            </div>
                        </div>

                         
                          </div>
                        </div>
                        @endforeach
                        <div>
                            {{ $tweets->links() }}
                        </div>

                </div>
            </div>
                <div class="col-md-2"></div>
    </div>

</div>
