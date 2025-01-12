<?php

function getManagerGlobalModals()
{
    return [
//
//        [
//            'modal_id' => 'user_pay_invoice',
//            'livewire_component' => 'user.payment.pay-invoice',
//            'emit_show' => 'show-user-pay-invoice-modal',
//            'emit_hide' => 'hide-user-pay-invoice-modal',
//            'details' => [
//                'title' => ' ',
//                'modal_dialog_class' => 'mw-650px',
//            ]
//        ],

        [
            'modal_id' => 'show_manager_create_employee_program_modal',
            'livewire_component' => 'manager.program.details.form.create',
            'emit_show' => 'show-manager-add-employee-modal',
            'emit_hide' => 'hide-manager-add-employee-modal',
            'details' => [
                'title' => 'Add Employee',
                'modal_dialog_class' => 'mw-650px',
            ]
        ],

    ];
}
