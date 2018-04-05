
<script type="application/json" id="app-data-table">
<?php
echo json_encode(
        [
            "dataUrl" => BASE_URL . "registro/datatable",
            "language" => "//cdn.datatables.net/plug-ins/1.10.13/i18n/Portuguese-Brasil.json",
            "sortDefault" => 1,
            "desc" => false,
            "columns" => [
                [
                    "mData" => "chrNome",
                    "bSortable" => true
                ],
                [
                    "mData" => "chrSobrenome",
                    "bSortable" => true
                ],
                [
                    "mData" => "chrCidade",
                    "bSortable" => true
                ],
                [
                    "mData" => "chrUF",
                    "bSortable" => true
                ],
                [
                    "width" => "110px",
                    "mData" => "id",
                    "bSortable" => false,
                    "actions" => [
                        [
                            "url" => BASE_URL . "registro/update/{id}",
                            "mode" => "link",
                            "title" => "Visualizar",
                            "icon" => "pencil",
                            "cls" => "btn-primary open_form",
                            "confirm" => null,
                            "activeParam" => null
                        ],
                        [
                            "url"=> BASE_URL . "registro/delete/{id}",
                            "mode"=> "confirm",
                            "title"=> "Remover",
                            "icon"=> "times",
                            "cls"=> "btn-danger confirm_delete",
                            "confirm"=> "Deseja excluir o registro &quot;{chrNome} {chrSobrenome}&quot;?",
                            "activeParam"=> null
                        ]
                    ]
                ]
            ],
            "buttons" => []
        ]
        , JSON_PRETTY_PRINT
);
?>
</script>
<div class="clearfix" style="margin: 20px auto;">
    <a href="<?php echo BASE_URL;?>registro/create" class="btn btn-primary new-register pull-right"><i class="fa fa-file-o"></i> &nbsp; Novo Registro</a>
</div>
<div class="form-group" app-config="#app-data-table" data-spell_data_table="1" style="background-color: #fff;padding: 30px;">
    <div class="navbar-header col-xs-12"></div>
    <div class="clearfix">&nbsp;</div>
    <table class="data table table-bordered table-hover" data-order="[[1, &quot;asc&quot; ]]">
        <thead>
            <tr class="stylegrids data-table-header">
                <th>Nome</th>
                <th>E-mail</th>
                <th>Cidade</th>
                <th>Estado</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>