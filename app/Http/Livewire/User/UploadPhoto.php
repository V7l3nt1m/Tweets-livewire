<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;
use Livewire\WithFileUploads;
 
class UploadPhoto extends Component
{

    use WithFileUploads;

    public $photo;

    public function render()
    {
        return view('livewire.user.upload-photo');
    }

    public function storagePhoto(){

        $this->validate([
            'photo' => 'required|image|mimes:png,jpg,jpeg,svg'
        ]);
        $user = auth()->user();

        $namefile = \Str::slug(auth()->user()->name) . '.' . $this->photo->extension();   

        if($path = $this->photo->storeAs('users', $namefile)){
            
            $user->update([
                'profile_photo_path' => $path
            ]);
        }
      
            return redirect()->route('tweets.index');
      
    }
}
