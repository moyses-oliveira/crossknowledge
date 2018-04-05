<?php

namespace CrossKnowledge\App\Controller;

/**
 * Description of Error
 *
 * @author moyses-oliveira
 */
class Error  extends AbstractController {
    
    public function code404() {
        return $this->render(['Error', '404.php']);
    }
}
