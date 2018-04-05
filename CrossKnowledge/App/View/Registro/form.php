<?php

$fnMakeTextField = function($label, $name, $maxlength, $value, $isRequired, $class = 'col-xs-12', $attr = []) {
    
    $fieldClass = 'form-control';
    $attr = array_merge(compact('name', 'maxlength', 'value'), $attr);
    $attr['class'] = $fieldClass;
    if($isRequired)
        $attr['required'] = 'true';
    
    $cfg = array();
    foreach ($attr as $k => $v):
        $escapeAttr = htmlspecialchars($v, ENT_COMPAT);
        $cfg[] = "$k=\"$escapeAttr\"";
    endforeach;

    $attributes = ' ' . implode(' ', $cfg);
    $labelRequired = $isRequired ? ' class="required" ' : '';
    return <<<HTML
<div class="$class form-group">
    <label for="input-text-$name"$labelRequired>$label</label>
    <input $attributes />
    <div class="form-error-message"></div>
</div>
HTML;
};

$action = BASE_URL . 'registro/save' . (isset($data['id']) ? '/' . $data['id'] : '');
echo '<form name="register" action="' . $action .  '" class="panel clearfix theme-form" method="post" enctype="multipart/form-data">';

echo $fnMakeTextField('Nome', 'chrNome', 255, $data['chrNome'] ?? null, true, 'col-xs-12');

echo $fnMakeTextField('Sobrenome', 'chrSobrenome', 255, $data['chrSobrenome'] ?? null, true, 'col-xs-12');

$attr = [
    'data-inputmask'=>'"mask": "99.999-999"',
    'data-mask'=>"data-mask",
    'data-cep'=>"1"
];
echo $fnMakeTextField('CEP', 'chrCEP', 10, $data['chrCEP'] ?? null, true, 'col-xs-4', $attr);
echo '<div class="clearfix"></div>';

echo $fnMakeTextField('UF', 'chrUF', 2, $data['chrUF'] ?? null, true, 'col-xs-3', ['data-minlength'=>2]);

echo $fnMakeTextField('Cidade', 'chrCidade', 64, $data['chrCidade'] ?? null, true, 'col-xs-9');

echo $fnMakeTextField('Bairro', 'chrBairro', 64, $data['chrBairro'] ?? null, true, 'col-xs-12');

echo $fnMakeTextField('Logradouro', 'chrLogradouro', 128, $data['chrLogradouro'] ?? null, true, 'col-xs-12');

echo $fnMakeTextField('Numero', 'chrNumero', 128, $data['chrNumero'] ?? null, true, 'col-xs-9');

echo $fnMakeTextField('Complemento', 'chrComplemento', 128, $data['chrComplemento'] ?? null, false, 'col-xs-3');

echo '<div class="clearfix"></div>';
echo '<button name="submit" value="" type="submit" id="button-submit-submit" class="btn btn-primary pull-right"><i class="fa fa-floppy-o"></i>&nbsp; Salvar</button>';
echo '</form>';
echo '<div class="clearfix"></div>';

?>
<script type="text/javascript">
    $.spell.Validator('form[name=register]');
    $('[name=chrCEP]').getAddress();
    $('[data-mask]').each(function () {
        $(this).inputmask();
    });
    $('form[name=register]').data('datatable', $('[data-spell_data_table]').data('$.spell.DataTable')).data('bootbox', true);
</script>