<?php

namespace App\Traits;

trait AlertMessageTrait{

    public function showAlertMessage($properties){
        $this->dispatch('swal-show-alert', $properties);
    }

    public function showSuccessAlertMessage($text = null)
    {
        $alertData = json_encode([
            'text' => $text,
            'icon' => 'success',
            'buttonsStyling' => false,
            'confirmButtonText' => 'Ok, got it!',
            'customClass' => [
                'confirmButton' => 'btn btn-primary'
            ]
        ]);

        $this->showAlertMessage($alertData);
    }


    public function showErrorAlertMessage($text = null){
        $alertData = json_encode([
            'text' => $text,
            'icon' => 'error',
            'buttonsStyling' => false,
            'confirmButtonText' => 'Ok, got it!',
            'customClass' => [
                'confirmButton' => 'btn btn-primary'
            ]
        ]);

        $this->showAlertMessage($alertData);
    }

    public function showWarningAlertMessage($text = null){
        $alertData = json_encode([
            'text' => $text,
            'icon' => 'warning',
            'buttonsStyling' => false,
            'confirmButtonText' => 'Ok, got it!',
            'customClass' => [
                'confirmButton' => 'btn btn-primary'
            ]
        ]);

        $this->showAlertMessage($alertData);
    }

}


?>
