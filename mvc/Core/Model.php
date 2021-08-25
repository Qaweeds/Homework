<?php


namespace Core;


use PDO;

class Model
{
    use DB;


    protected static $table = null;
    protected $fillable = [];

    public static function all()
    {
        if (!is_null(static::$table)) {
            $query = "SELECT * FROM " . static::$table;
            return static::db()->query($query)->fetchAll(PDO::FETCH_CLASS, static::class);
        } else {
            throw new \Exception('table is not defined');
        }
    }

    public static function find($id)
    {
        if (!is_null(static::$table)) {
            $query = 'SELECT * FROM ' . static::$table . ' WHERE id = :id';
            $stmt = static::db()->prepare($query);
            $stmt->bindValue(':id', $id);
            $stmt->execute();

            return $stmt->fetchObject(static::class);


        } else {
            throw new \Exception('table is not defined');
        }
    }

    public function save()
    {
        if ($this->check_fillable()) {
            if (empty($this->id)) {
                $this->create($this);
            } else {
                $this->update($this);
            }
        } else {
            throw new \Exception('fillable exception');
        }
    }

    protected function check_fillable()
    {
        $vars = $this->prepared_obj_vars($this);
        foreach ($vars as $k => $v) {
            if (!in_array($k, $this->fillable)) {
                return false;
            }
        }
        return true;
    }

    protected function create($data)
    {
        $vars = $this->prepared_obj_vars($data);
        if (count($vars)) throw new \Exception('Object already have properties. Cannot create, only save');
        dd(__METHOD__, $vars);
    }

    protected function update($data)
    {
        $vars = $this->prepared_obj_vars($data);

        $query = 'UPDATE ' . static::$table . ' SET ';

        foreach ($vars as $k => $v) {
            $query .= $k . ' = :' . $k . ', ';
        }
        $query = substr($query, 0, -2);
        $query .= ' WHERE id = ' . $this->id;

        $stmt = static::db()->prepare($query);
        foreach ($vars as $k => $v) {
            $stmt->bindValue($k, $v);
        }
        $stmt->execute();
        dd(__METHOD__, $this);
    }


    private function prepared_obj_vars($data)
    {
        $vars = get_object_vars($data);
        if (isset($vars['fillable'])) unset($vars['fillable']);
        return $vars;
    }
}