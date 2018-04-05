<?php

namespace CrossKnowledge\App\Controller;

/**
 * Description of AbstractController
 *
 * @author moyses-oliveira
 */
abstract class AbstractController {

    /**
     *
     * @var array 
     */
    private $layout = [];

    public function __construct() {
        $this->layout = ['Template', 'index.php'];
    }
    
    protected function setLayout(array $layout) {
        $this->layout = $layout;
    }

    protected function render(array $view, array $data = [], int $code  = 200) {
        http_response_code($code);
        header('Content-type: text/html; charset=utf-8');
        $GLOBALS['view'] = ['container' => $this->getHTML($view, $data)];
        echo $this->getHTML($this->layout, $data);
    }

    protected function getHTML(array $view, array $data = []) {
        $file = implode(DIRECTORY_SEPARATOR, array_merge([VIEW_DIRECTORY], $view));
        ob_start();
        extract($data);
        if(!file_exists($file))
            throw new \Exception('File  "'  . $file . '" not found');
        
        require $file;
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
    
    protected function renderJson(array $data, int $code  = 200) {
        http_response_code($code);
        header('Cache-Control: no-cache, must-revalidate');
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($data);
    }

}
