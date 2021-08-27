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

    public function create($data)
    {
        if (gettype($data) === 'array' && isset($data['id'])) unset($data['id']);

        $vars = $this->prepared_obj_vars($data);

        if (!is_null(static::$table)) {
            $query = 'INSERT INTO ' . static::$table . '(';
            foreach ($vars as $k => $v) {
                $query .= $k . ', ';
            }
            $query = substr($query, 0, -2);
            $query .= ') VALUES(';

            foreach ($vars as $k => $v) {
                $query .= ':' . $k . ', ';
            }
            $query = substr($query, 0, -2);
            $query .= ')';
            $stmt = static::db()->prepare($query);

            foreach ($vars as $k => $v) {
                $stmt->bindValue($k, $this->escape($v));
            }

            return $stmt->execute();

        } else {
            throw new \Exception('table is not defined');
        }

    }

    public function update($data)
    {
        if (empty($this->id)) throw  new \Exception('Cannot update empty object');
        $vars = $this->prepared_obj_vars($data);

        if (!is_null(static::$table)) {
            $query = 'UPDATE ' . static::$table . ' SET ';

            foreach ($vars as $k => $v) {
                $query .= $k . ' = :' . $k . ', ';
            }
            $query = substr($query, 0, -2);
            $query .= ' WHERE id = ' . $this->id;
            $stmt = static::db()->prepare($query);

            foreach ($vars as $k => $v) {
                $stmt->bindValue($k, $this->escape($v));
            }
            return $stmt->execute();
        } else {
            throw new \Exception('table is not defined');
        }

    }

    public function delete()
    {
        if (!is_null(static::$table)) {
            $stmt = static::db()->prepare('DELETE FROM ' . static::$table . ' WHERE id = :id');
            $stmt->bindValue('id', $this->escape($this->id));
            return $stmt->execute();
        } else {
            throw new \Exception('table is not defined');
        }
    }

    private function check_fillable()
    {
        $vars = $this->prepared_obj_vars($this);
        foreach ($vars as $k => $v) {
            if (!in_array($k, $this->fillable)) {
                return false;
            }
        }
        return true;
    }

    private function prepared_obj_vars($data)
    {
        if ($data instanceof Model) {
            $data = get_object_vars($data);
            if (isset($data['fillable'])) unset($data['fillable']);
        }
        if (isset($data['id'])) unset($data['id']);

        return $data;
    }
}