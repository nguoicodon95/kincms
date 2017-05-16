<?php

    return [
        'default' => [
            'admin' => [
                'js' => [
                    'underscore',
                    'jquery',
                    'bootstrap',
                    'fastclick',
                    'jquery-cookie',
                    'jquery-sortable',
                    'modernizr',
                    'bootstrap-hover-dropdown',
                    'jquery-slimscroll',
                    'jquery-blockui',
                    'jquery-notific8',
                    'bootstrap-confirmation',
                    'jquery-validate',
                    'bootstrap-tagsinput',
                ],
                'css' => [
                    'bootstrap',
                    // 'jquery-notific8',
                    // 'bootstrap-tagsinput',
                ],
                'fonts' => [
                    'open-sans',
                    'font-awesome',
                    'simple-line-icons',
                ]
            ],
            'front' => [
                'js' => [
                    'jquery',
                ],
                'css' => [
                    'bootstrap',
                ],
                'fonts' => [
                ]
            ],
        ],
        'resources' => [
            'js' => [
                /**
                * Jquery extensions
                */
                'jquery' => [
                    'src' => [
                        asset('admin/plugins/jquery.min.js')
                    ]
                ],
                'jquery-cookie' => [
                    'src' => [
                        asset('admin/plugins/js.cookie.min.js')
                    ]
                ],
                'jquery-slimscroll' => [
                    'src' => [
                        asset('admin/plugins/jquery-slimscroll/jquery.slimscroll.min.js')
                    ]
                ],
                'jquery-blockui' => [
                    'src' => [
                        asset('admin/plugins/jquery.blockui.min.js')
                    ]
                ],
                'jquery-validate' => [
                    'src' => [
                        asset('admin/plugins/jquery-validate/js/jquery.validate.min.js'),
                        asset('admin/plugins/jquery-validate/js/additional-methods.min.js')
                    ]
                ],
                'jquery-datatables' => [
                    'src' => [
                        asset('admin/plugins/datatables/datatables.min.js'),
                        asset('admin/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js'),
                        asset('admin/modules/datatables/datatable.js'),
                        asset('admin/modules/datatables/datatable.ajax.js'),
                    ]
                ],
                'jquery-sortable' => [
                    'src' => [
                        asset('admin/plugins/sortable/sortable.min.js'),
                        asset('admin/plugins/sortable/jquery.binding.js')
                    ]
                ],
                'jquery-nestable' => [
                    'src' => [
                        asset('admin/plugins/jquery-nestable/jquery.nestable.js')
                    ]
                ],
                'jquery-select2' => [
                    'src' => [
                        asset('admin/plugins/select2/js/select2.full.min.js')
                    ]
                ],
                'jquery-ui' => [
                    'src' => [
                        asset('admin/plugins/jquery-ui/jquery-ui.min.js'),
                        asset('admin/plugins/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')
                    ]
                ],
                'jquery-easing' => [
                    'src' => [
                        asset('admin/plugins/jquery.easing.js')
                    ]
                ],
                'jquery-notific8' => [
                    'src' => [
                        asset('admin/plugins/jquery-notific8/jquery.notific8.min.js'),
                    ]
                ],
                'jquery-ckeditor' => [
                    'src' => [
                        asset('admin/plugins/ckeditor/ckeditor.js'),
                        asset('admin/plugins/ckeditor/config.js'),
                        asset('admin/plugins/ckeditor/adapters/jquery.js')
                    ]
                ],
                'fastclick' => [
                    'src' => [
                        asset('admin/plugins/fastclick/fastclick.min.js')
                    ]
                ],
                /**
                * Bootstrap extensions
                */
                'bootstrap' => [
                    'src' => [
                        asset('admin/plugins/bootstrap/js/bootstrap.min.js')
                    ]
                ],
                'bootstrap-switch' => [
                    'src' => [
                        asset('admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js')
                    ]
                ],
                'bootstrap-confirmation' => [
                    'src' => [
                        asset('admin/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js')
                    ]
                ],
                'bootstrap-datepicker' => [
                    'src' => [
                        asset('admin/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')
                    ]
                ],
                'bootstrap-datetimepicker' => [
                    'src' => [
                        asset('admin/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')
                    ]
                ],
                'bootstrap-markdown' => [
                    'src' => [
                        asset('admin/plugins/bootstrap-markdown/js/bootstrap-markdown.js')
                    ]
                ],
                'bootstrap-tagsinput' => [
                    'src' => [
                        asset('admin/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js')
                    ]
                ],
                'bootstrap-modal' => [
                    'src' => [
                        asset('admin/plugins/bootstrap-modal/js/bootstrap-modalmanager.js'),
                        asset('admin/plugins/bootstrap-modal/js/bootstrap-modal.js')
                    ]
                ],
                'bootstrap-pwstrength' => [
                    'src' => [
                        asset('admin/plugins/bootstrap-pwstrength/pwstrength-bootstrap.min.js'),
                    ]
                ],
                'bootstrap-hover-dropdown' => [
                    'src' => [
                        asset('admin/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js'),
                    ]
                ],
                /**
                * Other javascript extensions
                */
                'respond' => [
                    'src' => [
                        asset('admin/plugins/respond.min.js'),
                    ]
                ],
                'excanvas' => [
                    'src' => [
                        asset('admin/plugins/excanvas.min.js'),
                    ]
                ],
                'modernizr' => [
                    'src' => [
                        asset('admin/plugins/modernizr.js'),
                    ]
                ],
                'underscore' => [
                    'src' => [
                        asset('admin/plugins/underscore/underscore-min.js'),
                    ]
                ],
                'morris' => [
                    'src' => [
                        asset('admin/plugins/morris/raphael-min.js'),
                        asset('admin/plugins/morris/morris.min.js'),
                    ]
                ],
                'jvectormap' => [
                    'src' => [
                        asset('admin/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js'),
                        asset('admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'),
                    ]
                ],
            ],
            'css' => [
                /**
                * Jquery extensions
                */
                'jquery-nestable' => [
                    'src' => [
                        asset('admin/plugins/jquery-nestable/jquery.nestable.css'),
                    ]
                ],
                'jquery-select2' => [
                    
                    'src' => [
                        asset('admin/plugins/select2/css/select2.min.css'),
                        asset('admin/plugins/select2/css/select2-bootstrap.min.css'),
                    ]
                ],
                'jquery-ui' => [
                    'src' => [
                        asset('admin/plugins/jquery-ui/jquery-ui.min.css'),
                    ]
                ],
                'jquery-notific8' => [
                    'src' => [
                        asset('admin/plugins/jquery-notific8/jquery.notific8.min.css'),
                    ]
                ],
                /**
                * Bootstrap extensions
                */
                'bootstrap' => [
                    'src' => [
                        asset('admin/plugins/bootstrap/css/bootstrap.min.css'),
                    ]
                ],
                'bootstrap-switch' => [
                    'src' => [
                        asset('admin/plugins/bootstrap-switch/css/bootstrap-switch.min.css'),
                    ]
                ],
                'bootstrap-datepicker' => [
                    'src' => [
                        asset('admin/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css'),
                    ]
                ],
                'bootstrap-datetimepicker' => [
                    'src' => [
                        asset('admin/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css'),
                    ]
                ],
                'bootstrap-markdown' => [
                    'src' => [
                        asset('admin/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css'),
                    ]
                ],
                'bootstrap-tagsinput' => [
                    'src' => [
                        asset('admin/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css'),
                    ]
                ],
                'bootstrap-modal' => [
                    'src' => [
                        asset('admin/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css'),
                        asset('admin/plugins/bootstrap-modal/css/bootstrap-modal.css'),
                    ]
                ],
                /**
                * Other extensions
                */
                'morris' => [
                    'src' => [
                        asset('admin/plugins/morris/morris.css'),
                    ]
                ],
                'jvectormap' => [
                    'src' => [
                        asset('admin/plugins/jvectormap/jquery-jvectormap-2.0.3.css'),
                    ]
                ],
            ],
            'fonts' => [
                'open-sans' => [
                    'src' => [
                        '//fonts.googleapis.com/css?family=Open+Sans:400,300,700&subset=latin,vietnamese',
                    ]
                ],
                'font-awesome' => [
                    'src' => [
                        asset('admin/plugins/font-awesome/css/font-awesome.min.css'),
                    ]
                ],
                'simple-line-icons' => [
                    'src' => [
                        asset('admin/plugins/simple-line-icons/simple-line-icons.min.css'),
                    ]
                ]
            ]
        ]
    ];