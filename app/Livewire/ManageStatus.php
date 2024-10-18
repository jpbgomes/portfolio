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
        // Execute the command and get the output
        $cpuTemp = shell_exec("vcgencmd measure_temp");

        // Check if the command executed successfully
        if ($cpuTemp === null) {
            session()->flash('error', "Error retrieving temperature.");
        }

        // Parse the output to extract the temperature
        preg_match("/temp=([\d\.]+)'C/", $cpuTemp, $matches);

        // Check if the match was successful
        if (isset($matches[1])) {
            session()->flash('error', $matches[1]);
        }

        session()->flash('error', "Unable to parse temperature.");
    }

    public function render()
    {
        return view('livewire.manage-status');
    }
}
