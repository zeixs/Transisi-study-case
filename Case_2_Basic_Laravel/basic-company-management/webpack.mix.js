
let mix = require('laravel-mix');

// mix.js('src/app.js', 'dist').setPublicPath('dist');
mix.copy('resources/js/', 'public/assets/js/custom/');

mix.combine([
    'node_modules/datatables.net/js/jquery.dataTables.min.js',
    'node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js',
    'node_modules/datatables.net-responsive/js/dataTables.responsive.min.js',
    'node_modules/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js',
    'node_modules/datatables.net-buttons/js/dataTables.buttons.min.js',
    'node_modules/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js',
    'node_modules/datatables.net-buttons/js/buttons.colVis.min.js',
    'node_modules/datatables.net-buttons/js/buttons.flash.min.js',
    'node_modules/datatables.net-buttons/js/buttons.html5.min.js',
    'node_modules/datatables.net-buttons/js/buttons.print.min.js',
    'node_modules/datatables.net-autofill/js/dataTables.autoFill.min.js',
    'node_modules/datatables.net-autofill-bs4/js/autoFill.bootstrap4.min.js',
    'node_modules/datatables.net-colreorder/js/dataTables.colReorder.min.js',
    'node_modules/datatables.net-colreorder-bs4/js/colReorder.bootstrap4.min.js',
    'node_modules/datatables.net-keytable/js/dataTables.keyTable.min.js',
    'node_modules/datatables.net-keytable-bs4/js/keyTable.bootstrap4.min.js',
    'node_modules/datatables.net-rowreorder/js/dataTables.rowReorder.min.js',
    'node_modules/datatables.net-rowreorder-bs4/js/rowReorder.bootstrap4.min.js',
    'node_modules/datatables.net-select/js/dataTables.select.min.js',
    'node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js',
    'public/vendor/datatables/buttons.server-side.js',
    'node_modules/pdfmake/build/pdfmake.min.js',
    'node_modules/pdfmake/build/vfs_fonts.js',
    // 'node_modules/jszip/dist/jszip.min.js',
], 'public/assets/js/custom/datatable-assets.js');
/* end custom resources */
// datatables
mix.copy('node_modules/datatables.net/js/', 'public/assets/plugins/datatables.net/js/');
mix.copy('node_modules/datatables.net-bs4/css/', 'public/assets/plugins/datatables.net-bs4/css/');
mix.copy('node_modules/datatables.net-bs4/js/', 'public/assets/plugins/datatables.net-bs4/js/');
mix.copy('node_modules/datatables.net-autofill/js/', 'public/assets/plugins/datatables.net-autoFill/js/');
mix.copy('node_modules/datatables.net-autofill-bs4/css/', 'public/assets/plugins/datatables.net-autofill-bs4/css/');
mix.copy('node_modules/datatables.net-autofill-bs4/js/', 'public/assets/plugins/datatables.net-autofill-bs4/js/');
mix.copy('node_modules/datatables.net-responsive/js/', 'public/assets/plugins/datatables.net-responsive/js/');
mix.copy('node_modules/datatables.net-responsive-bs4/css/', 'public/assets/plugins/datatables.net-responsive-bs4/css/');
mix.copy('node_modules/datatables.net-responsive-bs4/js/', 'public/assets/plugins/datatables.net-responsive-bs4/js/');
mix.copy('node_modules/datatables.net-buttons/js/', 'public/assets/plugins/datatables.net-buttons/js/');
mix.copy('node_modules/datatables.net-buttons-bs4/css/', 'public/assets/plugins/datatables.net-buttons-bs4/css/');
mix.copy('node_modules/datatables.net-buttons-bs4/js/', 'public/assets/plugins/datatables.net-buttons-bs4/js/');
mix.copy('node_modules/datatables.net-colreorder/js/', 'public/assets/plugins/datatables.net-colreorder/js/');
mix.copy('node_modules/datatables.net-colreorder-bs4/css/', 'public/assets/plugins/datatables.net-colreorder-bs4/css/');
mix.copy('node_modules/datatables.net-colreorder-bs4/js/', 'public/assets/plugins/datatables.net-colreorder-bs4/js/');
mix.copy('node_modules/datatables.net-fixedcolumns/js/', 'public/assets/plugins/datatables.net-fixedcolumns/js/');
mix.copy('node_modules/datatables.net-fixedcolumns-bs4/css/', 'public/assets/plugins/datatables.net-fixedcolumns-bs4/css/');
mix.copy('node_modules/datatables.net-fixedcolumns-bs4/js/', 'public/assets/plugins/datatables.net-fixedcolumns-bs4/js/');
mix.copy('node_modules/datatables.net-fixedheader/js/', 'public/assets/plugins/datatables.net-fixedheader/js/');
mix.copy('node_modules/datatables.net-fixedheader-bs4/css/', 'public/assets/plugins/datatables.net-fixedheader-bs4/css/');
mix.copy('node_modules/datatables.net-fixedheader-bs4/js/', 'public/assets/plugins/datatables.net-fixedheader-bs4/js/');
mix.copy('node_modules/datatables.net-keytable/js/', 'public/assets/plugins/datatables.net-keytable/js/');
mix.copy('node_modules/datatables.net-keytable-bs4/css/', 'public/assets/plugins/datatables.net-keytable-bs4/css/');
mix.copy('node_modules/datatables.net-keytable-bs4/js/', 'public/assets/plugins/datatables.net-keytable-bs4/js/');
mix.copy('node_modules/datatables.net-rowreorder/js/', 'public/assets/plugins/datatables.net-rowreorder/js/');
mix.copy('node_modules/datatables.net-rowreorder-bs4/css/', 'public/assets/plugins/datatables.net-rowreorder-bs4/css/');
mix.copy('node_modules/datatables.net-rowreorder-bs4/js/', 'public/assets/plugins/datatables.net-rowreorder-bs4/js/');
mix.copy('node_modules/datatables.net-scroller/js/', 'public/assets/plugins/datatables.net-scroller/js/');
mix.copy('node_modules/datatables.net-scroller-bs4/css/', 'public/assets/plugins/datatables.net-scroller-bs4/css/');
mix.copy('node_modules/datatables.net-scroller-bs4/js/', 'public/assets/plugins/datatables.net-scroller-bs4/js/');
mix.copy('node_modules/datatables.net-select/js/', 'public/assets/plugins/datatables.net-select/js/');
mix.copy('node_modules/datatables.net-select-bs4/css/', 'public/assets/plugins/datatables.net-select-bs4/css/');
mix.copy('node_modules/datatables.net-select-bs4/js/', 'public/assets/plugins/datatables.net-select-bs4/js/');
// mix.copy('node_modules/pdfmake/build/', 'public/assets/plugins/pdfmake/build/');
// mix.copy('node_modules/jszip/dist/', 'public/assets/plugins/jszip/dist/');

// sweetalert
mix.copy('node_modules/sweetalert/dist/', 'public/assets/plugins/sweetalert/dist/');

//parsley
mix.copy('node_modules/parsleyjs/', 'public/assets/plugins/parsleyjs/');

// select2
mix.copy('node_modules/select2/dist/', 'public/assets/plugins/select2/dist/');
mix.js('resources/js/select2.autofocus.fix.js', 'public/assets/js/custom/');