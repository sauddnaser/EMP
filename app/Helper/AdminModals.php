<?php

function getAdminGlobalModals()
{
    return [
//
//        [
//            'modal_id' => 'user_pay_invoice',
//            'livewire_component' => 'user.payment.pay-invoice',
//            'emit_show' => 'show-user-pay-invoice-modal',
//            'emit_hide' => 'hide-user-pay-invoice-modal',
//            'details' => [
//                'title' => 'دفع الفواتير',
//                'modal_dialog_class' => 'mw-650px',
//            ]
//        ],
     [
            'modal_id' => 'create_department_modal',
            'livewire_component' => 'admin.department.form.create',
            'emit_show' => 'show-create-department-modal',
            'emit_hide' => 'hide-create-department-modal',
            'details' => [
                'title' => 'Add new department',
                'modal_dialog_class' => 'mw-650px',
            ]
        ],
        [
            'modal_id' => 'update_department_modal',
            'livewire_component' => 'admin.department.form.update',
            'emit_show' => 'show-update-department-modal',
            'emit_hide' => 'hide-update-department-modal',
            'details' => [
                'title' => 'Edit department',
                'modal_dialog_class' => 'mw-650px',
            ]
        ],
        [
            'modal_id' => 'create_manager_modal',
            'livewire_component' => 'admin.manager.form.create',
            'emit_show' => 'show-create-manager-modal',
            'emit_hide' => 'hide-create-manager-modal',
            'details' => [
                'title' => 'Add New manager',
                'modal_dialog_class' => 'mw-650px',
            ]
        ],
        [
            'modal_id' => 'update_manager_modal',
            'livewire_component' => 'admin.manager.form.update',
            'emit_show' => 'show-update-manager-modal',
            'emit_hide' => 'hide-update-manager-modal',
            'details' => [
                'title' => 'Edit manager',
                'modal_dialog_class' => 'mw-650px',
            ]
        ],

        [
            'modal_id' => 'create_program_modal',
            'livewire_component' => 'admin.program.form.create',
            'emit_show' => 'show-create-program-modal',
            'emit_hide' => 'hide-create-program-modal',
            'details' => [
                'title' => 'Add New program',
                'modal_dialog_class' => 'mw-650px',
            ]
        ],
        [
            'modal_id' => 'update_program_modal',
            'livewire_component' => 'admin.program.form.update',
            'emit_show' => 'show-update-program-modal',
            'emit_hide' => 'hide-update-program-modal',
            'details' => [
                'title' => 'Edit program',
                'modal_dialog_class' => 'mw-650px',
            ]
        ],

        [
            'modal_id' => 'create_employee_modal',
            'livewire_component' => 'admin.employee.form.create',
            'emit_show' => 'show-create-employee-modal',
            'emit_hide' => 'hide-create-employee-modal',
            'details' => [
                'title' => 'Add New Employee',
                'modal_dialog_class' => 'mw-650px',
            ]
        ],

    ];
}
