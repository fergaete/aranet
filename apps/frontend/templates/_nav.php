<?php if ($sf_user->isAuthenticated() && $sf_user->hasCredential('member')) { ?>
<script>
var myMenu =
[
    [null,' <?php echo __('Dashboard') ?>','<?php echo url_for('@homepage');?>','_self',null],
    _cmSplit,
    [null,'<?php echo __('Companies') ?>',null,null,null,
        [null,'<?php echo __('Clients') ?>',null,null,null,
            ['<?php echo image_tag('icons/list.png');?>', '<?php echo __('View all clients') ?>','<?php echo url_for('/client/list');?>','_self',null],
            ['<?php echo image_tag('icons/create.png');?>','<?php echo __('Add new client') ?>','<?php echo url_for('/client/create');?>','_self',null]
        ],
        [null,'<?php echo __('Vendors') ?>',null,null,null,
            ['<?php echo image_tag('icons/list.png');?>', '<?php echo __('View all vendors') ?>','<?php echo url_for('/vendor/list');?>','_self',null],
            ['<?php echo image_tag('icons/create.png');?>','<?php echo __('Add new vendor') ?>','<?php echo url_for('/vendor/create');?>','_self',null]
        ],
        [null,'<?php echo __('Contacts') ?>',null,null,null,
            ['<?php echo image_tag('icons/list.png');?>', '<?php echo __('View all contacts') ?>','<?php echo url_for('/contact/list');?>','_self',null],
            ['<?php echo image_tag('icons/create.png');?>','<?php echo __('Add new contact') ?>','<?php echo url_for('/contact/create');?>','_self',null]
        ],
    ],
    _cmSplit,
    [null,'<?php echo __('Projects') ?>',null,null,null,
        [null,'<?php echo __('Projects') ?>',null,null,null,
            ['<?php echo image_tag('icons/list.png');?>','<?php echo __('View all projects') ?>','<?php echo url_for('/project/list');?>','_self',null],
            ['<?php echo image_tag('icons/create.png');?>','<?php echo __('Add new project') ?>','<?php echo url_for('/project/create');?>','_self',null]
        ],
        [null,'<?php echo __('Budgets') ?>',null,null,null,
            ['<?php echo image_tag('icons/list.png');?>','<?php echo __('View all budgets') ?>','<?php echo url_for('/budget/list');?>','_self',null],
            ['<?php echo image_tag('icons/create.png');?>','<?php echo __('Add new budget') ?>','<?php echo url_for('/budget/create');?>','_self',null]
        ],
        [null,'<?php echo __('Timesheets') ?>',null,null,null,
            ['<?php echo image_tag('icons/list.png');?>','<?php echo __('View all timesheets') ?>','<?php echo url_for('/timesheet/list');?>','_self',null],
            ['<?php echo image_tag('icons/create.png');?>','<?php echo __('Add new timesheet') ?>','<?php echo url_for('/timesheet/create');?>','_self',null],
            ['<?php echo image_tag('icons/report.png');?>','<?php echo __('Timesheet reports') ?>','<?php echo url_for('/timesheet/report');?>','_self',null]
        ],
    ],
    _cmSplit,
    [null,'<?php echo __('Finances') ?>',null,null,null,
        [null,'<?php echo __('Invoices') ?>',null,null,null,
            ['<?php echo image_tag('icons/invoice_list.png');?>','<?php echo __('View all invoices') ?>','<?php echo url_for('/invoice/list');?>','_self',null],
            ['<?php echo image_tag('icons/invoice_create.png');?>','<?php echo __('Add new invoice') ?>','<?php echo url_for('/invoice/create');?>','_self',null],
        ],
        [null,'<?php echo __('Expenses') ?>',null,null,null,
            ['<?php echo image_tag('icons/list.png');?>','<?php echo __('View all expenses') ?>','<?php echo url_for('/expense/list');?>','_self',null],
            ['<?php echo image_tag('icons/create.png');?>','<?php echo __('Add new expense') ?>','<?php echo url_for('/expense/create');?>','_self',null]
        ],
        [null,'<?php echo __('Incomings') ?>',null,null,null,
            ['<?php echo image_tag('icons/list.png');?>','<?php echo __('View all incomings') ?>','<?php echo url_for('/income/list');?>','_self',null],
            ['<?php echo image_tag('icons/create.png');?>','<?php echo __('Add new incoming') ?>','<?php echo url_for('/income/create');?>','_self',null]
        ],
        [null,'<?php echo __('Cash') ?>',null,null,null,
            ['<?php echo image_tag('icons/money_list.png');?>','<?php echo __('View all cash movements') ?>','<?php echo url_for('/cash/list');?>','_self',null],
            ['<?php echo image_tag('icons/money_create.png');?>','<?php echo __('Add new cash movement') ?>','<?php echo url_for('/cash/create');?>','_self',null]
        ],
        ['<?php echo image_tag('icons/report.png');?>','<?php echo __('Finance reports') ?>','<?php echo url_for('/finance/report');?>','_self',null],
    ],
    _cmSplit,
    [null,'<?php echo __('Members') ?>',null,null,null,
        ['<?php echo image_tag('icons/list.png');?>','<?php echo __('View all members') ?>','<?php echo url_for('/user/list');?>','_self',null],
        ['<?php echo image_tag('icons/create.png');?>','<?php echo __('Add new member') ?>','<?php echo url_for('/user/create');?>','_self',null]
    ],
    _cmSplit,
    [null,'<?php echo __('Files') ?>',null,null,null,
        ['<?php echo image_tag('icons/list.png');?>','<?php echo __('View all files') ?>','<?php echo url_for('/file/list');?>','_self',null],
    ],
<?php if ($sf_user->hasCredential('admin')) { ?>
    _cmSplit,
    [null,'<?php echo __('Administration') ?>',null,null,null,
        ['<?php echo image_tag('icons/list.png');?>','<?php echo __('Configuration') ?>','<?php echo url_for('/setting/list');?>','_self',null],
    ],
<?php } ?>
    _cmSplit,
    [null,' <?php echo __('Logout') ?>','<?php echo url_for('@sf_guard_signout');?>','_self',null]
];


</script>

<div id=myMenuID></div>

<script type="text/javascript"><!--
    cmDraw ('myMenuID', myMenu, 'hbr', cmThemeGray);
--></script>

<?php  } ?>
