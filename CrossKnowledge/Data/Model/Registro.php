<?php

namespace CrossKnowledge\Data\Model;

/**
 * Description of User
 *
 * @author moyses-oliveira
 */
class Registro extends AbstractMySQL {

    public function load(array $request):array {
        $dttb = $this->dataTableRequest($request);
        $results = [];
        $results['data'] = $this->getAll($dttb['start'], $dttb['limit'], $dttb['order'], $dttb['dir'], $dttb['search']);
        $total = $this->getTotal($dttb['search']);
        $results['recordsFiltered'] = $total;
        $results['recordsTotal'] = $total;
        return $results;
    }
    
    
    private function getAll(int $start, int $limit, int $orderColumn, string $dir, string $search):array {
        $sqlContent = file_get_contents(implode(DIRECTORY_SEPARATOR, [SQL_DIRECTORY, 'Registro', 'load.sql']));
        $orderCollection = ['t.chrNome', 't.chrSobrenome', 't.chrCidade', 't.chrUF'];
        $order = $orderCollection[$orderColumn];
        $sql = str_replace(['{order}', '{dir}', '{start}', '{limit}'], [$order, $dir, $start, $limit], $sqlContent);
        $pdo = $this->getPdo();
        $query = $pdo->prepare($sql);
        
        for($i=1;$i<4;$i++)
            $query->bindValue('filter'.$i, "%$search%");
        
        $query->execute();
        return $query->fetchAll();
    }
    
    
    private function getTotal(string $search):int {
        $sql = file_get_contents(implode(DIRECTORY_SEPARATOR, [SQL_DIRECTORY, 'Registro', 'load-total.sql']));
        $pdo = $this->getPdo();
        $query = $pdo->prepare($sql);
        for($i=1;$i<4;$i++)
            $query->bindValue('filter'.$i, "%$search%");
        
        $query->execute();
        return intval($query->fetch(\PDO::FETCH_COLUMN));
    }

    /**
     * Get default parameters from request send by datatable plugin
     * 
     * @param array $request
     * @return array
     */
    protected function dataTableRequest(array $request):array
    {
        $start = $request['start'];
        $limit = $request['length'];
        $order = current($request['order'])['column'];
        $dir = strtoupper(current($request['order'])['dir']) == 'ASC' ? 'ASC' : 'DESC';
        $search = $request['search']['value'];
        return compact('start', 'limit', 'order', 'dir', 'search');
    }
    
    public function getOne($id):array {
        $pdo = $this->getPdo();
        $query = $pdo->prepare('SELECT * FROM registro WHERE id=:id');
        $query->bindValue('id', $id);
        $query->execute();
        return $query->fetch(\PDO::FETCH_ASSOC);
    }
    
    public function save($data, $id = null) {
        if($id)
            return $this->update($data, $id);
        
        return $this->insert($data);
    }
    
    private function insert($data) {
        $columns = ['chrNome', 'chrSobrenome', 'chrCEP', 'chrUF', 'chrCidade', 'chrBairro', 'chrLogradouro', 'chrNumero', 'chrComplemento'];
        $sql = 'INSERT INTO registro (' . implode(',', $columns) . ') ';
        $entries = [];
        foreach($columns as $column)
            $entries[] = ':' . $column;
        
        $sql .= ' VALUE (' . implode(',', $entries) . ');';
        
        $pdo = $this->getPdo();
        $stmt = $pdo->prepare($sql);
        
        foreach($columns as $column)
            $stmt->bindValue($column, $data[$column]);
        
        $stmt->execute();
    }
    
    private function update($data, $id) {
        $columns = ['chrNome', 'chrSobrenome', 'chrCEP', 'chrUF', 'chrCidade', 'chrBairro', 'chrLogradouro', 'chrNumero', 'chrComplemento'];
        $sql = 'UPDATE registro SET ';
        $entries = [];
        foreach($columns as $column)
            $entries[] = $column . '=:' . $column;
        
        $sql .= implode(',', $entries);
        $sql .= ' WHERE id=:id';
        
        $pdo = $this->getPdo();
        $stmt = $pdo->prepare($sql);
        
        foreach($columns as $column)
            $stmt->bindValue($column, $data[$column]);
        
        $stmt->bindValue('id', $id); 
        
        $stmt->execute();
    }
    
    public function delete($id) {
        $sql = 'DELETE FROM registro WHERE id=:id';
        $pdo = $this->getPdo();
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue('id', $id);
        $stmt->execute();
        
        
    }

}
