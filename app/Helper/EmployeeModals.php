<?php

function getEmployeeGlobalModals()
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
            'modal_id' => 'show_employee_update_status_task_modal',
            'livewire_component' => 'employee.program.details.form.update-task',
            'emit_show' => 'show-employee-edit-status-task-modal',
            'emit_hide' => 'hide-employee-edit-status-task-modal',
            'details' => [
                'title' => 'Edit Task',
                'modal_dialog_class' => 'mw-650px',
            ]
        ],

    ];
}
