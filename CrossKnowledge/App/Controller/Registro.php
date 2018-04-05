<?php

namespace CrossKnowledge\App\Controller;

/**
 * Description of Home
 *
 * @author moyses-oliveira
 */
class Registro extends AbstractController {

    public function index() {
        return $this->render(['Registro', 'index.php']);
    }

    public function datatable() {
        $model = new \CrossKnowledge\Data\Model\Registro();
        return $this->renderJson($model->load($_GET));
    }

    public function create() {
        return $this->form();
    }

    public function update() {
        $model = new \CrossKnowledge\Data\Model\Registro();
        $data = $model->getOne($GLOBALS['uriParts'][2]);
        return $this->form($data);
    }

    private function form($data = []) {
        echo $this->getHTML(['Registro', 'form.php'], compact('data'));
    }

    public function save() {
        $id = $GLOBALS['uriParts'][2] ?? null;
        $model = new \CrossKnowledge\Data\Model\Registro();
        $model->save($_POST, $id);
        $data = [];
        $errors = [];
        $success = true;
        return $this->renderJson(compact('success', 'errors', 'data'));
    }

    public function delete() {
        $id = $GLOBALS['uriParts'][2] ?? null;
        if (!$id)
            throw new \Exception('Registro não encontrado.');


        $model = new \CrossKnowledge\Data\Model\Registro();
        $model->delete($id);
        $data = [];
        $errors = [];
        $success = true;
        return $this->renderJson(compact('success', 'errors', 'data'));
    }

}
