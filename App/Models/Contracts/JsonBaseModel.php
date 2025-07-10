<?php

namespace App\Models\Contracts;

use App\Models\Contracts\BaseModel;
use Exception;

class JsonBaseModel extends BaseModel
{
    private $JsonDBDir;
    private $tableFile;

    public function __construct()
    {
        $this->JsonDBDir = BASE_PATH . "Storage/JsonDB/";
        $this->tableFile = $this->JsonDBDir . $this->table . '.json';
        if (!file_exists($this->tableFile)) {
            touch($this->tableFile);
        }
    }
    public function create(array $newData): int
    {
        $tableData = $this->readJson();
        $tableData[] = $newData;
        $this->writeJson($tableData);
        return 1;
    }
    public function find($id): object|null
    {
        $datas = $this->readJson();
        foreach ($datas as $value) {
            if ($value->{$this->primeryKey} == $id)
                return $value;
        }
        return null;
    }
    public function getAll()
    {
        return $this->readJson();
    }
    public function get($columns, $where)
    {
        $AllRecord = $this->getAll();
        if (!is_array($columns)) {
            throw new Exception("Columns Must Be Array");
        }
        $whiltelist = ['id', 'name', 'family', 'job'];
        foreach ($columns as  $column) {
            if (!in_array($column, $whiltelist)) {
                throw new Exception("Field $columns Not Exist");
            }
        }
        $result = [];

        foreach ($AllRecord as $record) {
            $match = true;
            foreach ($where as $key => $value) {
                if (!isset($record->$key) || $record->$key != $value) {
                    $match = false;
                    break;
                }
            }

            if ($match) {
                $filtered = [];
                foreach ($columns as $column) {
                    $filtered[$column] = $record->$column;
                }
                $result[] = $filtered;
            }
        }
        return $result;
    }
    public function update(array $data, array $where): int
    {
        $records = $this->readJson();
        $updated = 0;

        foreach ($records as $index => $record) {
            $match = true;
            foreach ($where as $key => $value) {
                if (!isset($record->$key) || $record->$key != $value) {
                    $match = false;
                    break;
                }
            }

            if ($match) {
                foreach ($data as $key => $value) {
                    $record->$key = $value;
                }
                $records[$index] = $record;
                $updated++;
            }
        }

        $this->writeJson($records);
        return $updated;
    }
    public function delete(array $where): int
    {
        $records = $this->readJson();
        $originalCount = count($records);

        $records = array_filter($records, function ($record) use ($where) {
            foreach ($where as $key => $value) {
                if (!isset($record->$key) || $record->$key != $value) {
                    return true;
                }
            }
            return false;
        });

        $this->writeJson(array_values($records));
        return $originalCount - count($records);
    }
    private function writeJson($data)
    {

        $tableDataJson = json_encode($data);
        file_put_contents($this->tableFile, $tableDataJson);
    }
    private function readJson(): array|null
    {
        return json_decode(file_get_contents($this->tableFile));
    }
}
