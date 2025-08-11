<?php

namespace App\Livewire\GeneralSetting;

use App\Models\GeneralSetting;
use App\Services\Session;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Company extends Component
{
    public string $company_name = '';
    public string $company_address_line_1 = '';
    public string $company_address_line_2 = '';

    protected $rules = [
        'company_name' => 'required|min:3|max:255',
        'company_address_line_1' => 'required|min:3|max:255',
        'company_address_line_2' => 'required|min:3|max:255',
    ];

    public function mount()
    {
        $generalSettings = Cache::get('general_settings');
        $this->company_name = $generalSettings['company_name'];
        $this->company_address_line_1 = $generalSettings['company_address_line_1'];
        $this->company_address_line_2 = $generalSettings['company_address_line_2'];
    }

    public function submit()
    {
        $this->validate();

        DB::beginTransaction();
        try {
            GeneralSetting::where('key', 'company_name')->update([
                'value' => $this->company_name,
            ]);

            GeneralSetting::where('key', 'company_address_line_1')->update([
                'value' => $this->company_address_line_1,
            ]);

            GeneralSetting::where('key', 'company_address_line_2')->update([
                'value' => $this->company_address_line_2,
            ]);

            session()->flash('message', __('success_edit'));

            $this->dispatch('saved');

            Cache::forget('general_settings');

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            session()->flash('message', __('failed_edit'));
        }

    }

    public function render()
    {
        return view('livewire.general-setting.company');
    }
}
