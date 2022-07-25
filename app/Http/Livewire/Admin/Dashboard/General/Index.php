<?php

namespace App\Http\Livewire\Admin\Dashboard\General;

use App\Models\BlogPost;
use App\Models\Comment;
use App\Models\EmailWeb;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Spatie\Activitylog\Models\Activity;

class Index extends Component
{
    public function render(){
        return view('livewire.admin.dashboard.general.index');
    }
    
}
