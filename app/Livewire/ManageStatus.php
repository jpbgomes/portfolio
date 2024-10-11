<?php

namespace App\Livewire;

use Livewire\Component;

class ManageStatus extends Component
{
    public $cpuTemp;

    public function mount()
    {
        $this->cpuTemp = $this->getCpuTemp();
    }

    public function getCpuTemp()
    {
        $cpuTemp = shell_exec("vcgencmd measure_temp");
        return $cpuTemp;
    }

    public function render()
    {
        return view('livewire.manage-status');
    }
}
